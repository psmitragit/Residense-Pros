<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\SendFormattedMail;
use App\Models\Amenity;
use App\Models\Blog;
use App\Models\EnqueryHistory;
use App\Models\Faq;
use App\Models\NotifyUser;
use App\Models\Property;
use App\Models\PropertyAmenity;
use App\Models\UserFevorit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Psr\Http\Message\ResponseInterface;

class HomeController extends Controller
{
    public function index()
    {
        $filter = request()->all() ?? [];
        if (request()->ajax()) {
            if (request()->type == 'property') {
                $properties = getProperties(filter: $filter, limit: 4);
                return response()->json(['success' => 1, 'html' => view('frontend.home.inc.listing', ['properties' => $properties, 'country' => request()->country ?? '', 'filter' => $filter])->render()]);
            } else if (request()->type == 'blog') {
                $blogs = getBlogs(filter: $filter);
                return response()->json(['success' => 1, 'html' => view('frontend.home.inc.listing-blogs', compact('blogs'))->render()]);
            }
        }
        $allCountries = Property::select('country_id')->groupBy('country_id')->join('countries', 'countries.id', 'properties.country_id')->orderBy('countries.display_order', 'ASC');
        if (!empty(request()->country)) {
            $allCountries->where('countries.id', request()->country);
        }
        $allCountries = $allCountries->pluck('country_id')->toArray();
        $group = [];
        foreach ($allCountries as $key => $value) {
            $propertyFilter = [
                'country' => $value,
                'city' => request()->city ?? '',
                'zip' => request()->zip ?? '',
                'residence_type' => request()->residence_type ?? '',
                'buy_or_rent' => request()->buy_or_rent ?? '',
                'min_price' => request()->min_price ?? '',
                'max_price' => request()->max_price ?? ''
            ];
            $group[$value] = getProperties(filter: $propertyFilter, limit: 4);
        }
        $blogs = getBlogs(filter: $filter);
        $get_options = get_option(['homepage_title', 'homepage_description']);
        $homepage_title = $get_options['homepage_title'] ?? '';
        $homepage_description = $get_options['homepage_description'] ?? '';
        return view('frontend.home.index', compact('group', 'blogs', 'homepage_title', 'homepage_description', 'filter'));
    }

    public function about()
    {
        $title = 'About Us';
        $links = [
            [
                'url' => route('index'),
                'name' => 'Home'
            ],
            [
                'name' => $title
            ]
        ];
        return view('frontend.home.about', compact('title', 'links'));
    }
    public function faqs()
    {
        $title = 'Frequently Asked Questions';
        $links = [
            [
                'url' => route('index'),
                'name' => 'Home'
            ],
            [
                'name' => 'FAQs'
            ]
        ];
        $faq = Faq::orderBy('display_order', 'ASC')->get();
        return view('frontend.home.faqs', compact('title', 'links', 'faq'));
    }

    public function contact()
    {
        $title = 'Contact Us';
        $links = [
            [
                'url' => route('index'),
                'name' => 'Home'
            ],
            [
                'name' => $title
            ]
        ];
        return view('frontend.home.contact', compact('title', 'links'));
    }

    public function blogs()
    {
        $title = 'Blog Posts';
        $links = [
            [
                'url' => route('index'),
                'name' => 'Home'
            ],
            [
                'name' => 'Blogs'
            ]
        ];
        return view('frontend.home.blogs', compact('title', 'links'));
    }

    public function properties()
    {
        $title = "Properties";
        $filter = request()->all() ?? [];
        if (request()->ajax()) {
            $filter['sort_by'] =  request()->sort_by ?? '';
            $properties = getProperties(filter: $filter);
            return response()->json(['success' => 1, 'html' => view('frontend.home.inc.listing', ['properties' => $properties, 'country' => request()->country ?? '', 'filter' => $filter])->render()]);
        }
        $allCountries = Property::select('country_id')->groupBy('country_id')->join('countries', 'countries.id', 'properties.country_id')->orderBy('countries.display_order', 'ASC');
        if (!empty(request()->country)) {
            $allCountries->where('countries.id', request()->country);
        }
        $allCountries = $allCountries->pluck('country_id')->toArray();
        $group = [];
        foreach ($allCountries as $key => $value) {
            $propertyFilter = [
                'country' => $value,
                'city' => request()->city ?? '',
                'zip' => request()->zip ?? '',
                'residence_type' => request()->residence_type ?? '',
                'buy_or_rent' => request()->buy_or_rent ?? '',
                'min_price' => request()->min_price ?? '',
                'max_price' => request()->max_price ?? '',
                'bedrooms' => request()->bedrooms ?? '',
                'bathrooms' => request()->bathrooms ?? ''
            ];
            $group[$value]['data'] = getProperties(filter: $propertyFilter);
            $group[$value]['count'] = countProperties(filter: $propertyFilter);
        }
        return view('frontend.property.index', compact('title', 'group', 'filter'));
    }

