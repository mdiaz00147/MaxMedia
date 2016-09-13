<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class WebCreateReferrerRequest extends Request {
	public function authorize()
	{
		return true;
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function attributes()
	{
		return [
			'nombre' =>'Name',
			'url' =>'Url',
			'descripcion' =>'Decription',
			'categoria_id' =>'Category',
			'user_id' =>'User',
		];
	}
	public function rules()
	{
		return [
			'nombre' =>'Required|min:3|regex:/^[-_\a-zA-Z������������������������_\s]+$/',
			'url' =>'Required|min:3|regex:/^[-_\a-zA-Z������������������������_\s]+$/',
			'descripcion' =>'',
			'categoria_id' =>'Required',
			'user_id' =>'Required',
		];
	}


}
