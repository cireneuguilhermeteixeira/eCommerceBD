@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/style3.css')}}">
<main class="main-container container-fluid">

    <div class="row">
        <nav class="side-nav col-md-4 col-xl-3">
            <ul>
                <li><a class="nav-contabilidade" href="#">Contabilidade</a></li>
                <li><a class="nav-produtos" href="#">Produtos</a></li>
                <li><a class="nav-paginas" href="#">Páginas</a></li>
                <li><a class="nav-plugins" href="#">Plugins</a></li>
                <li><a class="nav-formularios" href="#">Formulários</a></li>
                <li><a class="nav-hospedagens" href="#">Hospedagens</a></li>
            </ul>
        </nav>
        <section class="produtos col-md-8 col-xl-9 mb-5">
            <header class="row align-items-center mt-3">
                <div class="col">
                    @if(Session::has('mensagem_sucesso'))
                        <div class="alert alert-success">{{Session::get('mensagem_sucesso')}}</div><br>
                    @endif

                    <h1>Meus Produtos publicados</h1>
                </div>
                <a class="adicionar-produtos mr-3 ml-3" href="{{asset('/criar')}}">Adicionar um Produto</a>
            </header>

            <ul>
                @foreach($produtos as $produto)
                <li class="produtos-item">
                    <div class="media">
                        <img style="width: 200px; height: 200px" src="{{asset('img/fotos/'.$produto->foto.'')}}">
                        <ul class="media-body">
                            <li><span>Nome</span> {{$produto->nome_produto}}</li>
                            <li><span>Preço </span> R$ {{$produto->preco_atual}} </li>
                            <li>
                                <span>Descrição</span><br>
                                <p>{{$produto->descricao}}</p>
                            </li>
                        </ul>

                        <form action="{{asset('deletar/'.$produto->id)}}" onsubmit="return ConfirmDelete()" method="post">
                            @csrf
                            <button type="submit" class="btn btn-default btn-sm"><img  src="{{asset('img/lixeira.jpg')}}" alt=""></button>
                        </form>
                          <a href="{{asset('/editando/'.$produto->id.'')}}" style="margin-right: 30px"></a>
                    </div>
                </li>
                @endforeach
            </ul>
        </section>
    </div>
</main>

<footer class="footer">
    <p>Este é um projeto da Disciplina de Banco de dados. Mais em origamid.com</p>
    <p>Instituto Federal de Educação, Ciência e Tecnologia do Ceará.</p>
</footer>
<script>
    function opcoes() {

    }
    function ConfirmDelete()
    {
        var x = confirm("Tem certeza que deseja excluir o Produto?");
        if (x)
            return true;
        else
            return false;
    }
</script>
@endsection

















