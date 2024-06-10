<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Medicos extends Model
{
    protected $table = 'medicos';

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'crm',
        'especialidade',
    ];

    public function atendim(): HasMany
    {
        return $this->hasMany(Atendimentos::class,'medico_id');
    }

    use HasFactory;
}
