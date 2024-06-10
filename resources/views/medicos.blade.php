@extends('master')

@section('content')

<hr>
<h2 style='display: flex; justify-content: space-between;'>Médicos   <a href="{{route('medicos.create')}}" class="btn">Novo Médico</a> <h2>

<table style='width: 100%;font-size:20px;'>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($medicos as $medico)
            <tr>
                <td>{{$medico->nome}}</td>
                <td>
                    <a href="{{route('medicos.edit',['medico'=> $medico->id])}}">Editar</a> |
                    <a href="{{route('medicos.show',['medico'=> $medico->id])}}">Mostrar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection