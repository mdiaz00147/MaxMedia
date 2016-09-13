<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ClientEditRequest extends Request {

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
            'url' =>'Url',
            'descripcion' =>'Decription',
            'categoria_id' =>'Category',
            'user_id' =>'User',
        ];
    }
	public function rules()
	{
		return [
            'nombre' =>'Required|min:3|regex:/^[-_\a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/',
            'apellido' =>'Required|min:3|regex:/^[-_\a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/',
            'telefono' =>'numeric',
            'paypal_email' =>'Required|email',
            'paypal_name' =>'Required',
            'pais' =>'Required',
            'skype' =>'',
            'direccion_envio' =>'regex:/^[-_\a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/',

            		];
	}

}
