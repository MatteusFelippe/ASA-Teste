@extends('master')

@section('content')

<hr>
<h2 style='display: flex; justify-content: space-between;'>Editar Médico</h2>

@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form style='font-size:20px;' action="{{route('medicos.update',['medico' => $medico->id])}}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="{{$medico->nome}}">
        <label for="crm">CRM:</label>
        <input type="string" name="crm" value="{{$medico->crm}}">
        <label for="especialidade">Especialidade:</label>
        <input type="text" name="especialidade" value="{{$medico->especialidade}}">
        <button type="submit">Salvar</button> 
    </form>

    <br>

    <button style= 'width: 62px; height: 35px;' onclick="history.back()"><p style='font-size:20px;'>Voltar</p></button>

    <br>
    <br>
    
@endsection