<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminAdCreateRequest extends Request {

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
            'tipo' =>'Required|IN:pequeño,mediano,popup,vertical,direct,468,600X160',
		];
	}

}
