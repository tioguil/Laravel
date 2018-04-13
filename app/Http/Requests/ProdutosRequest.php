<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProdutosRequest extends Request {

	public function authorize()
	{
		return true;
	}

	public function rules()
	{
        return [
            'nome' => 'required|max:100',
            'descricao' => 'required|max:255',
            'valor' => 'required|numeric',
            'quantidade' => 'required|numeric|min:1'
        ];
	}

    public function messages()
    {
        return [
            'required' => "O campo :attribute não pode ser vaziu!",
            'min' => 'O campo :attribute não pode ser menor ou igual a 0'
        ];
    }

}
