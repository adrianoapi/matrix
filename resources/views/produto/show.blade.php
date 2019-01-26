@extends('layout.app')
@section('title', $produto->titulo)
@section('content')
<div class="container">
    <h1>Produto {{$produto->titulo}}</h1>
    <div class="row">
      <div class="col-xs-6 col-md-3">
      <ul>
        <li>Referência: {{$produto->referencia}}</li>
        <li>Preço: R${{ number_format($produto->preco,2,',','.')}}</li>
        <li>Adicionado em: {{ date("d/m/Y",strtotime($produto->created_at)) }}</li>
      </ul>
      <p>{{$produto->descricao}}</p>
      </div>
      @if(file_exists("./img/produtos/" . md5($produto->id) . ".jpg"))
        <div class="col-xs-6 col-md-3">
            <a href="{{asset("img/produtos/" . md5($produto->id) . ".jpg")}}" class="thumbnail" style="width: 200px;">
            {{Html::image(asset("img/produtos/" . md5($produto->id) . ".jpg"), $produto->titulo, array( 'width' => 70, 'height' => 70 ))}}
          </a>
        </div>
      @endif
    </div>
    <a href="javascript:history.go(-1)" class="btn btn-default">Voltar</a>
@endsection