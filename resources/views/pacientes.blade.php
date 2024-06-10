@extends('master')

@section('content')

<hr>
<h2 style='display: flex; justify-content: space-between;'>Pacientes   <a href="{{route('pacientes.create')}}" class="btn">Novo Paciente</a> <h2>

<table style='width: 100%;font-size:20px;'>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pacientes as $paciente)
            <tr>
                <td>{{$paciente->nome}}</td>
                <td>
                    <a href="{{route('pacientes.edit',['paciente'=> $paciente->id])}}">Editar</a> |
                    <a href="{{route('pacientes.show',['paciente'=> $paciente->id])}}">Mostrar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection