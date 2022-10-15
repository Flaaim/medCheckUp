<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DirectionRequest extends FormRequest
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
            'fullname' => 'required',
            'birthdate' => 'required|date_format:d.m.Y',
            'gender' => 'required',
            'department' => 'required',
            'profession' => 'required',
            'factors' => 'required',
            'author_fullname' => 'required',
            'author_profession' => 'required'
        ];
    }
}
