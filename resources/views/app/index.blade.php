@extends('layouts.app')

@section('content')
    <h1 class="text-center">App</h1><br><br>
    <a href="{{ route('pagamentos.inserir') }}"><button type="button" class="btn btn-primary btn-lg btn-block">Inserir</button></a><br><br>
    <a href="{{ route('saques.inserir') }}"><button type="button" class="btn btn-primary btn-lg btn-block">Saques</button></a>


@endsection