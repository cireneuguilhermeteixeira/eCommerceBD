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


                @if(Request::is('editando/*'))
                    {!! Form::model($produto,['method'=>'PATCH','enctype'=>'multipart/form-data','url'=>'editar/'.$produto->id.'/salvar']) !!}
                    @csrf

                @else
                    {!! Form::open(['method'=>'POST','enctype'=>'multipart/form-data','url'=>'criar/salvar']) !!}

                @endif
                    <header class="row align-items-center mt-3">
                        @if(Request::is('editando/*'))
                            <h1 class="col"> Editando um Produto</h1>
                        @else
                            <h1 class="col">Adicionando um novo Produto</h1>
                        @endif
                            @csrf

                            {!! Form::submit('Salvar',['class'=>'adicionar-produtos mr-3 ml-3']) !!}
                    </header>
                    <ul>

                        <li class="produtos-item">
                                <div class="media">
                                    <ul class="tab-avatars" data-anime="scroll">
                                        <li>
                                            <figure class="figure">
                                                @if(Request::is('editando/*'))
                                                    <img style="width: 200px; height: 200px" src="{{asset('img/fotos/'.$produto->foto)}}" class="figure-img img-fluid " >
                                                @else
                                                    <img style="width: 200px; height: 200px" src="{{asset('img/fotos/default.png')}}" class="figure-img img-fluid " >
                                                @endif

                                                    <figcaption class="figure-caption">
                                                    <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
                                                    <div><input value="Escolher imagem" name="imagem" type="file"/></div>
                                                </figcaption>
                                            </figure>
                                        </li>
                                    </ul>
                                    <ul class="">
                                        <li><label>* Categoria</label>
                                            <select name="categoria" id="">
                                                @foreach($categorias as $categoria)
                                                    <option value="{{$categoria->id}}">{{$categoria->nome_categoria}}</option>
                                                @endforeach
                                            </select>
                                        </li>
                                        <li>
                                            {!! Form::label('nome_produto','*Nome:') !!}
                                            {!! Form::input('text','nome_produto',null, ['class'=>'form-control','autofocus','placeholder'=>'Nome']) !!}
                                        </li>
                                        <li>
                                            {!! Form::label('preco_atual','*Preço:') !!}
                                            {!! Form::input('number','preco_atual',null, ['step'=>'0.01','min'=>'0','class'=>'form-control','autofocus','placeholder'=>'Preço']) !!}
                                        </li>
                                        <li>
                                            {!! Form::label('quantidade','Quantidade:') !!}
                                            {!! Form::input('number','quantidade',null, ['class'=>'form-control','autofocus','placeholder'=>'Quantidade']) !!}
                                        </li>
                                        <li>
                                            {!! Form::label('descricao','Descrição:') !!}
                                            {!! Form::textarea('descricao',null, ['class'=>'form-control','autofocus','placeholder'=>'Descrição']) !!}
                                        </li>

                                    </ul>
                                </div>
                        </li>
                    </ul>
                    {!! Form::close() !!}
            </section>
        </div>
    </main>

    <footer class="footer">
        <p>Este é um projeto da Disciplina de Banco de dados. Mais em origamid.com</p>
        <p>Instituto Federal de Educação, Ciência e Tecnologia do Ceará.</p>
    </footer>

@endsection

















