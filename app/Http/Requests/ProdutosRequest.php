<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProdutosRequest extends Request
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
            'nome'          => 'required',
            'idCategoria'   => 'required|exists:categoria,id',
            'descricao'     => 'max:255',
            'foto'          => 'image'
        ];
    }

    public function messages(){
        return [
            'nome.required' => 'Preencha o nome',
            'idCategoria.required' => 'Escolha uma categoria',
            'idCategoria.exists' => 'A categoria selecionada é inválida',
            'descricao.max' => 'Limite de 255 caracteres',
            'foto.image' => 'Envie uma imagem'
        ];
    }
}
