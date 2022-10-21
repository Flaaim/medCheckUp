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
            'fullname' => 'required|size:255',
            'birthdate' => 'required|date_format:d.m.Y',
            'department' => 'required|size:255',
            'profession' => 'required|size:255',
            'factors' => 'required|size:255',
            'author_fullname' => 'required|size:255',
            'author_profession' => 'required|size:255'
        ];
    }
}
