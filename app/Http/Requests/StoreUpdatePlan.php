<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePlan extends FormRequest
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
        // Valida a alteração de URL pega o terceiro parametro da url /plano para evitar a duplicação da url
        $url = $this->segment(3);

        // inclui na validação do name o url ,name,{$url}, url
        return [
            'name' => "required|min:3|max:255|unique:plans,name,{$url},url",
            'description' => 'nullable|min:3|max:255',
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/"
        ];
    }
}
