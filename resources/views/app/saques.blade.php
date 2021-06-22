@extends('layouts.app')

@section('content')
<h1 class="text-center">Saques</h1>
<form action="{{ route('saques.salvar') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Bancos</label>
        <select class="form-control" id="banco_id" name="banco_id" required>
            <option value="">Selecione</option>
            @foreach($bancos as $banco)
                <option value="{{ $banco->id }}">{{ $banco->nome }}</option>
            @endforeach
        </select>       
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Valor</label>
      <input type="text" class="form-control" id="valor" name="valor" required>     
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col">
                <label for="exampleInputPassword1">Data</label>
                <input type="date" value="{{ date('Y-m-d') }}" class="form-control" id="data" name="data" required>
            </div>
            <div class="col">
                <label for="exampleInputPassword1">Hora</label>
                <input type="time" value="{{ date('H:i') }}" class="form-control" id="hora" name="hora" required>
            </div>
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary">Salvar</button>
  </form>
@endsection