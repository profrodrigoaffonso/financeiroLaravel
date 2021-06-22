@extends('layouts.app')

@section('content')
<h1 class="text-center">Inserir</h1>
<form action="{{ route('pagamentos.salvar') }}" method="POST">
    @csrf
    @component('components.forms.select',[
        'label'     => 'Categoria',
        'name'      => 'categoria_id',
        'id'        => 'categoria_id',
        'required'  => 'required',
        'values'    => $categorias
    ])        
    @endcomponent
    @component('components.forms.select',[
        'label'     => 'Forma de pagamento',
        'name'      => 'forma_pagamento_id',
        'id'        => 'forma_pagamento_id',
        'required'  => 'required',
        'values'    => $formas
    ])        
    @endcomponent
    @component('components.forms.input',[
        'label'     => 'Valor',
        'name'      => 'valor',
        'id'        => 'valor',
        'required'  => 'required',
        'maxlength' => 10        
    ])        
    @endcomponent
    @component('components.forms.datahora')        
    @endcomponent
    @component('components.forms.textarea',[
        'label'     => 'Obs',
        'name'      => 'obs',
        'id'        => 'obs'
    ])        
    @endcomponent    
    @component('components.forms.button',[
        'label'     => 'Salvar',
        'class'     => 'btn btn-primary',
        'type'      => 'submit'
    ])        
    @endcomponent
  </form>
  <script src="/js/jquery-3.6.0.min.js"></script>
  <script src="/js/jquery.mask.min.js"></script>
  <script>
    $('#valor').mask('0000,00', {reverse: true})
  </script>
@endsection