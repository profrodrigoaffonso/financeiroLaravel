@extends('layouts.admin')

@section('content')
    <h1>Categorias</h1>
    <p><a href="{{ route('categorias.create') }}">Nova</a></p>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr>
                <td>{{ $categoria->nome }}</td> 
                <td><a href="{{ route('categorias.edit', ['id' => $categoria->id]) }}" class="btn btn-primary">Editar</a></td> 
            </tr>             
            @endforeach            
        </tbody>
    </table>
@endsection