<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = ['conteudo', 'data', 'user_id', 'postagem_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function postagem()
    {
        return $this->belongsTo(Postagem::class);
    }
}
