@extends('layouts.admin')

@section('content')
<form action="{{ route('categorias.store') }}" method="post">
    @csrf
    <div class="form-group">
      <label for="exampleInputPassword1">Nome</label>
      <input type="text" class="form-control" id="nome" name="nome">
    </div>    
    <button type="submit" class="btn btn-primary">Salvar</button>
  </form>
@endsection
