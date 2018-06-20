<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
date_default_timezone_set('America/Sao_Paulo');


class VendasController extends Controller
    {
        public function contabilidade(){

            $vendas = DB::select('select * from vendas where usuario_vendeu = ?',[Auth::user()->email]);
            $apurado = 0;
            foreach($vendas as $venda) {
                $apurado = $apurado + $venda->preco_vendido;
            }
            return view('vendas',['vendas'=>$vendas,'apurado'=>$apurado]);
        }


    }