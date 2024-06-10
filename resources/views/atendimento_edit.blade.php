@extends('master')

@section('content')

<hr>
<h2 style='display: flex; justify-content: space-between;'>Editar Atendimento</h2>

@if (session()->has('message'))
    {{session()->get('message')}}
@endif

<form style='font-size:20px;' action="{{route('atendimentos.update',['atendimento' => $atendimento->id])}}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <label for="data_atendimento">Data do Atendimento:</label>
        <input type="date" name="data_atendimento" value="{{$atendimento->data_atendimento}}">
        
        
        <label for="medico_id">Médico:</label>
        <select name="medico_id" id="medico_id">
        @foreach($medicos as $medico)
            <option value="{{ $medico->id }}" {{ $atendimento->medico_id == $medico->id ? 'selected' : '' }}>
                {{ $medico->id }} - {{ $medico->nome }}
            </option>
        @endforeach
        </select>
        
        <label for="paciente_id">Paciente:</label>
        <select name="paciente_id" id="paciente_id">
        @foreach($pacientes as $paciente)
            <option value="{{ $paciente->id }}" {{ $atendimento->paciente_id == $paciente->id ? 'selected' : '' }}>
                {{ $paciente->id }} - {{ $paciente->nome }}
            </option>
        @endforeach
        </select>
        
    <br>
    <button style="margin-top:15px" type="submit">Salvar</button> 
</form>

    <br>

    <button style= 'width: 62px; height: 35px;' onclick="history.back()"><p style='font-size:20px;'>Voltar</p></button>

    <br>
    <br>
    
@endsection