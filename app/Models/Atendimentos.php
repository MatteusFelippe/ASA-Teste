<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Atendimentos extends Model
{
    protected $table = 'atendimentos';

    public $timestamps = false;

    protected $fillable = [
        'data_atendimento',
        'medico_id',
        'paciente_id',
    ];

    public function paciente(): BelongsTo
    {
        return $this->belongsTo(Pacientes::class,'paciente_id');
    }

    public function medico(): BelongsTo
    {
        return $this->belongsTo(Medicos::class,'medico_id');
    }

    #use HasFactory;
}
