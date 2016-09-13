<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminAdEditRequest extends Request {

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
            'apellido' =>'Script',
            'tipo' =>'Type',
        ];
    }
	public function rules()
	{
		return [
            'nombre' =>'Required|min:3',
            'script' =>'Required',
            'tipo' =>'Required|IN:pequeño,mediano,popup,vertical,600X160',
		];
	}

}
