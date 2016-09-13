<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminCategoryEditRequest extends Request {

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
        ];
    }
	public function rules()
	{
		return [
            'nombre' =>'Required|min:3|regex:/^[-_\a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/',

        ];
	}

}
