<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamentos_reserva extends Model
{
    use HasFactory;
    protected $table = "equipamentos_reserva";
    protected $primaryKey = 'id_reserva_equipamento';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_reserva_equipamento',
        'id_equipamentos',
        'data',
        'horario_inicio',
        'horario_fim',
        'descricao',
        'id_professor'
    ];
    public function equipamento()
    {
        return $this->belongsTo(Equipamentos::class, 'id_equipamentos');  // 'id_equipamentos' é a chave estrangeira
    }
}
