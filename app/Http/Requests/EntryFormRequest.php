<?php

namespace sysCoco\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntryFormRequest extends FormRequest
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
			'date_entry'=>'date',
           
			'farm'=>'max:10',
			'delivery_by'=>'max:100',
			
			'imagen'=>'mimes:jpeg,bmp,png'
			
			
			
        ];
    }
}
