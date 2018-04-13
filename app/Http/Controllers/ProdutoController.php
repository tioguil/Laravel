<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/04/2018
 * Time: 12:35
 */

namespace app\Http\Controllers;

use App\Categoria;
use App\Http\Requests\ProdutosRequest;
use App\Produto;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Request;

class ProdutoController extends Controller {

    public function __construct(){
        $this->middleware('loginMiddle',
            ['only' => ['adicionaProduto', 'removeProduto']]);
    }

    public function lista(){

        $produtos = Produto::All();

        return view('produto.listagem')->with('produtos', $produtos);
    }

    public function mostra($id){

        $resposta = Produto::find($id);

        if(empty($resposta)) {
            return "Esse produto não existe";
        }
        return view('produto.detalhes')->with('p', $resposta);
    }

    public function novo(){
        return view('produto.formulario')->with('categorias', Categoria::all());
    }

    public function adicionaProduto(ProdutosRequest $request){

        Produto::create($request->all());

       return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));
    }

    public function listaJson(){
        $produtos = Produto::all();
        return response()->json($produtos);
    }

    public function download(){

        return response()->download('test.txt');
    }

    public function removeProduto($id){
        $produto = Produto::find($id);
        $produto->delete();

        $retorno = "produto removido com sucesso";
        return redirect()->action('ProdutoController@lista', ['retorno' => $retorno]);

    }

}