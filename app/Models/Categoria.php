<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao'];

    // Relacionamento 1:N com Postagem
    public function postagens()
    {
        return $this->hasMany(Postagem::class);
    }
}