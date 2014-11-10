@extends('layouts/default')

@section('content')

<div class="text-center">  
<h1>{{{ $titulo }}}</h1>
<hr>

<div class="alert alert-danger">
    <p>
        Você tem certeza que deseja remover <strong>{{{ $publicacao->nome }}}</strong>?
    </p>
    <p>
        Esta ação vai remover todos os dados da cidade e não pode ser desfeita.
    </p>
</div>
  
    {{ Form::open(array('url' => ('publicacoes/remover'))) }}
        {{ Form::hidden('id', $publicacao->id) }}
        {{ Form::submit('Remover', array('class' => 'btn btn-warning')) }}        
        <a class="btn btn-default" href="{{ url('') }}">
            Cancelar
        </a>
    {{ Form::close() }}
</div>