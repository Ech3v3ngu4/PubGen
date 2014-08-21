@extends('layouts/default')
@section('content')

<h1>{{{ $titulo }}}</h1>
<hr>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th width="25%">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($publicacoes as $publicacao)
        <tr>
            <td>{{  $publicacao->id }}</td>
            <td>{{{ $publicacao->nome }}}</td>
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