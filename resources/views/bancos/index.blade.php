@extends('layouts.admin')

@section('content')
    <h1>Bancos</h1>
    <p><a href="{{ route('bancos.create') }}">Novo</a></p>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Nome</th>
                <th scope="col">Agência</th>
                <th scope="col">Conta</th>
                <th scope="col">Correntista</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($bancos as $banco)
            <tr>
                <td>{{ $banco->codigo }}</td>
                <td>{{ $banco->nome }}</td>
                <td>{{ $banco->agencia }}</td>
                <td>{{ $banco->conta }}</td>               
                <td>{{ $banco->correntista == 's' ? 'Sim' : 'Não' }}</td> 
                <td><a href="{{ route('bancos.edit', ['id' => $banco->id]) }}" class="btn btn-primary">Editar</a></td> 
            </tr>
            @endforeach            
        </tbody>
    </table>
@endsection