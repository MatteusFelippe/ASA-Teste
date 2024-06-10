@extends('master')

@section('content')

<hr>
<h2 style='display: flex; justify-content: space-between;'>Editar Paciente</h2>

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

<form style='font-size:20px;' action="{{route('pacientes.update',['paciente' => $paciente->id])}}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="{{$paciente->nome}}">
        <label for="cpf">CPF:</label>
        <input type="string" name="cpf" value="{{$paciente->cpf}}">
        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" name="data_nascimento" value="{{$paciente->data_nascimento}}">
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{$paciente->email}}">
        <button type="submit">Salvar</button> 
    </form>

    <br>

    <button style= 'width: 62px; height: 35px;' onclick="history.back()"><p style='font-size:20px;'>Voltar</p></button>

    <br>
    <br>
    
@endsection