<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUser extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email_address' => 'unique:users,email_address',
            'marks' => 'required|integer',
            'status' => 'required',
            'profile_picture' => 'required|image|mimes:jpeg,png|max:2048'
        ];
    }
}
