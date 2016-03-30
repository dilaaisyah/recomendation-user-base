<?php namespace App\Http\Requests;

use App\Models\SLider;

class SliderRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$id = $this->slider ? ',' . $this->slider : '';
		return [
			'title' => 'required|max:255',
			'content' => 'max:65000',
		];
	}

}