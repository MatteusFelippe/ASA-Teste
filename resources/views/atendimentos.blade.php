@extends('master')

@section('content')

<hr>
<h2 style='display: flex; justify-content: space-between;'>Atendimentos   <a href="{{route('atendimentos.create')}}" class="btn">Novo Atendimento</a> <h2>

<table style='width: 100%;font-size:20px;'>
    <thead>
        <tr>
            <th>Nome do Médico</th>
            <th>Nome do Paciente</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($atendimentos as $atendimento)
            <tr>
                <td> {{$atendimento->medico->nome}} </td>
                <td> {{$atendimento->paciente->nome}} </td>
                <td>
                    <a href="{{route('atendimentos.edit',['atendimento'=> $atendimento->id])}}">Editar</a> |
                    <a href="{{route('atendimentos.show',['atendimento'=> $atendimento->id])}}">Mostrar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection