@extends('master')

@section('content')

<hr>
<h2 style='display: flex; justify-content: space-between;'> Dados do Paciente <h2>

<ul style='font-size:18px;'>
        <label style='font-size:20px;'for="nome">Nome:</label>
        <label style="font-weight: normal;"for="nome">{{$paciente->nome}}</label>
        <label style='font-size:20px;'for="cpf">CPF:</label>
        <label style="font-weight: normal;"for="cpf">{{$paciente->cpf}}</label>
        <label style='font-size:20px;'for="data_nascimento">Data de Nascimento:</label>
        <label style="font-weight: normal;"for="data_nascimento">{{$paciente->data_nascimento}}</label>
        <label style='font-size:20px;'for="email">Email:</label>
        <label style="font-weight: normal;"for="email">{{$paciente->email}}</label>
</ul>

<form action="{{route('pacientes.destroy',['paciente' => $paciente->id])}}" method="post">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button style= 'width: 60px; height: 35px;' type="submit"><h2 style='font-size:18px'>Excluir</h2></button>

</form>

<button style= 'width: 60px; height: 35px;' onclick="history.back()"><h2 style='font-size:18px;'>Voltar</h2></button>

<br>
<br>

@endsection