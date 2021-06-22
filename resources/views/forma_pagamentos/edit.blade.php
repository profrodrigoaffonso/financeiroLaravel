@extends('layouts.admin')

@section('content')
<form action="{{ route('forma_pagamentos.update') }}" method="post">
    @csrf
    @method('PUT')
    @component('components.forms.hidden',[
        'name'      => 'id',
        'id'        => 'id',
        'value'     => $forma_pagamento->id,
    ])        
    @endcomponent
    @component('components.forms.input',[
        'label'     => 'Nome',
        'name'      => 'nome',
        'id'        => 'nome',
        'required'  => 'required',
        'value'     => $forma_pagamento->nome,
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
