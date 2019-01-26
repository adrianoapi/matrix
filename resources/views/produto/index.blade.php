@extends('layout.app')
@section('title', 'Listagem de produtos')
@section('content')
    <h1>Produtos</h1>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th colspan="2"><a href="/produtos/create" class="btn btn-primary float-lg-right">Novo</a></th>
            </tr>
        </thead>
        @foreach ($produtos as $produto)
            <tr>
                <td><a href="/produtos/{{$produto->id}}">{{$produto->titulo}}</a></td>
                <td>
                    <a href="/produtos/{{$produto->id}}" class="btn btn-secondary float-lg-right">View</a>&nbsp;
                    <a href="/produtos/{{$produto->id}}/edit/" class="btn btn-secondary float-lg-right">Edit</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection