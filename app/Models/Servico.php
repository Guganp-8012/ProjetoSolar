<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    protected $fillable = ['tipo_servico', 'descricao', 'empresa_id'];

    // Relacionamento N:1 com Empresa
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
