<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitacaoServico extends Model
{
    use HasFactory;

    protected $fillable = ['data_solicitacao', 'valor_estimado', 'valor_real', 'data_inicio', 'data_fim', 'prazo_estimado', 'status', 'detalhes', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function servico()
    {
        return $this->hasMany(Servico::class);
    }
}
