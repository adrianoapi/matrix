@extends('layout.app')
@section('title', 'Adicionar um produto')
@section('content')
<h1>Alterar produto</h1>
@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>    
    </div>
@endif
@if(Session::has('mensagem'))
    <div class="alert alert-success">
        {{Session::get('mensagem')}}  
    </div>
@endif
{{Form::open(['route' => ['produtos.update', $produto->id], 'method' => 'PUT'])}}

{{Form::label('referencia', 'Referência')}}
{{Form::text('referencia', $produto->referencia,['class'=>'form-control','required','placeholder'=>'Referência'])}}

{{Form::label('titulo', 'Título')}}
{{Form::text('titulo', $produto->titulo,['class'=>'form-control','required','placeholder'=>'Título'])}}

{{Form::label('descricao', 'Descrição')}}
{{Form::textarea('descricao', $produto->descricao,['class'=>'form-control','required','placeholder'=>'Descrição'])}}

{{Form::label('preco', 'Preço')}}
{{Form::number('preco', $produto->preco,['class'=>'form-control','required','placeholder'=>'Preço'])}}

<br>

{{Form::submit('Alterar',['class'=>'btn btn-primary'])}}
{{Form::close()}}

