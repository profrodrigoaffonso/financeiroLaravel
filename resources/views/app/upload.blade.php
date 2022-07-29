@extends('layouts.app')

@section('content')
<h1 class="text-center">Upload</h1>
<form action="{{ route('pagamentos.upload.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @component('components.forms.file',[
        'label'     => 'Arquivo',
        'name'      => 'arquivo',
        'id'        => 'arquivo',
        'required'  => 'required'
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
