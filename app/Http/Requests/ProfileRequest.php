<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            //
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'birthDay' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'facebook' => 'required',
            'github' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'image.image' => 'The avatar must be an image.',
            'image.mimes' => 'The avatar must be a file of type: jpeg, png, jpg, gif, svg.',
            'image.max' => 'Size of image must be smaller 2 MB.',
            'birthDay.required' => 'Birth day is required',
            'phone.required' => 'Phone number is required',
            'address.required' => 'Address is required',
            'facebook.required' => 'Facebook link is required',
            'github.required' => 'Github link is required'
        ];
    }
}
