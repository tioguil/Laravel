<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/04/2018
 * Time: 12:35
 */

namespace app\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Request;

class ProdutoController extends Controller {

    public function lista(){

        $produtos = DB::select('select * from produtos');

        return view('produto.listagem')->with('produtos', $produtos);
    }

    public function mostra(){

        $id = Request::route('id');

        $resposta = DB::select('select * from produtos where id = ?', [$id]);

        if(empty($resposta)) {
            return "Esse produto não existe";
        }
        return view('produto.detalhes')->with('p', $resposta[0]);
    }

    public function novo(){
        return view('produto.formulario');
    }

    public function adicionaProduto(){

        $nome = Request::input('nome');
        $descricao = Request::input('descricao');
        $valor = Request::input('valor');
        $quantidade = Request::input('quantidade');

        DB::insert('insert into produtos values (null, ?, ?, ?, ?)', array($nome, $valor, $descricao, $quantidade ));

        $retorno = 'Produto '.$nome.' foi adicionado com sucesso!';
        //return view('produto.formulario')->with('retorno', $retorno);

        return redirect('/produtos')->withInput(Request::only('nome'));
    }

    public function listaJson(){
        $produtos = DB::select('select * from produtos');
        return response()->json($produtos);
    }

    public function download(){

        return response()->download('test.txt');
    }

}