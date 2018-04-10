<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/04/2018
 * Time: 12:35
 */

namespace app\Http\Controllers;

use Illuminate\Routing\Controller;

class ProdutoController extends Controller {

    public function lista(){
        return "<h1> Lista de Produtos</h1>";
    }

}