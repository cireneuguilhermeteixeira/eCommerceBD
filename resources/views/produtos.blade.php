
@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('css/style2.css')}}">

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
    <form action="" method="get">
        <div class="row">
            <nav class="filtro col-md-4">
                <h2>Preço</h2>
                <ul>
                    <li><input type="radio" name="faixa_preco" value="ate"> Até R$ 100</li>
                    <li><input type="radio" name="faixa_preco" value="entre"> Entre $100 e R$ 10000</li>
                    <li><input type="radio" name="faixa_preco" value="acima"> Acima de R$ 10000</li>
                </ul>
                <h2>Categoria</h2>
                <ul>
                    @foreach($categorias as $categoria)
                    <li><input type="checkbox" name="categoria" value="{{$categoria->id}}"><span> {{$categoria->nome_categoria}}</span></li>
                    @endforeach
                </ul>
                <h2>Data</h2>
                <ul>
                    <li><input type="checkbox" name="data" value="esse_mes"> Publicados nesse mês</li>
                    <li><input type="checkbox" name="data" value="mes_passado"> Publicados mês Passado</li>
                    <li><input type="checkbox" name="data" value="2_meses_passados"> Publicações mais antigas</li>
                </ul>
            </nav>

            <section class="produtos col-md-8">
                <h1>Recentes</h1>
                <ul class="row">
                    <li class="col-6">
                        <img src="img/cafe-12.jpg" alt="Café 1">
                        <span>R$ 3,25</span>
                        <h2>Vanilla Diceys</h2>
                    </li>

                    <li class="col-6">
                        <img src="img/cafe-22.jpg" alt="Café 1">
                        <span>R$ 4,50</span>
                        <h2>Blueberry Latte</h2>
                    </li>

                    <li class="col-6">
                        <img src="img/cafe-32.jpg" alt="Café 1">
                        <span>R$ 3,25</span>
                        <h2>Ghostbusters Brown</h2>
                    </li>

                    <li class="col-6">
                        <img src="img/cafe-42.jpg" alt="Café 1">
                        <span>R$ 4,50</span>
                        <h2>Strawberry Fields</h2>
                    </li>

                    <li class="col-6">
                        <img src="img/cafe-52.jpg" alt="Café 1">
                        <span>R$ 3,25</span>
                        <h2>Scane Comb</h2>
                    </li>

                    <li class="col-6">
                        <img src="img/cafe-62.jpg" alt="Café 1">
                        <span>R$ 4,50</span>
                        <h2>Wild Bill</h2>
                    </li>
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
