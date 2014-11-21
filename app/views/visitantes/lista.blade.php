@extends('layouts/default')
@section('content')

<h1>{{{ $titulo }}}</h1>
<hr>

@include('templates.crudmenu', array('search' => 'publicacoes', 'buttons' => array()))

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Título</th>
            <th>Autores</th>
            <th>Veículo de Publicação</th>
            <th>Ano</th>
            <th width="25%">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($publicacoes as $publicacao)
        <tr>
            <td>{{  $publicacao->titulo }}</td>
            <td> 
                @foreach($publicacao->autores as $autor)
                    {{ $autor->nome }}&nbsp
                @endforeach
            </td>
            <td>{{{ $publicacao->editora }}}</td>
            <td>{{{ $publicacao->ano_publicacao }}}</td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-xs btn-info" href="{{ url('publicacoes/visualizar',$publicacao->id) }}">
                        <i class="glyphicon glyphicon-search"></i>
                        <span class="hidden-phone">Visualizar</span>
                    </a>
                </div>
            </td>
        @endforeach   
    </tbody>
</table>

{{ $publicacoes->appends(array('pesquisa' => $pesquisa))->links() }}

@stop