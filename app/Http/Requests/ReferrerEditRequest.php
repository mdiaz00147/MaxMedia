<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ReferrerEditRequest extends Request {
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
			'apellido' =>'Last Name',
			'telefono' =>'Telephone',
			'paypal_email' =>'Paypal email',
			'paypal_name' =>'Paypal name',
			'pais' =>'Country',
			'skype' =>'Skype',
			'direccion_envio' =>'Address',
			'email'=> 'Email',
			'password'=>'Password',
		];
	}
	public function rules()
	{
		return [
			'nombre' =>'Required|min:3|regex:/^[-_\a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/',
			'paypal_email' =>'Required|email',
			'pais' =>'Required',
			'skype' =>'',
			'email'=> 'email|Required|unique:users',
			'password'=>'Required',
		];
	}

}
