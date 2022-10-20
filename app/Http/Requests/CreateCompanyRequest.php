<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCompanyRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'fullname' => 'required',
            'profession' => 'required',
            'email' => 'required|email:rfc,dns',
            'type_of_ownership' => 'required',
            'economic_activity' => 'required',
            'phone' => 'required|regex:/(8)[0-9]{10}/',
        ];
    }
}
