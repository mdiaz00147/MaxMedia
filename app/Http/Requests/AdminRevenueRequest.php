<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminRevenueRequest extends Request {

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
            'revenue_total_diario' =>'Revenue',
            'fecha' =>'Date',
        ];
    }
	public function rules()
	{
		return [
			'revenue_total_diario' => 'numeric|required',
			'fecha' => 'date|required'
		];
	}

}