    public function propertyDetails($slug)
    {
        $title = 'Property Details';
        $property = Property::where('slug', $slug)->firstOrFail();
        $updateCountUrl = route('update.property.count', ['id' => $property?->id ?? 0]);
        $amenities = Amenity::all();
        $propertyAmenity = PropertyAmenity::where('property_id', $property?->id ?? '')->get()->pluck('amenities_id')->toArray();
        return view('frontend.property.details', compact('title', 'updateCountUrl', 'property', 'amenities', 'propertyAmenity'));
    }

    public function blogDetails($slug)
    {
        dd($slug);
    }

    public function doEnquiry(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'property_id' => ['required', 'exists:properties,id'],
            'name' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric'],
            'message' => ['required', 'max:500']
        ], [
            'email.exists' => 'This email is not registered with us'
        ]);
        if ($validator->fails()) {
            $errors = [];
            foreach ($validator->errors()->keys() as $fieldKey) {
                $errors[$fieldKey] = $validator->errors()->first($fieldKey);
            }
            return response()->json(['success' => 0, 'errors' => $errors]);
        }

        $property = Property::find($request->property_id);
        $user = $property?->user ?? [];
        $userName = $user?->name ?? '';
        $userEmail = $user?->email ?? '';
        $userId = $user?->id ?? '';
        if (empty($user)) {
            $admin = get_admin();
            $userName = $admin?->name;
            $userEmail = $admin->email;
            $userId = $admin->id;
        }

        $keywords = [$userName, $property?->name ?? '', now()->format('jS F, Y'), $request->name, $request->email, $request->phone, $request->message];
        EnqueryHistory::insert(
            [
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'message' => $request->message,
                    'enquery_to' => $userEmail,
                    'user_id' => $userId,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]
        );
        Mail::to($userEmail)->send(new SendFormattedMail(4, $keywords));
        return response()->json(['success' => 1, 'msg' => 'Enquiry sent. The agent will contact you soon, or reach out directly.']);
    }

    public function addRemoveFevorit(Request $request)
    {
        $propertyid = $request->id ?? 0;
        $property = Property::find($propertyid);
        if (empty($property)) {
            return response()->json(['success' => 0, 'msg' => 'No property found.']);
        }
        if (!auth()->check()) {
            return response()->json(['success' => 0, 'show_login_modal' => 1]);
        }
        $fevorit = UserFevorit::where('user_id', auth()->id())->where('property_id', $property->id)->first();
        if (!$fevorit) {
            UserFevorit::insert([
                [
                    'user_id' => auth()->id(),
                    'property_id' => $property->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]);
            return response()->json(['success' => 1, 'type' => 'add']);
        } else {
            $fevorit->delete();
            return response()->json(['success' => 1, 'type' => 'remove']);
        }
    }

    public function doNotifyMe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'property_id' => ['required', 'exists:properties,id']
        ]);
        if ($validator->fails()) {
            $errors = [];
            foreach ($validator->errors()->keys() as $fieldKey) {
                $errors[$fieldKey] = $validator->errors()->first($fieldKey);
            }
            return response()->json(['success' => 0, 'errors' => $errors]);
        }
        $property = Property::find($request->property_id);
        NotifyUser::updateOrCreate([
            'agent_id' => $property?->user?->id ?? NULL,
            'email' => $request->email
        ], []);
        return response()->json(['success' => 1, 'msg' => 'You will be notified when agent post a new property.']);
    }

    public function doContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric'],
            'message' => ['required', 'max:700']
        ]);
        if ($validator->fails()) {
            $errors = [];
            foreach ($validator->errors()->keys() as $fieldKey) {
                $errors[$fieldKey] = $validator->errors()->first($fieldKey);
            }
            return response()->json(['success' => 0, 'errors' => $errors]);
        }
        $keywords = [$request->first_name . ' ' . $request->last_name, $request->email, $request->phone, $request->message];
        $admin = get_admin();
        EnqueryHistory::insert(
            [
                [
                    'name' => $request->first_name . ' ' . $request->last_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'message' => $request->message,
                    'enquery_to' => $admin->email,
                    'user_id' => $admin->id,
                    'type' => 'contact', 
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]
        );
        Mail::to($admin->email)->send(new SendFormattedMail(5, $keywords));
        return response()->json(['success' => 1, 'msg' => 'Question submitted successfully.']);
    }
}
