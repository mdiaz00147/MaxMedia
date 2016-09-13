<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactRequest extends Request {

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
            'name' =>'Name',
            'last_name' =>'Last Name',
            'email' =>'Email',
            'mensaje' =>'Message',
        ];
    }
	public function rules()
	{
		return [
            'name' =>'Required|min:3|regex:/^[-_\a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/',
            'email' =>'Required|email',
            'pais' =>'Required',
            'paypal' =>'Required',
            'web_site' =>'Required',
            'terminos' => 'Required'

		];
	}

}
