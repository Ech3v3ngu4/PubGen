@extends('layouts/default')

@section('content')

<h1>{{{ $titulo }}}</h1>
<hr>

{{ Form::open(array('url' => 'sign/criar', 'class' => 'form-horizontal', 'role' => 'form')) }}
        
    <div class="form-group {{ ($errors->has('nome')?'has-error':'') }}">
        <label for="nome" class="col-lg-2 control-label">Nome</label>
        <div class="col-lg-6">    
            {{ Form::text('nome','' , array('class' => 'form-control', 'placeholder' => 'Nome')) }}
        </div>
        @include('templates.fielderror', array('field' => 'nome'))
    </div>
    <div class="form-group">
        <label for="email" class="col-lg-2 control-label">Nome em Publicações</label>
        <div class="col-lg-6">    
            {{ Form::text('nome_publicacao', '', array('class' => 'form-control', 'placeholder' => 'Nome em Publicações')) }}
        </div>
        @include('templates.fielderror', array('field' => 'nome_publicacao'))
    </div>
    <div class="form-group">
        <label for="instituicao" class="col-lg-2 control-label">Instituição</label>
        <div class="col-lg-6">    
            {{ Form::text('instituicao', '', array('class' => 'form-control', 'placeholder' => 'Instituição')) }}
        </div>
        @include('templates.fielderror', array('field' => 'instituicao'))
    </div>
    <div class="form-group">
        <label for="area" class="col-lg-2 control-label">Área</label>
        <div class="col-lg-6">    
            {{ Form::text('area', '', array('class' => 'form-control', 'placeholder' => 'Área')) }}
        </div>
        @include('templates.fielderror', array('field' => 'area'))
    </div>
    <div class="form-group">
        <label for="linha_pesquisa" class="col-lg-2 control-label">Linha de Pesquisa</label>
        <div class="col-lg-6">    
            {{ Form::text('linha_pesquisa', '', array('class' => 'form-control', 'placeholder' => 'Linha de Pesquisa')) }}
        </div>
        @include('templates.fielderror', array('field' => 'linha_pesquisa'))
    </div>
    <div class="form-group {{ ($errors->has('username')?'has-error':'') }}">
        <label for="username" class="col-lg-2 control-label">Nome de Usuário</label>
        <div class="col-lg-6">    
            {{ Form::text('username', '', array('class' => 'form-control', 'placeholder' => 'Nome de Usuário')) }}
        </div>
        @include('templates.fielderror', array('field' => 'username'))
    </div>
    <div class="form-group {{ ($errors->has('email')?'has-error':'') }}">
        <label for="email" class="col-lg-2 control-label">Endereço de Email</label>
        <div class="col-lg-6">    
            {{ Form::email('email', '', array('class' => 'form-control', 'placeholder' => 'Email')) }}
        </div>
        @include('templates.fielderror', array('field' => 'email'))
    </div>
    <div class="form-group {{ ($errors->has('password')?'has-error':'') }}">
        <label for="password" class="col-lg-2 control-label">Senha</label> 
        <div class="col-lg-6">      
            {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
        </div>
        @include('templates.fielderror', array('field' => 'password'))
    </div>
    <div class="form-group {{ ($errors->has('password_confirmation')?'has-error':'') }}">
        <label for="password_confirmation" class="col-lg-2 control-label">Confirmar Senha</label> 
        <div class="col-lg-6">      
            {{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Password Confirmation')) }}
        </div>
        @include('templates.fielderror', array('field' => 'password_confirmation'))
    </div>
    
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            {{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}
            <a href="{{ url('sign/in') }}" title="Cancelar"
                class="btn btn-default">Cancelar</a>
        </div>
    </div>
{{ Form::close() }}
@stop