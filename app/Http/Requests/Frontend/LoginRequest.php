<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required']
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
