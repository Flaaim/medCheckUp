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
            'date' => 'required',
            'number' => 'required|integer',
            'fullname' => 'required|max:255',
            'birthdate' => 'required|date_format:d.m.Y',
            'department' => 'required|max:255',
            'profession' => 'required|max:255',
            'factors' => 'required|max:255',
            'author_fullname' => 'required|max:255',
            'author_profession' => 'required|max:255'
        ];
    }
}
