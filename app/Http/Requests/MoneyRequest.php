<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class MoneyRequest extends Request {

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
            'cantidad' =>'Quantity',
            'descripcion' =>'Description',
        ];
    }
	public function rules()
	{
		return [
			'cantidad' =>'numeric|required',
            'email' =>'required|email'
		];
	}

}
