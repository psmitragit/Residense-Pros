<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SignupRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => ['required', 'in:agent,user'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'phone' => ['required'],
            'address' => ['nullable', 'max:150'],
            'country' => ['required', 'exists:countries,id'],
            'password' => ['required', 'min:8'],
            'confirm_password' => ['required', 'same:password'],
            'terms' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'terms.required' => 'Please check the Terms and Conditions to continue.'
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
