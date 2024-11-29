<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = ['razao_social', 'logo', 'email', 'telefone', 'endereco', 'descricao'];

    // Relacionamento 1:N com Depoimento
    public function depoimento()
    {
        return $this->hasMany(Depoimento::class);
    }

    // Relacionamento 1:N com Comentario
    public function contateNos()
    {
        return $this->hasMany(ContateNos::class);
    }

    // Relacionamento 1:N com Portfolio
    public function portfolio()
    {
        return $this->hasMany(Portfolio::class);
    }
}
