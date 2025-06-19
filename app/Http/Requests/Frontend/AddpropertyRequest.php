<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'description' => [$reqOrNull, 'max:250']
        ];

        return $rules;
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
