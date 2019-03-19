<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;

class UploadAvatarRequest extends FormRequest
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
            'avatar' => 'required|max:1024|Mimes:jpeg,png,gif'
        ];
    }

    public function messages()
    {
        return [
            'avatar.required' => 'You haven\'t chosen an avatar.',
            'avatar.max' => 'Your Avatar is too large, must be less than :max kb.',
            'avatar.Mimes' => 'We only accept :values.',
        ];
    }
}
