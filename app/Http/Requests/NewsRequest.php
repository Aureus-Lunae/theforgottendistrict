<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest {
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
			'news' => 'required|min:100|max:3000',
		];
	}

	public function messages() {
		return [
			'title.required' => 'Please fill in the news title.',
			'title.max' => 'The title can\'t be more than 50 characters.',
			'news.required' => 'Please fill in the news.',
			'news.min' => 'The news must be at least 100 characters.',
			'news.max' => 'The news can\'t be more than 3000 characters.',
		];
	}

}
