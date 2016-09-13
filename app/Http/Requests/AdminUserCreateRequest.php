<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminUserCreateRequest extends Request {

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
    public function messages()
    {
        return [
          //  'nombre.required'    => 'tu mensaje personalizado',
        ];
    }

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
            'apellido' =>'Required|min:3|regex:/^[-_\a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/',
            'telefono' =>'Required',
            'paypal_email' =>'Required',
            'paypal_name' =>'',
            'pais' =>'Required',
            'skype' =>'',
            'direccion_envio' =>'regex:/^[-_\a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/',
            'email'=> 'Required|unique:users',
            'password'=>'Required',
		];
	}

}
