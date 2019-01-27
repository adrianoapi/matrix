@extends('layout.app')
@section('title', 'Listagem de produtos')
@section('content')
<h1>Produtos</h1>
{{Form::open(['url'=>['produtos/buscar']])}}
  <div class="row">
    <div class="col-lg-12">
      <div class="input-group">
      {{Form::text('busca',$busca,['class'=>'form-control','required','placeholder'=>'Buscar'])}}
      <span class="input-group-btn">
        {{Form::submit('Buscar',['class'=>'btn btn-default'])}}
      </span>
      </div>
    </div>
  </div>
{{Form::close()}}
@if(Session::has('mensagem'))
<div class="alert alert-success">{{Session::get('mensagem')}}</div>
@endif
<div class="row">
    @foreach ($produtos as $produto)
      <div class="col-md-3">
        <h4>{{$produto->titulo}}</h4>
          @if(file_exists("./img/produtos/" . md5($produto->id) .".". $produto->type_img))
            <a class='thumbnail' style="min-height: 120px;" href="{{ url('produtos/'.$produto->id) }}">
              {{Html::image(asset("img/produtos/" . md5($produto->id) .".". $produto->type_img), $produto->titulo, array( 'width' => 70, 'height' => 70 ))}}
            </a>
          @else
            <a class='thumbnail'  style="min-height: 120px;" href="{{ url('produtos/'.$produto->id) }}">
              {{$produto->titulo}}
            </a>
          @endif

        {{Form::open(['route'=>['produtos.destroy',$produto->id],'method'=>'DELETE'])}}
        <a class='btn btn-default' href=" {{url('produtos/'.$produto->id.'/edit')}} ">Editar</a>
        {{Form::submit('Excluir',['class'=>'btn btn-primary'])}}
        {{Form::close()}}
      </div>
    @endforeach
  </div>
{{$produtos->links()}}
@endsection