<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

use Illuminate\Support\Str;

class ProductRequest extends FormRequest
{
    private $isUpdate;
    public function __construct()
    {
        $this->isUpdate = Str::contains(url()->previous(),'edit');
    }
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
            'title' => ['required'],
            'description'=>['required','max:200'],
            'photo' => [$this->isUpdate?'':'required','image'],
            'price'=>['required','numeric'],
            'category_id' => ['required',Rule::exists('categories','id')]
        ];
    }
   
}
