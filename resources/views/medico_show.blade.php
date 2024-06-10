@extends('master')

@section('content')

<hr>
<h2 style='display: flex; justify-content: space-between;'> Dados do Médico <h2>

<ul style='font-size:18px;'>
        <label style='font-size:20px;'for="nome">Nome:</label>
        <label style="font-weight: normal;"for="nome">{{$medico->nome}}</label>
        <label style='font-size:20px;'for="crm">CRM:</label>
        <label style="font-weight: normal;"for="crm">{{$medico->crm}}</label>
        <label style='font-size:20px;'for="especialidade">Especialidade:</label>
        <label style="font-weight: normal;"for="especialidade">{{$medico->especialidade}}</label>
</ul>

<form action="{{route('medicos.destroy',['medico' => $medico->id])}}" method="post">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button style= 'width: 60px; height: 35px;' type="submit"><h2 style='font-size:18px'>Excluir</h2></button>

</form>

<button style= 'width: 60px; height: 35px;' onclick="history.back()"><h2 style='font-size:18px;'>Voltar</h2></button>

<br>
<br>

@endsection