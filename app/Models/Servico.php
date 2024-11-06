<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    protected $fillable = ['tipo_servico', 'descricao', 'solicitacao_servico_id', 'user_id', 'empresa_id'];

    public function solicitacaoServico()
    {
        return $this->belongsTo(SolicitacaoServico::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
