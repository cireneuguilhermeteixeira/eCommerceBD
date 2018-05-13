<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LojaController extends Controller
{

    public function direciona_produtos(){
        $categorias = DB::select( 'select * from categorias');
        return view('produtos',['categorias'=> $categorias]);

    }
}
