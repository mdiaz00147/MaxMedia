<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminPlacementCreateRequest extends Request {

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
    public function attributes()
    {
        return [
            'nombre' =>'Name',
            'web_id' =>'Web',
            'ad_id' =>'Ad',
        ];
    }
	public function rules()
	{
		return [
            'nombre' =>'Required|min:3',
            'web_id' =>'Required',
            'ad_id' =>'Required',
		];
	}

}
