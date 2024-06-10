<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $created = Pacientes::create([
            'nome'=> $request->input('nome'),
            'cpf'=> $request->input('cpf'),
            'data_nascimento'=> $request->input('data_nascimento'),
            'email'=> $request->input('email'),
        ]);

        if ($created) {
            return redirect()->route('pacientes.index')->with('message',value: 'Criado com sucesso');
        }
        return redirect()->route('pacientes.index')->with('message',value: 'Erro na criação');
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
    public function update(Request $request, string $id)
    {
        $updated = Pacientes::where('id', $id)->update([
            'nome' => $request->input('nome'),
            'cpf' => $request->input('cpf'),
            'data_nascimento' => $request->input('data_nascimento'),
            'email' => $request->input('email'),
        ]);
    
        if ($updated) {
            return redirect()->route('pacientes.index')->with('message',value: 'Atualizado com sucesso');
        }
        return redirect()->route('pacientes.index')->with('message',value: 'Erro na atualização');
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
