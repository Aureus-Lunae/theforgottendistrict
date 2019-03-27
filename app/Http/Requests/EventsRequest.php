<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventsRequest extends FormRequest {
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
			'title' => 'required',
			'time' => 'required',
			'date' => 'required',
			'event' => 'required',
		];
	}

	public function messages() {
		return [
			'title.required' => 'Please fill in the event title',
			'time.required' => 'Please fill in the time it takes place',
			'date.required' => 'Please fill in when the event takes place',
			'event.required' => 'Please fill in the description of the event',
		];
	}
}
