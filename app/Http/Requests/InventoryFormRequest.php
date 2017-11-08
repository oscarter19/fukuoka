<?php

namespace sysCoco\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoryFormRequest extends FormRequest
{
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
    public function rules()
    {
        return [
            'date'=>'required',
			'user_name'=>'required|max:50',
			'details'=>'max:100',
        ];
    }
}
