@extends('layout.app')
@section('title', 'Listagem de produtos')
@section('content')
    <h1>Produtos</h1>
    <table class="table">
        <thead>
            <tr>
                <th colspan="2"><a href="/produtos/create" class="btn btn-primary float-lg-right">Novo</a></th>
            </tr>
        </thead>
        @foreach ($produtos as $produto)
            <tr>
                <td><a href="/produtos/{{$produto->id}}">{{$produto->titulo}}</a></td>
                <td><a href="/produtos/{{$produto->id}}" class="btn btn-default float-lg-right">View</a></td>
            </tr>
        @endforeach
    </table>
@endsection