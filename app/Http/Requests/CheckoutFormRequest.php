<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required','max:20'],
            'last_name' => ['required','max:20'],
            'email' => ['required','email'],
            'address1'=> ['required','max:50'],
            'address2'=> ['required','max:50'],
            'phone' => ['required','integer','max:9','min:9'],
            'postal_code' => ['required','integer'],
            
        ];
    }
}
