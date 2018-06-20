<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
date_default_timezone_set('America/Sao_Paulo');


class LojaController extends Controller
{

    public function direciona_produtos(){
        $produtos = DB::select('select * from produtos order by data_post desc');
        $categorias = DB::select( 'select * from categorias');
        return view('produtos',['produtos'=>$produtos],['categorias'=> $categorias]);
    }

    public function InfoProduto(){
        $id = Input::get('id');
        //$produto = DB::select('select produtos.id, produtos.id_usuario, produtos.id_categoria, produtos.nome_produto, produtos.preco_atual, produtos.quantidade, produtos.data_post, produtos.descricao, produtos.foto, categorias.nome_categoria  from produtos, categorias where produtos.id=? and produtos.id_categoria=categorias.id ',[$id]);
        $produto = DB::select('select * from produtos where produtos.id=? ',[$id]);
        $categoria = (DB::select( 'select nome_categoria from categorias where id=?',[$produto[0]->id_categoria]));
        $dono_produto = DB::select('select name from users where id=? ',[$produto[0]->id_usuario]);
        return view('InfoProduto',['produto'=>$produto[0],'categoria'=>$categoria[0]->nome_categoria,'dono'=>$dono_produto[0]->name]);
    }

    public function comprar(Request $request){
        if (Auth::user()){
            $id = Input::get('produto');
            $quantidade = Input::get('quantidade');
            $produto = DB::select('select * from produtos where produtos.id=?',[$id]);
            $dono_produto = DB::select('select name, email from users where id=? ',[$produto[0]->id_usuario]);
            $data = date('Y-m-d H:m:s');
            if ($produto[0]->quantidade>=1){
                $restante = $produto[0]->quantidade - $quantidade;
                DB::insert('insert into vendas (usuario_comprou,usuario_vendeu, produto, quantidade, preco_vendido,data_venda) values (?, ?, ?, ?, ?, ?)', [Auth::user()->email,$dono_produto[0]->email,$produto[0]->nome_produto,$quantidade,$produto[0]->preco_atual,$data]);
                DB::update('update produtos set quantidade= ? where id = ?', [$restante,$produto[0]->id]);
                \Session::flash('mensagem_aviso','Produto comprado com sucesso!!');
                return redirect()->back();


            }else{
                \Session::flash('mensagem_aviso','Produto esgotado!!');
                return redirect()->back();
            }

        }else{
            return view('auth.login');
        }

    }
    public function buscarNome(){
        $nome = Input::get('produto');
        $produtos = DB::select('select * from produtos where produtos.nome_produto=?',[$nome]);
        $categorias = DB::select( 'select * from categorias');
        return view('produtos',['produtos'=>$produtos],['categorias'=> $categorias]);
    }

    public function filtrarPreco(){
        $preco = Input::get('preco');
        if($preco == 'ate'){
            $produtos = DB::select('select * from produtos where produtos.preco_atual<=100');

        }elseif($preco == 'entre'){
            $produtos = DB::select('select * from produtos where produtos.preco_atual>100 and produtos.preco_atual<=1000');

        }elseif($preco == 'acima') {
            $produtos = DB::select('select * from produtos where produtos.preco_atual>1000');
        }
        $categorias = DB::select( 'select * from categorias');
        return view('produtos',['produtos'=>$produtos],['categorias'=> $categorias]);

    }

    public function filtrarCategoria()
    {
        $categoria = Input::get('categoria');
        $produtos = DB::select('select produtos.id,produtos.nome_produto,produtos.id_usuario, produtos.preco_atual,produtos.data_post,produtos.foto from produtos,categorias where produtos.id_categoria = categorias.id and categorias.id=?',[$categoria]);
        //$produtos = DB::select('select * from produtos where produtos.nome_produto=?',[$nome]);
        $categorias = DB::select( 'select * from categorias');
        return view('produtos',['produtos'=>$produtos],['categorias'=> $categorias]);

    }

}
