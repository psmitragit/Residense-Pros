<?php

namespace App\Http\Requests\Frontend;

use App\Models\PropertyImages;
use App\Rules\Property\DistenceRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

use function PHPUnit\Framework\isNan;

class AddpropertyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $reqOrNull = 'required';
        if (($this->draft ?? 0) == 1) {
            $reqOrNull = 'nullable';
        }
        $rules = [
            'property_id' => ['nullable', 'exists:properties,id'],
            'property_caption' => ['required', 'max:150'],
            'draft' => ['required', 'in:0,1'],
            'residential_type' => [$reqOrNull, 'in:Flat,House,Villa,Plot,Farm Land,Other'],
            'residential_option' => [$reqOrNull, 'in:buy,rent'],
            'price' => [$reqOrNull, 'numeric', 'gt:0'],
            'price_duration' => [$reqOrNull, 'in:day,month,year'],
            'address' => [$reqOrNull],
            'country' => [$reqOrNull, 'exists:countries,id'],
            'surface_area_value' => [$reqOrNull, 'in:2400,2500,3000,2800'],
            'surface_area_unit' => [$reqOrNull, 'in:sqyard,sqft'],
            'plot_size_value' => [$reqOrNull, 'in:60,80,120,150'],
            'plot_size_unit' => [$reqOrNull, 'in:sqyard,acer'],
            'bedrooms' => [$reqOrNull, 'integer'],
            'bathrooms' => [$reqOrNull, 'integer'],
            'property_condition' => [$reqOrNull, 'in:furnished,un_furnished,semi_furnished'],
            'property_age' => [$reqOrNull, 'in:0,5,10,15'],
            'available_month' => [$reqOrNull, 'numeric', 'gt:0', 'lt:13'],
            'available_year' => [$reqOrNull, 'gt:2000'],
            'amenities' => [$reqOrNull],
            'description' => [$reqOrNull, 'max:2000']
        ];

        if (!empty($this->nearby)) {
            foreach ($this->nearby as $key => $value) {
                if (!empty($value) && (empty($this->distance[$key]) || ($this->distance_unit[$key] != 'Miles' && $this->distance_unit[$key] != 'Kilometers'))) {
                    $rules['nearby_' . $key] = ['required'];
                }
            }
        }

        $max_gelery_limit = 10;
        $max_floor_limit = 10;
        if (!empty($this->property_id)) {
            $geleryCount =  PropertyImages::where('file_for', 'gallery')->where('property_id', $this->property_id)->count();
            $floorCount =  PropertyImages::where('file_for', 'floor')->where('property_id', $this->property_id)->count();
            $total = 0;
            $floorTotal = 0;
            if (!empty($this->remove_galary_images)) {
                $total = count(explode(',', $this->remove_galary_images));
                $total = $total - 1;
            }
            if (!empty($this->remove_floor_images)) {
                $floorTotal = count(explode(',', $this->remove_floor_images));
                $floorTotal = $floorTotal - 1;
            }
            $max_gelery_limit = 10 - ($geleryCount - $total);
            $max_floor_limit = 10 - ($floorCount - $floorTotal);
        }

        if (empty($this->galary)) {
            if (!empty($this->property_id)) {
                $rules['galary'] = $max_gelery_limit == 10 ? 'required' : 'nullable';
            } else {
                $rules['galary'] = $reqOrNull;
            }
        } else {
            if (count($this->galary) > $max_gelery_limit) {
                $rules['galary_e'] = 'required';
            } else {
                foreach ($this->galary as $key => $value) {
                    $size = $value->getSize();
                    $mbSize = $size / (1024 * 1024);
                    if ($mbSize > 2) {
                        $rules['galary_e2'] = 'required';
                        break;
                    }
                }
            }
        }

        if (!empty($this->floor_plan)) {
            if (count($this->floor_plan) > $max_floor_limit) {
                $rules['floor_plan_max'] = 'required';
            } else {
                foreach ($this->floor_plan as $key => $value) {
                    $size = $value->getSize();
                    $mbSize = $size / (1024 * 1024);
                    if ($mbSize > 2) {
                        $rules['floor_plan_e'] = 'required';
                        break;
                    }
                }
            }
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'nearby_*.required' => 'Please provide the distense and unit properly',
            'galary.required' => 'Please provide atleast one image',
            'galary_e.required' => 'You can upload upto 10 images.',
            'galary_e2.required' => 'All images size should less than 2MB.',
            'floor_plan.required' => 'This field is required.',
            'floor_plan_max.required' => 'You can upload upto 10 images.',
            'floor_plan_e.required' => 'All images size should less than 2MB.',
            'amenities.required' => 'Please choose atleast one amenity'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response(
            [
                'success'   => 0,
                'errors'    => $this->messageBagArr($validator)
            ]
        ));
    }

    private function messageBagArr($validator)
    {
        $errors = [];
        $messageBag = $validator->errors();
        foreach ($messageBag->keys() as $fieldKey) {
            $errors[str_replace('.', '_', $fieldKey)] = $messageBag->first($fieldKey);
        }
        return $errors;
    }
}
