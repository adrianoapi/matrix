@extends('layout.app')
@section('title', 'Adicionar um produto')
@section('content')
<h1>Adicionar produto</h1>
@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>    
    </div>
@endif
{{Form::open(['action' => 'ProdutosController@store'])}}

{{Form::label('referencia', 'Referência')}}
{{Form::text('referencia', '',['class'=>'form-control','required','placeholder'=>'Referência'])}}

{{Form::label('titulo', 'Título')}}
{{Form::text('titulo', '',['class'=>'form-control','required','placeholder'=>'Título'])}}

{{Form::label('descricao', 'Descrição')}}
{{Form::textarea('descricao', '',['class'=>'form-control','required','placeholder'=>'Descrição'])}}

{{Form::label('preco', 'Preço')}}
{{Form::number('preco', '',['class'=>'form-control','required','placeholder'=>'Preço'])}}

<br>

{{Form::submit('Cadastrar',['class'=>'btn btn-primary'])}}
{{Form::close()}}
<a href="/produtos" class="btn btn-secondary">Home</a>

