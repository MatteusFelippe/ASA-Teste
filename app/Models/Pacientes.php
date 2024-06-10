<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pacientes extends Model
{
    protected $table = 'pacientes';

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'cpf',
        'data_nascimento',
        'email',
    ];


    public function atendim(): HasMany
    {
        return $this->hasMany(Atendimentos::class,'paciente_id');
    }

    use HasFactory;
}
