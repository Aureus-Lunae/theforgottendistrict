<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class pmRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'title' => 'required|max:50',
			'receiver' => 'required',
			'msg' => 'required|min:10|max:1000',
		];
	}

	public function messages() {
		return [
			'title.required' => 'Please fill in the title.',
			'title.max' => 'The title can\'t be more than 50 characters.',
			'receiver.required' => 'Please fill the person you send this to.',
			'msg.required' => 'Please fill in the message.',
			'msg.min' => 'The message must be at least 10 characters.',
			'msg.max' => 'The message can\'t be more than 1000 characters.',
		];
	}

}
