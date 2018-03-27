<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'email'=>'required|email|unique:users,email,'.$this->id.",id",
            'password'=>'required_without:id|min:5',
            'name'=>'required|min:5',
            'phone'=>'digits:8',
            'celphone'=>'digits:10',     
            'image'=>'image|mimes:jpeg,bmp,png,jpg',
        ];
    }
}
