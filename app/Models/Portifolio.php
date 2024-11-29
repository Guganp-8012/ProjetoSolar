<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portifolio extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descricao', 'fotos', 'cidade', 'potencia', 'tipo', 'economia', 'empresa_id'];

    // Relacionamento N:1 com Empresa
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}