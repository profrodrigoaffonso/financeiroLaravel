@extends('layouts.login')

@section('content')
<form class="form-signin" method="POST" action="{{ route('login.login') }}">
    @csrf
    <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Entrar no sistema</h1>
    <label for="email" class="sr-only">E-mail</label>
    <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required autofocus>
    <label for="password" class="sr-only">Senha</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="Senha" required>
    {{-- <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div> --}}
    <button class="btn btn-lg btn-primary btn-block" type="submit">Autenticar</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
  </form>
  @endsection