
@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/style1.css')}}">
<main class="intro">
    <h1>Egenharia de<br>Computação</h1>
    <p>5º Semestre</p>
</main>

<section class="produtos">
    <div class="container">
        <div class="row">
            <div class="produtos-item col-sm">
                <h2 class="produtos-paulista">Cireneu Guilherme</h2>
                <p>Bolsista no Laboratório de Fotônica, do IFCE, programador Web Front e Back-end.</p>
            </div>
            <div class="produtos-item col-sm">
                <h2 class="produtos-carioca">Marcelo de Souza</h2>
                <p>Bolsista na Prefeitura de Fortaleza, técnico em computadores.</p>
            </div>
            <div class="produtos-item col-sm">
                <h2 class="produtos-mineiro">Tiago Dionízio</h2>
                <p>Bolsista no Suporte do IFCE, exímeo programador robista.</p>
            </div>
        </div>
    </div>
</section>

<section class="locais container">
    <div class="locais-item row">
        <div class="col-sm">
            <img style="border: solid 1px #1b1e21; width: 460px; height: 220px;" src="{{asset('img/CRUD.png')}}">
        </div>
        <div class="col-sm">
            <h2>CRUD</h2>
            <p>Nesse aplicativo é possível fazermos a manutenção de um cadastro. O usuário quando cadastrado poderá criar um novo produto para vender, editá-lo ou excluílo.</p>
            <a href="#">Ver Mapa</a>
        </div>
    </div>

    <div class="locais-item row">
        <div class="col-sm">
            <img style="border: solid 1px #1b1e21; width: 460px; height: 220px;" src="{{asset('img/consulta.jpg')}}">
        </div>
        <div class="col-sm">
            <h2>Consulta</h2>
            <p>Existem 3 tipos de consulta. Por preço, categoria e por data. A categoria é uma tabela a parte, se relacionando com os produtos por meio de uma chave estrangeira.</p>
            <a href="#">Ver Mapa</a>
        </div>
    </div>

    <div class="locais-item row">
        <div class="col-sm">
            <img style="border: solid 1px #1b1e21; width: 460px; height: 220px;" src="{{asset('img/compra.jpg')}}">
        </div>
        <div class="col-sm">
            <h2>Compra</h2>
            <p>No projeto também teremos uma simulação de compra, que ficará guardado numa tabela individual nomeada vendas. O usuário poderá verificar o número de produtos seus vendidos e o quanto ganhou pelo site.</p>
            <a href="#">Ver Mapa</a>
        </div>
    </div>

</section>

<footer class="footer">
    <div class="container">
        <div class="row">
            <p class="col-sm-8">Este é um projeto da Disciplina de Banco de dados.</p>
            <p class="col-sm-8">Instituto Federal de Educação, Ciência e Tecnologia do Ceará.</p>
            <div class="col-sm">
                <img style="width: 150px;height:170px ;" src="{{asset('img/ifce.png')}}">
            </div>
        </div>
    </div>
</footer>

@endsection















