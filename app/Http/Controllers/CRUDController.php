<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use File;
date_default_timezone_set('America/Sao_Paulo');


class CRUDController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function direciona_inventario(){


        $produtos = DB::select( 'select * from produtos where id_usuario = ? order by id desc',[Auth::user()->id]);
        return view('inventario',['produtos'=>$produtos]);

    }

    public function direcionar_criar(){
        $categorias = DB::select( 'select * from categorias');
        return view('produto',['categorias'=> $categorias]);
    }



    public function criar(){
        $id_usuario = Auth::user()->id;
        $data = date('Y-m-d H:m:s');
        $nome_arquivo = date('Y-m-d-H-m-s');
        $id_categoria = 1;
        $nome = Input::post('nome_produto');
        $preco = Input::post('preco_atual');
        $quantidade = Input::post('quantidade');
        $descricao = Input::post('descricao');
        if (Input::file('imagem')){
            $imagem =Input::file('imagem');
            $extensao =  $imagem->getClientOriginalExtension();
            if ($extensao!='jpg' && $extensao!='png'){
                return back()->with('erro','Arquivo não é uma imagem');
            }
            File::move($imagem,public_path().'/img/fotos/'.$nome_arquivo.'.'.$extensao);
            $img = $nome_arquivo.'.'.$extensao;
            DB::insert('insert into produtos (id_usuario,id_categoria, nome_produto, preco_atual, quantidade,data_post,descricao,foto) values (?, ?, ?, ?, ?, ?, ?,?)', [$id_usuario,$id_categoria,$nome,$preco,$quantidade,$data,$descricao,$img]);
        }else{
            DB::insert('insert into produtos (id_usuario,id_categoria, nome_produto, preco_atual, quantidade,data_post,descricao) values (?, ?, ?, ?, ?, ?, ?)', [$id_usuario,$id_categoria,$nome,$preco,$quantidade,$data,$descricao]);

        }

        \Session::flash('mensagem_sucesso','Produto Cadastrado com Sucesso!!');
        return Redirect::to('inventario');

    }

    public function direcionar_editar($id){
        $produto = DB::select('select * from produtos where id=?',[$id]);
        $categorias = DB::select( 'select * from categorias');
        return view('produto',['categorias'=> $categorias],['produto'=>$produto[0]]);
    }

    public function editar($id){
        $id_usuario = Auth::user()->id;
        $data = date('Y-m-d H:i');
        $nome_arquivo = date('Y-m-d-H-m-s');
        $id_categoria = 1;
        $nome = Input::post('nome_produto');
        $preco = Input::post('preco_atual');
        $quantidade = Input::post('quantidade');
        $descricao = Input::post('descricao');
        if (Input::file('imagem')){
            $imagem =Input::file('imagem');
            $extensao =  $imagem->getClientOriginalExtension();
            if ($extensao!='jpg' && $extensao!='png'){
                return back()->with('erro','Arquivo não é uma imagem');
            }
            File::move($imagem,public_path().'/img/fotos/'.$nome_arquivo.'.'.$extensao);
            $img = $nome_arquivo.'.'.$extensao;
            DB::update('update produtos set `id_usuario`= ?, `id_categoria`= ?, `nome_produto`= ?, `preco_atual` = ?, `quantidade`= ? ,`data_post`= ?,`descricao` =?,`foto`=? where `id` = ?', [$id_usuario,$id_categoria,$nome,$preco,$quantidade,$data,$descricao,$img,$id]);
        }else{
            DB::update('update produtos set `id_usuario`= ?, `id_categoria`= ?, `nome_produto`= ?, `preco_atual` = ?, `quantidade`= ? ,`data_post`= ?,`descricao` =? where `id` = ?', [$id_usuario,$id_categoria,$nome,$preco,$quantidade,$data,$descricao,$id]);

        }

        \Session::flash('mensagem_sucesso','Produto Atualizado com Sucesso!!');
        return Redirect::to('inventario');
        //return $id;
    }


    public function deletar($id){
        //DELETE FROM `produtos` WHERE `produtos`.`id` = 25
        DB::delete('delete from `produtos` where `produtos`.`id` = ?',[$id]);
        \Session::flash('mensagem_sucesso','Produto Deletado com Sucesso!!');
        return Redirect::to('inventario');
    }
}
