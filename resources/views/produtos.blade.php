
@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('css/style2.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script  type="text/javascript" src="{{asset('js/typeahead.bundle.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            // Defining the local dataset
            var produtos = new Array();
            @foreach($produtos as $produto)
                @if(Auth::user()!=null)
                    @if($produto->id_usuario!= Auth::user()->id)
                        produtos.push("{{$produto->nome_produto}}")
                    @endif
                @else
                    produtos.push("{{$produto->nome_produto}}")
                @endif

            @endforeach
            // Constructing the suggestion engine
            var produtos = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                local: produtos
            });

            // Initializing the typeahead
            $('.typeahead').typeahead({
                    hint: true,
                    highlight: true, /* Enable substring highlighting */
                    minLength: 1 /* Specify minimum characters required for showing result */
                },
                {
                    name: 'produtos',
                    source: produtos
                });
        });
    </script>
    <header>
    <div class="header-informacoes">
        <p>Novo E-commerce </p>
    </div>
    <nav class="header-menu">
        <ul>
            <li><a>Produtos</a></li>
            <li><a>Serviços</a></li>
        </ul>
    </nav>
</header>

<div class="container">
        <div class="row">
            <nav class="filtro col-md-4">
                <form action="{{asset('buscarNome')}}" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control typeahead tt-query" name="produto" data-provide="typeahead" autocomplete="off" spellcheck="false"  placeholder="Buscar por palavra-chave" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="input-group-text" type="submit" id="basic-addon2">Buscar</button>
                        </div>
                    </div>
                </form>
                <form action="{{asset('filtrarPreco')}}" method="get">
                    <h2>Preço</h2>
                    <ul>
                        <li><input type="radio" name="preco" value="ate"> Até R$ 100</li>
                        <li><input type="radio" name="preco" value="entre"> Entre $100 e R$ 1000</li>
                        <li><input type="radio" name="preco" value="acima"> Acima de R$ 1000</li>
                        <button  class="input-group-text"  type="submit">Filtrar</button>
                    </ul>
                </form>
                <form action="{{asset('filtrarCategoria')}}" method="get">
                    <h2>Categoria</h2>
                    <ul>
                        @foreach($categorias as $categoria)
                        <li><input type="radio" name="categoria" value="{{$categoria->id}}"><span> {{$categoria->nome_categoria}}</span></li>
                        @endforeach
                        <button  class="input-group-text"  type="submit">Filtrar</button>
                    </ul>
                </form>
            </nav>

            <section class="produtos col-md-8">
                <h1>Recentes</h1>
                <ul class="row">
                    @foreach($produtos as $produto)
                        @if(Auth::user()!=null)
                            @if($produto->id_usuario!= Auth::user()->id)
                                <li class="col-6">
                                    <a href="{{asset('InfoProduto')}}?id={{$produto->id}}" style="text-decoration: none; ">
                                        <img style="width: 288px; height: 188px" src="{{asset('img/fotos/'.$produto->foto)}}">
                                        <span>R$ {{$produto->preco_atual}}</span>
                                        <h2><strong>{{$produto->nome_produto}}</strong></h2>
                                        <h2 style="font-size: 10px;">Última alteração dia: {{$produto->data_post}}</h2>
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="col-6">
                                <a href="{{asset('InfoProduto')}}?id={{$produto->id}}" style="text-decoration: none; ">
                                    <img style="width: 288px; height: 188px" src="{{asset('img/fotos/'.$produto->foto)}}">
                                    <span>R$ {{$produto->preco_atual}}</span>
                                    <h2><strong>{{$produto->nome_produto}}</strong></h2>
                                    <h2 style="font-size: 10px;">Última alteração dia: {{$produto->data_post}}</h2>
                                </a>
                            </li>
                        @endif
                    @endforeach

                </ul>
            </section>
        </div>
    </form>
</div>

<footer class="footer">
    <p>Este é um projeto da Disciplina de Banco de dados.</p>
    <p>Instituto Federal de Educação, Ciência e Tecnologia do Ceará.</p>
</footer>

@endsection
