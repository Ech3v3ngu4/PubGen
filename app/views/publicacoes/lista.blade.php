@extends('layouts/default')
@section('content')

<h1>{{{ $titulo }}}</h1>
<hr>

@include('templates.crudmenu', array('search' => 'publicacoes', 'buttons' => array(array('url' => 'publicacoes/criar', 'icon' => 'glyphicon-plus', 'label' => 'Criar Publicação'))))

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Título
                <a class="glyphicon glyphicon-arrow-down" href="{{url('publicacoes?ordem=asc&campo=titulo')}}"></a> 
                <a class="glyphicon glyphicon-arrow-up" href="{{url('publicacoes?ordem=desc&campo=titulo')}}"></a>
            </th>
            <th>Autores</th>
            <th>Veículo de Publicação
                <a class="glyphicon glyphicon-arrow-down" href="{{url('publicacoes?ordem=asc&campo=editora')}}"></a> 
                <a class="glyphicon glyphicon-arrow-up" href="{{url('publicacoes?ordem=desc&campo=editora')}}"></a>
            </th>
            <th>Ano
                <a class="glyphicon glyphicon-arrow-down" href="{{url('publicacoes?ordem=asc&campo=ano_publicacao')}}"></a> 
                <a class="glyphicon glyphicon-arrow-up" href="{{url('publicacoes?ordem=desc&campo=ano_publicacao')}}"></a>
            </th>
            <th width="25%">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($publicacoes as $publicacao)
        <tr>
            <td>{{  $publicacao->titulo }}</td>
            <td>
                @foreach($publicacao->autores as $autor)
                    {{ $autor->nome }},&nbsp
                @endforeach
            </td>
            <td>{{{ $publicacao->editora }}}</td>
            <td>{{{ $publicacao->ano_publicacao }}}</td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-xs btn-info" href="{{ url('publicacoes/editar',$publicacao->id) }}">
                        <i class="glyphicon glyphicon-edit"></i>
                        <span class="hidden-phone">Editar</span>
                    </a>
                    <a class="btn btn-xs btn-danger" href="{{ url('publicacoes/remover',$publicacao->id) }}">
                        <i class="glyphicon glyphicon-remove"></i>
                        <span class="hidden-phone">Remover</span>
                    </a>
                </div>
            </td>
        @endforeach   
    </tbody>
</table>

{{ $publicacoes->appends(array('pesquisa' => $pesquisa))->links() }}

@stop