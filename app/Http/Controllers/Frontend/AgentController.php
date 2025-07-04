<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\AddpropertyRequest;
use App\Mail\SendFormattedMail;
use App\Models\Amenity;
use App\Models\Property;
use App\Models\PropertyAmenity;
use App\Models\PropertyImages;
use App\Models\PropertyNearbyPlace;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Laravel\Prompts\Progress;

class AgentController extends Controller
{
    public function addProperty()
    {
        $title = "Add New Property";
        $amenities = Amenity::all();
        $months = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];
        $currentYear = now()->year;
        $years = range($currentYear, $currentYear + 5);
        return view('frontend.agent.add-property', compact('title', 'amenities', 'months', 'years'));
    }

    public function doAddProperty(AddpropertyRequest $request)
    {
        DB::beginTransaction();
        try {
            $authUser = auth()->user();
            $status = $request->draft == 1 ? 'draft' : 'pending';
            $prices = $this->getPrices($request->price, $request->price_duration);
            $condition = $this->getCondition($request->property_condition);
            if ($status == 'draft') {
                $msg = 'Property drafted successfully.';
            } else {
                $msg = 'Property published successfully and need admin approval after admin approve we will notify you.';
            }
            $data = [
                'name' => $request->property_caption ?? '-',
                'residence_type' => $request->residential_type,
                'property_type' => $request->residential_option,
                'price' => $request->price,
                'price_type' => $request->price_duration,
                'price_per_month' => $prices['month'] ?? 0,
                'price_per_day' => $prices['day'] ?? 0,
                'price_per_year' => $prices['year'] ?? 0,
                'address' => $request->address,
                'city' => $request->city,
                'country_id' => $request->country,
                'state' => $request->state,
                'zip' => $request->zip,
                'surface' => $request->surface_area_value,
                'surface_type' => $request->surface_area_unit,
                'plot' => $request->plot_size_value,
                'plot_type' => $request->plot_size_unit,
                'bedrooms' => $request->bedrooms,
                'bathrooms' => $request->bathrooms,
                'condition' => $condition,
                'property_age_min' => $request->property_age,
                'property_age_max' => $request->property_age == null ? null : ($request->property_age + 5),
                'property_available_month' => $request->available_month,
                'property_available_year' => $request->available_year,
                'description' => $request->description,
                'created_by' => $authUser->id,
                'status' => $status
            ];
            if ($status == 'pending') {
                $userSubscription = $authUser->subscription;
                if (!$userSubscription || is_expired($userSubscription?->subscription_end_date ?? '') == 1) {
                    $data['status'] = 'draft';
                    $msg = 'Property saved as draft. You don\'t have an active subscription. Please purchase one to post the property.';
                    $redirect = route('agent.subscription');
                } else {
                    $agentPostingLimit = $userSubscription?->plan?->limit ?? -1;
                    if ($agentPostingLimit != 0) { // 0 mean unlimited
                        $agentTotalPosting = $this->agentPostingCurrentSubscription($userSubscription);
                        $remaining = $agentPostingLimit - $agentTotalPosting;
                        // dd($agentPostingLimit, $agentTotalPosting, $remaining);
                        if ($remaining < 1) {
                            $data['status'] = 'draft';
                            $msg = 'Property saved as draft. Your subscription allows posting ' . $agentTotalPosting . ' properties, and you have reached the limit. Please upgrade your subscription to post more.';
                        }
                    }
                }
            }
            $property = Property::create($data);
            $this->insertAmenities($request->amenities, $property->id);
            $this->insertNearby($request->nearby, $property->id, $request->distance, $request->distance_unit);
            $this->insertPropertyImage($request->galary, $property->id, 'gallery');
            $this->insertPropertyImage($request->floor_plan, $property->id, 'floor');
            if ($property->status == 'pending') {
                $property->submitted_at = now()->format('Y-m-d H:i:s');
                $property->save();
                $this->sendMailToAdminForApproval($property);
            }
            DB::commit();
            session()->put('success', $msg);
            $redirect = route('index');
            return response()->json(['success' => 1, 'msg' => $msg, 'redirect' => $redirect ?? false]);
        } catch (Exception $err) {
            DB::rollback();
            return response()->json(['success' => 0, 'msg' => $err->getMessage()]);
        }
    }

    public function getPrices($price, $price_duration)
    {
        switch ($price_duration) {
            case 'day':
                $price_per_month = $price * 30;
                $price_per_year = $price * 365;
                $price_per_day = $price;
                break;
            case 'month':
                $price_per_month = $price;
                $price_per_year =  $price * 12;
                $price_per_day = $price / 30;
                break;
            case 'year':
                $price_per_month = $price / 12;
                $price_per_year = $price;
                $price_per_day = $price / 365;
                break;
            default:
                $price_per_month = 0;
                $price_per_year = 0;
                $price_per_day = 0;
                break;
        }
        return [
            'day' => $price_per_day,
            'month' => $price_per_month,
            'year' => $price_per_year,
        ];
    }

    public function getCondition($condition)
    {
        if ($condition == 'furnished') {
            $dbCondition = 'furnished';
        } else if ($condition == 'un_furnished') {
            $dbCondition = 'non-furnished';
        } else if ($condition == 'semi_furnished') {
            $dbCondition = 'semi-furnished';
        } else {
            $dbCondition = 'na';
        }
        return $dbCondition;
    }

    public function agentPostingCurrentSubscription($userSubscription)
    {
        $start_date = Carbon::parse($userSubscription?->subscription_start)->startOfDay()->format('Y-m-d H:i:s');
        return Property::whereDate('submitted_at', '>=', $start_date)->count();
    }

    public function insertAmenities($amenities, $property_id)
    {
        PropertyAmenity::where('property_id', $property_id)->delete();
        $amenityInsert = [];
        if (!empty($amenities)) {
            foreach ($amenities as $value) {
                if (Amenity::find($value)) {
                    $amenityInsert[] = [
                        'amenities_id' => $value,
                        'property_id' => $property_id
                    ];
                }
            }
            if (!empty($amenityInsert)) {
                PropertyAmenity::insert($amenityInsert);
            }
        }
        return $amenityInsert;
    }

    public function insertNearby($nearby, $property_id, $distance, $distance_unit)
    {
        PropertyNearbyPlace::where('property_id', $property_id)->delete();
        $nearbyInsertData = [];
        if (!empty($nearby)) {
            foreach ($nearby as $key => $value) {
                if (!empty($value)) {
                    $nearbyInsertData[] = [
                        'property_id' => $property_id,
                        'distance' => $distance[$key],
                        'name' => $value,
                        'distance_type' => strtolower($distance_unit[$key]) == 'kilometers' ? 'km' : 'm'
                    ];
                }
            }
            if (!empty($nearbyInsertData)) {
                PropertyNearbyPlace::insert($nearbyInsertData);
            }
        }
        return $nearbyInsertData;
    }

    public function insertPropertyImage($images, $property_id, $type = 'gallery')
    {
        if (!in_array($type, ['gallery', 'floor'])) {
            return false;
        }
        if (!is_file_exists('property')) {
            Storage::disk('public')->makeDirectory('property');
        }
        if (!empty($images)) {
            $insertData = [];
            foreach ($images as $key => $value) {
                if (!empty($value)) {
                    $res = image_resize($value, 'property');
                    if ($res) {
                        $final_crop_data = [
                            'top' => 0,
                            'left' => 0,
                            'right' => 0,
                            'bottom' => 0,
                            'image' => $res['resizedimg'],
                            'maxWidth' => $res['maxWidth'],
                            'maxHeight' => $res['maxHeight'],
                            'dirPath' => $res['dir_path'],
                            'thumbFileName' => $res['thumbFileName'],
                            'ext' => $res['ext'],
                            'crop_image' => 1,
                        ];
                        $imageName = final_crop($final_crop_data);
                        image_resize($value, 'property/small', 200, 200, $imageName);
                        $insertData[] = [
                            'path' => 'storage/property/' . $imageName,
                            'file_type' => 'image',
                            'file_for' => $type,
                            'property_id' => $property_id,
                            'created_at' => now(),
                            'updated_at' => now()
                        ];
                    }
                }
            }
            if (!empty($insertData)) {
                PropertyImages::insert($insertData);
            }
        }
        return true;
    }

    public function sendMailToAdminForApproval($property)
    {
        $email = get_option('notification_email');
        $keywords = [$property?->user?->name ?? '', $property?->name ?? '-', format_date($property->created_at), route('admin.property.pending')];
        Mail::to($email)->send(new SendFormattedMail(3, $keywords));
    }

    public function updateProperty($id)
    {
        $title = "Add New Property";
        $amenities = Amenity::all();
        $months = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];
        $currentYear = now()->year;
        $years = range($currentYear, $currentYear + 5);
        $property = Property::where('created_by', auth()->id())->where('id', $id)->where('archive', 0)->firstOrFail();
        $existing_amenities = $property->amenities->select('id')->pluck('id')->toArray();
        $nearbyPlaces = PropertyNearbyPlace::where('property_id', $property?->id)->get();


        $galaryImages = PropertyImages::where('file_for', 'gallery')->where('property_id', $property?->id)->get();
        $floorImages = PropertyImages::where('file_for', 'floor')->where('property_id', $property?->id)->get();

        $galaryImagesPath = [];
        $floorImagesPath = [];

        foreach ($galaryImages as $key => $value) {
            $galaryImagesPath[] = ['id' => $value->id, 'path' => $value->image()];
        }

        foreach ($floorImages as $key => $value) {
            $floorImagesPath[] =  ['id' => $value->id, 'path' => $value->image()];
        }

        return view('frontend.agent.update-property', compact('title', 'amenities', 'months', 'years', 'property', 'existing_amenities', 'nearbyPlaces', 'galaryImagesPath', 'floorImagesPath'));
    }
}
