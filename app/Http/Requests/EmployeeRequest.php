<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'surname' => ['required'],
            'photo' => ['required'],
            'text_comment' => ['required'],
            'date_of_birth' => ['required'],
        ];
    }
}
