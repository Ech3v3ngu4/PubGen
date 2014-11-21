@extends('layouts/default')

@section('content')

<h1>{{{ $titulo }}}</h1>
<hr>

{{ Form::open(array('url' => 'publicacoes/editar', 'files'=>true, 'class'=>'form-horizontal', 'role'=> 'form')) }}
        
    <div class="form-group  {{ ($errors->has('titulo')?'has-error':'') }}">
        <label for="nome" class="col-lg-2 control-label">Título</label>
        <div class="col-lg-4">
            {{ Form::text('titulo', $publicacao->titulo, array('class' => 'form-control', 'placeholder' => 'Título da Publicação')) }}
        </div>
        @include('templates.fielderror', array('field' => 'titulo'))
    </div>
    <div class="form-group publicacao-autor">
            <label for="autores" class="col-lg-2 control-label">Autores</label>
            <div class="col-lg-4">
                @if(isset($autores))
                    @foreach($autores as $key => $autor)
                        @include('publicacoes/autor', array('key' => $key, 'autor' => $autor))
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
    
    <div class="form-group {{ ($errors->has('tipo')?'has-error':'') }}">
        <label for="tipo" class="col-lg-2 control-label">Tipo da Publicação</label>
        <div class="col-lg-4">
            {{ Form::select('tipo', $tipos, '',array('class' => 'form-control')) }}
        </div>
        @include('templates.fielderror', array('field' => 'tipo'))
    </div>
    <div class="form-group  {{ ($errors->has('alcance')?'has-error':'') }}">
        <label for="alcance" class="col-lg-2 control-label">Alcance da Publicação</label>
        <div class="col-lg-4">
            {{ Form::select('alcance', array('nacional' => 'Nacional', 
                                            'internacional' => 'Internacional'
                                       ), 
                                       $publicacao->alcance,
                                       array('class' => 'form-control')
                ) 
            }}
        </div>
        @include('templates.fielderror', array('field' => 'alcance'))
    </div>
    <div class="form-group  {{ ($errors->has('natureza')?'has-error':'') }}">
        <label for="natureza" class="col-lg-2 control-label">Natureza da Publicação</label>
        <div class="col-lg-4">
            {{ Form::select('natureza', array('artigo_completo' => 'Artigo Completo', 
                                              'resumo_expandido' => 'Resumo Expandido', 
                                              'resumo' =>' Resumo'
                                        ), 
                                        $publicacao->natureza,
                                        array('class' => 'form-control')
                ) 
            }}
        </div>
    </div>
    <div class="form-group publicacao-editor">
        <label for="editores" class="col-lg-2 control-label">Editores</label>
        <div class="col-lg-4">
            @if(isset($editores))
                @foreach($editores as $key => $editor)
                    @include('publicacoes/editor', array('key' => $key, 'editor' => $editor))
                @endforeach
            @endif

            <div class="row add-editor-wrap">
                <div class="col-lg-4">
                    <button type="button" title="editor" class="btn btn-primary add-editor">
                        <span class="glyphicon glyphicon-plus"></span>
                        Adicionar Editor
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group  {{ ($errors->has('titulo_periodico')?'has-error':'') }}">
        <label for="titulo_periodico" class="col-lg-2 control-label">Título do Periódico</label>
        <div class="col-lg-4">
            {{ Form::text('titulo_periodico', $publicacao->titulo_periodico, array('class' => 'form-control', 'placeholder' => 'Título do Periódico')) }}
        </div>
        @include('templates.fielderror', array('field' => 'titulo_periodico'))
    </div>
    <div class="form-group  {{ ($errors->has('editora')?'has-error':'') }}">
        <label for="editora" class="col-lg-2 control-label">Editora</label>
        <div class="col-lg-4">
            {{ Form::text('editora', $publicacao->editora, array('class' => 'form-control', 'placeholder' => 'Nome da Editora')) }}
        </div>
        @include('templates.fielderror', array('field' => 'editora'))
    </div>
    <div class="form-group  {{ ($errors->has('local_publicacao')?'has-error':'') }}">
        <label for="local_publicacao" class="col-lg-2 control-label">Local da Publicação</label>
        <div class="col-lg-4">
            {{ Form::text('local_publicacao', $publicacao->local_publicacao, array('class' => 'form-control', 'placeholder' => 'Local da Publicação')) }}
        </div>
        @include('templates.fielderror', array('field' => 'local_publicacao'))
    </div>
    <div class="form-group  {{ ($errors->has('num_paginas')?'has-error':'') }}">
        <label for="num_paginas" class="col-lg-2 control-label">Número de páginas</label>
        <div class="col-lg-4">
            {{ Form::text('num_paginas', $publicacao->num_paginas, array('class' => 'form-control', 'placeholder' => 'Número de páginas')) }}
        </div>
        @include('templates.fielderror', array('field' => 'num_paginas'))
    </div>
    <div class="form-group  {{ ($errors->has('ano')?'has-error':'') }}">
        <label for="ano" class="col-lg-2 control-label">Ano da Publicação</label>
        <div class="col-lg-4">
            {{ Form::text('ano', $publicacao->ano_publicacao, array('class' => 'form-control', 'placeholder' => 'Ano da Publicação')) }}
        </div>
        @include('templates.fielderror', array('field' => 'ano'))
    </div>
    <div class="form-group">
        <label for="pdf" class="col-lg-2 control-label">Upload de Publicação</label>
        <div class="col-lg-4 alert alert-info">
            {{ Form::file('pdf','',array('class'=>'form-control')) }}
        </div>
    </div>
    @if($publicacao->url)
    <div class="form-group">
        <label for="pdf" class="col-lg-2 control-label">Arquivo Para Download</label>
        <div class="col-lg-4">
            <a type="button" class="btn btn-warning"  href="{{ $publicacao->url }}">Download da Publicação</a>
        </div>
    </div>
    @endif
    <hr>
    
    {{ Form::hidden('id', $publicacao->id) }}
    
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            {{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}
            <a href="{{ url('/') }}" title="Cancelar"
                class="btn btn-default">Cancelar</a>
        </div>
    </div>
{{ Form::close() }}
@stop