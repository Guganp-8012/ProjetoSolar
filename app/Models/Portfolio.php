<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descricao', 'foto', 'cidade', 'potencia', 'tipo', 'economia', 'empresa_id'];

    // Relacionamento N:1 com Empresa
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}