@extends('layouts/default')

@section('content')

<h1>{{$titulo}}</h1>
<hr>

{{ Form::open(array('url' => 'publicacoes/criar', 'class'=>'form-horizontal', 'role'=> 'form')) }}
    
    @include('templates.cruderrors')
    
    <div class="form-group">
        <label for="nome" class="col-lg-2 control-label">Nome</label>
        <div class="col-lg-4">
            {{ Form::text('titulo', '', array('class' => 'form-control', 'placeholder' => 'Titulo da Publicação')) }}
        </div>
        <div class="form-group publicacao-autor">
            <label for="autores" class="col-lg-2 control-label">Autores</label>
            <div class="col-lg-4">
                @if(isset($autores))
                    @foreach($autores as $key => $autor)
                        @include('publicacao/autor', array('key' => $key, 'autor' => $autor))
                    @endforeach
                @endif

                <div class="row add-autor-wrap">
                    <div class="col-lg-4">
                        <button type="button" title="autor" class="btn btn-primary add-autor">
                            <span class="glyphicon glyphicon-plus"></span>
                            Adicionar Autor
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <label for="tipo" class="col-lg-2 control-label">Tipo da Publicação</label>
        <div class="col-lg-4">
            {{ Form::text('tipo', '', array('class' => 'form-control', 'placeholder' => 'Tipo da Publicação')) }}
        </div>
    </div>
    <div class="form-group">
        <label for="alcance" class="col-lg-2 control-label">Alcance da Publicação</label>
        <div class="col-lg-4">
            {{ Form::select('alcance', array('nacional' => 'Nacional', 
                                            'internacional' => 'Internacional'
                                       ), 
                                       '',
                                       array('class' => 'form-control')
                ) 
            }}
        </div>
    </div>
    <div class="form-group">
        <label for="natureza" class="col-lg-2 control-label">Natureza da Publicação</label>
        <div class="col-lg-4">
            {{ Form::select('natureza', array('artigo_completo' => 'Artigo Completo', 
                                              'resumo_expandido' => 'Resumo Expandido', 
                                              'resumo' =>' Resumo'
                                        ), 
                                        '',
                                        array('class' => 'form-control')
                ) 
            }}
        </div>
    </div>
    <div class="form-group">
        <label for="editores" class="col-lg-2 control-label">Editores</label>
        <div class="col-lg-4">
            {{ Form::text('editores', '', array('class' => 'form-control', 'placeholder' => 'Nome do Editor')) }}
        </div>
    </div>
    <div class="form-group">
        <label for="titulo_periodico" class="col-lg-2 control-label">Título do Periódico</label>
        <div class="col-lg-4">
            {{ Form::text('titulo_periodico', '', array('class' => 'form-control', 'placeholder' => 'Título do Periódico')) }}
        </div>
    </div>
    <div class="form-group">
        <label for="Editora" class="col-lg-2 control-label">Editora</label>
        <div class="col-lg-4">
            {{ Form::text('Editora', '', array('class' => 'form-control', 'placeholder' => 'Nome da Editora')) }}
        </div>
    </div>
    <div class="form-group">
        <label for="local_publicacao" class="col-lg-2 control-label">Local da Publicação</label>
        <div class="col-lg-4">
            {{ Form::text('local_publicacao', '', array('class' => 'form-control', 'placeholder' => 'Local da Publicação')) }}
        </div>
    </div>
    <div class="form-group">
        <label for="num_paginas" class="col-lg-2 control-label">Número de páginas</label>
        <div class="col-lg-4">
            {{ Form::text('num_paginas', '', array('class' => 'form-control', 'placeholder' => 'Número de páginas')) }}
        </div>
    </div>
    <div class="form-group">
        <label for="ano" class="col-lg-2 control-label">Ano da Publicação</label>
        <div class="col-lg-4">
            {{ Form::text('ano', '', array('class' => 'form-control', 'placeholder' => 'Ano da Publicação')) }}
        </div>
    </div>
    <hr>
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            {{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}
            <a href="{{ url('') }}" title="Cancelar"
                class="btn btn-default">Cancelar</a>
        </div>
    </div>
    
{{ Form::close() }}
@stop