<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
    	return true;
    }
    
    public function rules()
    {
        return [
            'first_name'   => 'required|min:4|max:50',
            'last_name'    => 'required|min:5|max:50',
            'profession'   => 'required|min:5|max:100',
            'age'          => 'required|numeric|min:12|max:72',
        ];
    }
}
