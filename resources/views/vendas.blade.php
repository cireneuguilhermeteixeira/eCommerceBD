@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('css/style3.css')}}">
    <main class="main-container container-fluid">

        <div class="row">
            <nav class="side-nav col-md-4 col-xl-3">
                <ul>
                    <li><a class="nav-produtos" href="{{asset('inventario')}}">Produtos</a></li>
                    <li><a class="nav-contabilidade" href="{{asset('Contabilidade')}}">Contabilidade</a></li>
                    <li><a class="nav-plugins" href="https://github.com/cireneuguilhermeteixeira/eCommerceBD" target="_blank">GitHub</a></li>
                </ul>
            </nav>
            <section class="produtos col-md-8 col-xl-9 mb-5">
                <header class="row align-items-center mt-3">
                    <div class="col">
                        @if(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">{{Session::get('mensagem_sucesso')}}</div><br>
                        @endif

                        <h1>Minhas Vendas</h1>
                            <br><br>
                    </div>
                </header>

                <ul>
                        <table class="table" style=" border: solid black 1px; text-align: center">
                            <th style="text-align: center">Comprador</th>
                            <th style="text-align: center">Nome do Produto</th>
                            <th style="text-align: center">Quantidade</th>
                            <th style="text-align: center;">Preço Vendido (R$)</th>
                            <th style="text-align: center">Data da Venda</th>


                            <tbody>
                            @foreach($vendas as $venda)
                                <tr>
                                    <td>{{$venda->usuario_comprou}}</td>
                                    <td>{{$venda->produto}}</td>
                                    <td>{{$venda->quantidade}}</td>
                                    <td>{{$venda->preco_vendido}}</td>
                                    <td>{{$venda->data_venda}}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    <h2>Lucro pelo site: R$ {{$apurado}}</h2>
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

















