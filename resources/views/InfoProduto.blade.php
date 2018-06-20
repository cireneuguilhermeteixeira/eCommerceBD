@extends('layouts.app')
<title>{{$produto->nome_produto}}</title>

@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('css/style3.css')}}">
    <main class="main-container container-fluid">

        <div class="row">


            <section class="produtos col-md-8 col-xl-9 mb-5">
                @if(Session::has('mensagem_aviso'))
                    <div class="alert alert-secondary">{{Session::get('mensagem_aviso')}}</div><br>
                @endif
                <form action="{{asset('Comprar')}}" method="get">
                    <header class="row align-items-center mt-3">
                            <h1 class="col">{{$produto->nome_produto}}</h1>
                        <button type="submit" class='adicionar-produtos mr-3 ml-3'> Comprar</button>
                    </header>
                    <ul>
                        <input type="hidden"  name ="produto" value="{{$produto->id}}">
                        <li class="produtos-item">
                            <div class="media">
                                <ul class="tab-avatars" data-anime="scroll">
                                    <li>
                                        <figure class="figure">
                                                <img style="width: 200px; height: 200px" src="{{asset('img/fotos/'.$produto->foto)}}" class="figure-img img-fluid " >
                                        </figure>
                                    </li>
                                </ul>
                                <ul class="">
                                    <li> <strong>Categoria: </strong>   {{$categoria}}
                                    </li>
                                    <li>
                                        <strong>Publicado por: </strong>{{$dono}}
                                    </li>
                                    <li> <strong>Preço: </strong>
                                        R$ {{$produto->preco_atual}}
                                    </li>
                                    <li><strong>Quantidade no estoque: </strong>
                                        @if($produto->quantidade>0)
                                            <select name="quantidade">
                                                @for($i=$produto->quantidade; $i>0; $i--)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        @else
                                            {{$produto->quantidade}}
                                        @endif
                                    </li>
                                    <li><strong>Descrição: </strong>
                                        {{$produto->descricao}}
                                    </li>
                                    <li><strong>Data da ultima edição: </strong>
                                        {{$produto->data_post}}
                                    </li>

                                </ul>
                            </div>
                        </li>
                    </ul>
                </form>
            </section>
        </div>
    </main>

    <footer class="footer">
        <p>Este é um projeto da Disciplina de Banco de dados. Mais em origamid.com</p>
        <p>Instituto Federal de Educação, Ciência e Tecnologia do Ceará.</p>
    </footer>

@endsection

















