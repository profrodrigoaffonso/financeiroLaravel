@extends('layouts.admin')

@section('content')
<form action="{{ route('bancos.store') }}" method="POST">
    @csrf
    @component('components.forms.input',[
        'label'     => 'Código',
        'name'      => 'codigo',
        'id'        => 'codigo',
        'required'  => 'required',
        'maxlength' => 3
    ])        
    @endcomponent
    @component('components.forms.input',[
        'label'     => 'Nome',
        'name'      => 'nome',
        'id'        => 'nome',
        'required'  => 'required',
        'maxlength' => 100
    ])        
    @endcomponent
    @component('components.forms.input',[
        'label'     => 'Agência',
        'name'      => 'agencia',
        'id'        => 'agencia',
        'required'  => 'required',
        'maxlength' => 6
    ])        
    @endcomponent
    @component('components.forms.input',[
        'label'     => 'Conta',
        'name'      => 'conta',
        'id'        => 'conta',
        'required'  => 'required',
        'maxlength' => 10
    ])        
    @endcomponent
    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" value="s" id="correntista" name="correntista">
      <label class="form-check-label" for="correntista">Correntista</label>
    </div>
    @component('components.forms.button',[
        'label'     => 'Salvar',
        'class'     => 'btn btn-primary',
        'type'      => 'submit'
    ])        
    @endcomponent
  </form>
@endsection
