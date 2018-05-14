<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LojaController extends Controller
{

    public function direciona_produtos(){
        $produtos = DB::select('select * from produtos order by data_post desc');
        $categorias = DB::select( 'select * from categorias');
        return view('produtos',['produtos'=>$produtos],['categorias'=> $categorias]);

    }
}
