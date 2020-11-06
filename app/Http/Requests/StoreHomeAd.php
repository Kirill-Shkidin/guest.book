<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHomeAd extends FormRequest
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
        'name' => 'required|max:200',
        'desc' => 'required|max:1000',
        'price'=> 'required|integer|gt:0',
        'img1' => 'required',
        'img2' => 'nullable',
        'img3' => 'nullable',
      ];
    }
}
