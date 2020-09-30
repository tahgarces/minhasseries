@extends('layout')

@section('cabecalho')
      Adicionar Séries
@endsection

@section('conteudo')
    <form method="post">
        @csrf
        <div class="form-group">
            <label for="nome" class="">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
        <button class="btn btn-primary">Adicionar</button>
    </form>
@endsection

