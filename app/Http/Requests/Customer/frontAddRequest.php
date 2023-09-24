<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class frontAddRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'customer_name'=>'required|max:255',
            'phone'=>'required|unique:customers,phone,except,id',
            // 'address'=>'required',
            // 'email'=>'required',
            'password'=>'required|min:3',
        ];
    }
}
