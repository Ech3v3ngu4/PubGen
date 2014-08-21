@extends('layouts/default')

@section('content')

<h1>{{$titulo}}</h1>
<hr>

{{ Form::open(array('url' => 'publicacoes/criar', 'class'=>'form-horizontal', 'role'=> 'form')) }}
    
    @include('templates.cruderrors')
    
    <div class="form-group">
        <label for="nome" class="col-lg-2 control-label">Nome</label>
        <div class="col-lg-6">
            {{ Form::text('nome', $publicacao->nome, array('class' => 'form-control', 'placeholder' => 'Nome')) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            {{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}
            <a href="{{ url('') }}" title="Cancelar"
                class="btn btn-default">Cancelar</a>
        </div>
    </div>
{{ Form::close() }}
@stop