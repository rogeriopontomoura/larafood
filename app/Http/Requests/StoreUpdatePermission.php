<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePermission extends FormRequest
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
        // name é unico na tabela de permissions exceto quando o ID é iqual a coluna.
        $id = $this->segment(3);

        return [
            'name' => "required|min:3|max:255|unique:permissions,name,{$id},id",
            'description' => 'nullable|min:3|max:255',
        ];
    }
}
