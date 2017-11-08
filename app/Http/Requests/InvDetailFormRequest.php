<?php

namespace sysCoco\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvDetailFormRequest extends FormRequest
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
			'id_inventory'=>'required',
			'id_product'=>'required',
			'quantity'=>'max:30',
			'merma'=>'max:50'
            //
        ];
    }
}
