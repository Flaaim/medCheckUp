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
            'name' => 'required|max:255',
            'fullname' => 'required|max:255',
            'profession' => 'required|max:255',
            'email' => 'required|email:rfc',
            'type_of_ownership' => 'required|max:255',
            'economic_activity' => 'required|max:255',
            'phone' => 'required|regex:/(\+7)[0-9]{10}/',
        ];
    }
}
