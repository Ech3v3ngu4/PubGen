@extends('layouts/default')

@section('content')
<div class="row">
    <div class="col-sm-offset-3 col-sm-6">
        {{ Form::open(array(
            'url' => 'sign/in',
            'class'  => 'form-signin well'
        )) }}
            
            <h2 class="form-signin-heading">Entrar</h2>
            
            <div class="form-group">
                {{ Form::email('email', '', array('class' => 'form-control input-lg', 'autofocus', 'placeholder' => 'E-mail')) }}
            </div>
            
            <div class="form-group">
                {{ Form::password('password', array('class' => 'form-control input-lg', 'placeholder' => 'Senha')) }}
            </div>
            
            @if (Session::has('flash_error'))
                <div class="alert alert-danger">E-mail ou senha inválidos.</div>
            @endif
            
            <label class="checkbox">
                {{ Form::checkbox('remember', 'remember-me', true) }} Lembre-se de mim
            </label>
            
            @if(isset($redirect) && $redirect)
            {{-- Redirecionamento após o login --}}
            {{ Form::hidden('redirect', $redirect) }}
            @endif
            
            {{ Form::submit('Login', array('class' => 'btn btn-lg btn-primary btn-block')) }}
            <a href="{{ url('sign/recuperar') }}" title="Esqueceu sua senha?"
               class="btn btn-link">Esqueceu sua senha?</a>
               
            <a href="{{ url('sign/criar') }}" title="Criar Conta"
               class="btn btn-link">Criar Conta</a>
               
        {{ Form::close() }}
    </div>
</div>
@stop
