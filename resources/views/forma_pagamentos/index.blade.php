@extends('layouts.admin')

@section('content')
    <h1>Formas de pagamento</h1>
    <p><a href="{{ route('forma_pagamentos.create') }}">Nova</a></p>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($forma_pagamentos as $forma)
            <tr>
                <td>{{ $forma->nome }}</td>   
                <td><a href="{{ route('forma_pagamentos.edit', ['id' => $forma->id]) }}" class="btn btn-primary">Editar</a></td> 
            @endforeach            
        </tbody>
    </table>
@endsection