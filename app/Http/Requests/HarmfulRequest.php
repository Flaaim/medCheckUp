<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class HarmfulRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    public function validationData()
    {
        return $this->data;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [      
            'profession' => 'required',
            'harmfulfactor' => 'required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        
        throw (new ValidationException($validator))->status(200);
                    //->errorBag($this->errorBag)
                    //->redirectTo($this->getRedirectUrl()); 
    }

}
