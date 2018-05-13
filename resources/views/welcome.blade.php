
@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/style1.css')}}">
<main class="intro">
    <h1>Cafés com a cara<br>do Brasil</h1>
    <p>Direto das fazendas de Minas Gerais</p>
</main>

<section class="sobre container">
    <h2>Uma Mistura de</h2>
    <div class="row">
        <div class="col-sm sobre-item">
            <img src="img/cafe-11.jpg">
            <h3>amor</h3>
        </div>
        <div class="col-sm sobre-item">
            <img src="img/cafe-21.jpg">
            <h3>perfeição</h3>
        </div>
    </div>
    <p>O café é uma bebida produzida a partir dos grãos torrados do fruto do cafeeiro. É servido tradicionalm
        aente quente, mas também pode ser consumido gelado. Ele é um estimulante, por possuir cafeína — geralmente 80 a 140 mg para cada 207 ml dependendo do método de preparação.</p>
</section>

<section class="produtos">
    <div class="container">
        <div class="row">
            <div class="produtos-item col-sm">
                <h2 class="produtos-paulista">Paulista</h2>
                <p>As condições climáticas não eram as melhores nessa primeira escolha e, entre 1800 e 1850, tentou-se o cultivo noutras regiões: o João Alberto Castelo Branco trouxe mudas do Pará</p>
            </div>
            <div class="produtos-item col-sm">
                <h2 class="produtos-carioca">Carioca</h2>
                <p>As condições climáticas não eram as melhores nessa primeira escolha e, entre 1800 e 1850, tentou-se o cultivo noutras regiões: o João Alberto Castelo Branco trouxe mudas do Pará</p>
            </div>
            <div class="produtos-item col-sm">
                <h2 class="produtos-mineiro">Mineiro</h2>
                <p>As condições climáticas não eram as melhores nessa primeira escolha e, entre 1800 e 1850, tentou-se o cultivo noutras regiões: o João Alberto Castelo Branco trouxe mudas do Pará</p>
            </div>
        </div>
        <a class="produtos-btn" href="#">Saiba Mais</a>
    </div>
</section>

<section class="locais container">
    <div class="locais-item row">
        <div class="col-sm">
            <img src="img/botafogo.jpg" alt="Brafé unidade Botafogo">
        </div>
        <div class="col-sm">
            <h2>Botafogo</h2>
            <p>As condições climáticas não eram as melhores nessa primeira escolha e, entre 1800 e 1850, tentou-se o cultivo.</p>
            <a href="#">Ver Mapa</a>
        </div>
    </div>

    <div class="locais-item row">
        <div class="col-sm">
            <img src="img/iguatemi.jpg" alt="Brafé unidade Iguatemi">
        </div>
        <div class="col-sm">
            <h2>Iguatemi</h2>
            <p>As condições climáticas não eram as melhores nessa primeira escolha e, entre 1800 e 1850, tentou-se o cultivo.</p>
            <a href="#">Ver Mapa</a>
        </div>
    </div>

    <div class="locais-item row">
        <div class="col-sm">
            <img src="img/botafogo.jpg" alt="Brafé unidade Mineirão">
        </div>
        <div class="col-sm">
            <h2>Mineirão</h2>
            <p>As condições climáticas não eram as melhores nessa primeira escolha e, entre 1800 e 1850, tentou-se o cultivo.</p>
            <a href="#">Ver Mapa</a>
        </div>
    </div>

</section>

<section class="assine">
    <div class="container">
        <div class="row">
            <div class="assine-info col-sm">
                <h2>Assine Nossa Newsletter</h2>
                <p>promoções e eventos mensais</p>
            </div>
            <form class="col-sm">
                <label>E-mail</label>
                <input type="text" placeholder="Digite seu e-mail">
                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>
</section>

<footer class="footer">
    <div class="container">
        <div class="row">
            <p class="col-sm-8">Este é um projeto da Disciplina de Banco de dados.</p>
            <p class="col-sm-8">Instituto Federal de Educação, Ciência e Tecnologia do Ceará.</p>
            <div class="col-sm">
                <img src="img/brafe.png" alt="Brafé">
            </div>
        </div>
    </div>
</footer>

@endsection















