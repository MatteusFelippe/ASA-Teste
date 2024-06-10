@extends('master')

@section('content')

<hr>
<h2 style='display: flex; justify-content: space-between;'> Dados do Atendimento <h2>

<ul style='font-size:18px;'>
    <label style='font-size:20px;' for="data_atendimento">Data do Atendimento:</label>
        <label style="font-weight: normal;" for="data_atendimento">{{$atendimento->data_atendimento}}</label>
    <label style='font-size:20px;' for="medico_id">Médico:</label>
        <label style="font-weight: normal;" for="medico_id">{{$atendimento->medico->id}} - {{$atendimento->medico->nome}}</label>
    <label style='font-size:20px;' for="paciente_id">Paciente:</label>
        <label style="font-weight: normal;" for="paciente_id">{{$atendimento->paciente->id}} - {{$atendimento->paciente->nome}}</label>
</ul>

<form action="{{route('atendimentos.destroy',['atendimento' => $atendimento->id])}}" method="post">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button style= 'width: 60px; height: 35px;' type="submit"><h2 style='font-size:18px'>Excluir</h2></button>

</form>

<button style= 'width: 60px; height: 35px;' onclick="history.back()"><h2 style='font-size:18px;'>Voltar</h2></button>

<br>
<br>

@endsection