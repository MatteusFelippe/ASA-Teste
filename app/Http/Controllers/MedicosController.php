<?php

namespace App\Http\Controllers;

use App\Models\Medicos;
use Illuminate\Http\Request;
use App\Http\Requests\MedicosRequest;

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
    public function store(MedicosRequest $request)
    {
        // Recupera os dados validados
        $validatedData = $request->validated();
        // Cria o medico usando os dados validados
        $created = Medicos::create($validatedData);
        // Verifica se a criação foi bem-sucedida e redireciona com a mensagem apropriada
        if ($created) {
            return redirect()->route('medicos.index')->with('message', 'Criado com sucesso');
        }        
        return redirect()->route('medicos.index')->with('message', 'Erro na criação');
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
    public function update(MedicosRequest $request, string $id)
    {
       // Recupera os dados validados
       $validatedData = $request->validated();
       // Encontra o medico pelo ID e atualiza com os dados validados
       $updated = Medicos::where('id', $id)->update($validatedData);
        // Verifica se a atualização foi bem-sucedida e redireciona com a mensagem apropriada
        if ($updated) {
            return redirect()->route('medicos.index')->with('message', 'Atualizado com sucesso');
        }
        return redirect()->route('medicos.index')->with('message', 'Erro na atualização');
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
