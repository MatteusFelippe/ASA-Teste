@extends('master')

@section('content')

<hr>
<h2 style='display: flex; justify-content: space-between;'>Novo Atendimento</h2>

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

<form style='font-size:20px;' action="{{route('atendimentos.store')}}" method="post">
    @csrf
    <label for="data_atendimento">Data do Atendimento:</label>
    <input type="date" name="data_atendimento">

    <label for="medico_id">Médico:</label>
    <select name="medico_id" id="medico_id" required>
        <option value="" disabled selected>Selecione um médico</option>
        @foreach($medicos as $medico)
            <option value="{{ $medico->id }}">
                {{ $medico->id }} - {{ $medico->nome }}
            </option>
        @endforeach
    </select>
    
    <label for="paciente_id">Paciente:</label>
    <select name="paciente_id" id="paciente_id" required>
        <option value="" disabled selected>Selecione um paciente</option>
        @foreach($pacientes as $paciente)
            <option value="{{ $paciente->id }}">
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