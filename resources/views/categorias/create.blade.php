@extends('layouts.admin')

@section('content')
<form action="{{ route('categorias.store') }}" method="post">
    @csrf
    @component('components.forms.input',[
        'label'     => 'Nome',
        'name'      => 'nome',
        'id'        => 'nome',
        'required'  => 'required',
        'maxlength' => 100
    ])        
    @endcomponent
    @component('components.forms.button',[
        'label'   => 'Salvar',
        'class'   => 'btn btn-primary',
        'type'    => 'submit'
    ])        
    @endcomponent    
  </form>
@endsection
