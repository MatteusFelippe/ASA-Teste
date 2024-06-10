<?php

namespace App\Http\Controllers;

use App\Models\Atendimentos;
use App\Models\Medicos;
use App\Models\Pacientes;
use Illuminate\Http\Request;
use App\Http\Requests\AtendimentosRequest;

class AtendimentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recupera todos os atendimentos com os campos especificados, incluindo os relacionamentos
        $atendimentos = Atendimentos::with(['medico', 'paciente'])->select('id', 'data_atendimento', 'medico_id', 'paciente_id')->get();
        // Retorna os dados em formato JSON
        return view('atendimentos', ['atendimentos' => $atendimentos]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medicos = Medicos::all();
        $pacientes = Pacientes::all();
        return view('atendimento_create', ['medicos' => $medicos,'pacientes' => $pacientes]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(AtendimentosRequest $request)
    {
        // Recupera os dados validados
        $validatedData = $request->validated();
        // Cria o atendimento usando os dados validados
        $created = Atendimentos::create($validatedData);
        // Verifica se a criação foi bem-sucedida e redireciona com a mensagem apropriada
        if ($created) {
            return redirect()->route('atendimentos.index')->with('message', 'Criado com sucesso');
        }        
        return redirect()->route('atendimentos.index')->with('message', 'Erro na criação');
    }


    /**
     * Display the specified resource.
     */
    public function show(atendimentos $atendimento)
    {
        return view('atendimento_show',['atendimento'=>$atendimento]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Atendimentos $atendimento)
    {
        $medicos = Medicos::all();
        $pacientes = Pacientes::all();
        return view('atendimento_edit', ['atendimento' => $atendimento,'medicos' => $medicos,'pacientes' => $pacientes]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(AtendimentosRequest $request, string $id)
    {
       // Recupera os dados validados
       $validatedData = $request->validated();
       // Encontra o atendimento pelo ID e atualiza com os dados validados
       $updated = Atendimentos::where('id', $id)->update($validatedData);
        // Verifica se a atualização foi bem-sucedida e redireciona com a mensagem apropriada
        if ($updated) {
            return redirect()->route('atendimentos.index')->with('message',value: 'Criado com sucesso');
        }
        return redirect()->route('atendimentos.index')->with('message',value: 'Erro na criação');
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $atendimento = Atendimentos::find($id);
        if ($atendimento) {
            $atendimento->delete();
            return redirect()->route('atendimentos.index')->with('message', 'Atendimento excluído com sucesso');
        } else {
            return redirect()->route('atendimentos.index')->with('error', 'Atendimento não encontrado');
        }
    }
}
