<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaDiretoria extends Model
{
    use HasFactory;

    protected $table = "reserva_diretoria";
    protected $primaryKey = 'id_reserva_diretor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_reserva_diretor',
        'id_sala',
        'data',
        'horario_inicio',
        'horario_fim',
        'descricao',
        'id_diretor'
    ];
}
