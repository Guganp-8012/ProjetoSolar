<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postagem extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'foto', 'conteudo', 'data', 'user_id', 'categoria_id'];

    // Relacionamento N:1 com User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // Relacionamento N:1 com Categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // Relacionamento 1:N com Comentario
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}