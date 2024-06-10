<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;
use Illuminate\Http\Request;
use App\Http\Requests\PacientesRequest;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recupera todos os pacientes com os campos especificados
        $pacientes = Pacientes::select('id', 'nome', 'cpf', 'data_nascimento', 'email')->get();
        // Retorna os dados em formato JSON
        return view('pacientes', ['pacientes' => $pacientes]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paciente_create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(PacientesRequest $request)
    {
        // Recupera os dados validados
        $validatedData = $request->validated();
        // Cria o paciente usando os dados validados
        $created = Pacientes::create($validatedData);
        // Verifica se a criação foi bem-sucedida e redireciona com a mensagem apropriada
        if ($created) {
            return redirect()->route('pacientes.index')->with('message', 'Criado com sucesso');
        }        
        return redirect()->route('pacientes.index')->with('message', 'Erro na criação');
    }


    /**
     * Display the specified resource.
     */
    public function show(pacientes $paciente)
    {
        return view('paciente_show',['paciente'=>$paciente]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pacientes $paciente)
    {
        return view('paciente_edit',['paciente' => $paciente]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(PacientesRequest $request, string $id)
    {
        // Recupera os dados validados
        $validatedData = $request->validated();
        // Encontra o paciente pelo ID e atualiza com os dados validados
        $updated = Pacientes::where('id', $id)->update($validatedData);
        // Verifica se a atualização foi bem-sucedida e redireciona com a mensagem apropriada
        if ($updated) {
            return redirect()->route('pacientes.index')->with('message', 'Atualizado com sucesso');
        }
        return redirect()->route('pacientes.index')->with('message', 'Erro na atualização');
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paciente = Pacientes::find($id);
        if ($paciente) {
            $paciente->delete();
            return redirect()->route('pacientes.index')->with('message', 'Paciente excluído com sucesso');
        } else {
            return redirect()->route('pacientes.index')->with('error', 'Paciente não encontrado');
        }
    }
}
