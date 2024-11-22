<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContateNos extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'email', 'mensagem', 'empresa_id'];

    // Relacionamento N:1 com Empresa
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
