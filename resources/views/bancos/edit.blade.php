@extends('layouts.admin')

@section('content')
<form action="{{ route('bancos.update') }}" method="POST">
    @csrf
    @method('PUT')
    @component('components.forms.hidden',[
        'name'      => 'id',
        'id'        => 'id',
        'value'     => $banco->id,
    ])        
    @endcomponent
    @component('components.forms.input',[
        'label'     => 'Código',
        'name'      => 'codigo',
        'id'        => 'codigo',
        'value'     => $banco->codigo,
        'required'  => 'required',
        'maxlength' => 3
    ])        
    @endcomponent
    @component('components.forms.input',[
        'label'     => 'Nome',
        'name'      => 'nome',
        'id'        => 'nome',
        'value'     => $banco->nome,
        'required'  => 'required',
        'maxlength' => 100
    ])        
    @endcomponent
    @component('components.forms.input',[
        'label'     => 'Agência',
        'name'      => 'agencia',
        'value'     => $banco->agencia,
        'id'        => 'agencia',
        'required'  => 'required',
        'maxlength' => 6
    ])        
    @endcomponent
    @component('components.forms.input',[
        'label'     => 'Conta',
        'name'      => 'conta',
        'id'        => 'conta',
        'value'     => $banco->conta,
        'required'  => 'required',
        'maxlength' => 10
    ])        
    @endcomponent
    @component('components.forms.checkbox', [
        'label'     => 'Correntista',
        'id'        => 'correntista',
        'name'      => 'correntista',
        'value'     => 's',
        'valueBd'   => $banco->correntista
    ])        
    @endcomponent
    @component('components.forms.button',[
        'label'     => 'Salvar',
        'class'     => 'btn btn-primary',
        'type'      => 'submit'
    ])        
    @endcomponent
  </form>
@endsection
