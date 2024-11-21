<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = ['conteudo', 'user_id', 'postagem_id'];

    // Relacionamento N:1 com User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relacionamento N:1 com Postagem
    public function postagem()
    {
        return $this->belongsTo(Postagem::class);
    }
}
