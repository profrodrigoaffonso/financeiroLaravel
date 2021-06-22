<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>App Name</title>

    <!-- Principal CSS do Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body>
    <div class="container-fluid">
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <h5 class="my-0 mr-md-auto font-weight-normal">Financeiro - Admin</h5>
            <nav class="my-2 my-md-0 mr-md-3">
              <a class="p-2 text-dark" href="{{ route('pagamentos.index') }}">Pagamentos</a>
              <a class="p-2 text-dark" href="{{ route('pagamentos.exportar') }}">Exportar</a>
              <a class="p-2 text-dark" href="{{ route('bancos.index') }}">Bancos</a>
              <a class="p-2 text-dark" href="{{ route('categorias.index') }}">Categorias</a>
              <a class="p-2 text-dark" href="{{ route('forma_pagamentos.index') }}">Forma de pagamentos</a>
              <a class="p-2 text-dark" href="{{ route('login.logout') }}">Sair</a>
            </nav>
            {{-- <a class="btn btn-outline-primary" href="#">Cadastro</a> --}}
          </div>
        @yield('content')
    </div>
  </body>
</html>
