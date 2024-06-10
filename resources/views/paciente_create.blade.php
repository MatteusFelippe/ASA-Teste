@extends('master')

@section('content')

<hr>
<h2 style='display: flex; justify-content: space-between;'>Novo Paciente</h2>

@if (session()->has('message'))
    {{session()->get('message')}}
@endif

<form style='font-size:20px;' action="{{route('pacientes.store')}}" method="post">
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" name="nome">
        <label for="cpf">CPF:</label>
        <input type="string" name="cpf">
        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" name="data_nascimento">
        <label for="email">Email:</label>
        <input type="email" name="email">
        <button type="submit">Salvar</button>
    </form>

    <br>

    <button style= 'width: 62px; height: 35px;' onclick="history.back()"><p style='font-size:20px;'>Voltar</p></button>

    <br>
    <br>

@endsection