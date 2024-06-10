<?php

namespace App\Http\Controllers;

use App\Models\Medicos;
use Illuminate\Http\Request;

class MedicosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recupera todos os medicos com os campos especificados
        $medicos = Medicos::select('id', 'nome', 'crm', 'especialidade')->get();
        // Retorna os dados em formato JSON
        return view('medicos', ['medicos' => $medicos]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medico_create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = Medicos::create([
            'nome'=> $request->input('nome'),
            'crm'=> $request->input('crm'),
            'especialidade'=> $request->input('especialidade'),
        ]);

        if ($created) {
            return redirect()->route('medicos.index')->with('message',value: 'Criado com sucesso');
        }
        return redirect()->route('medicos.index')->with('message',value: 'Erro na criação');
    }


    /**
     * Display the specified resource.
     */
    public function show(medicos $medico)
    {
        return view('medico_show',['medico'=>$medico]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicos $medico)
    {
        return view('medico_edit',['medico' => $medico]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = Medicos::where('id', $id)->update([
            'nome' => $request->input('nome'),
            'crm' => $request->input('crm'),
            'especialidade' => $request->input('especialidade'),
        ]);
    
        if ($updated) {
            return redirect()->route('medicos.index')->with('message',value: 'Criado com sucesso');
        }
        return redirect()->route('medicos.index')->with('message',value: 'Erro na criação');
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $medico = Medicos::find($id);
    if ($medico) {
        $medico->delete();
        return redirect()->route('medicos.index')->with('message', 'Médico excluído com sucesso');
    } else {
        return redirect()->route('medicos.index')->with('error', 'Médico não encontrado');
    }
    }
}
