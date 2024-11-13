<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postagem extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'foto', 'conteudo', 'data', 'user_id', 'categoria_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function comentario()
    {
        return $this->hasMany(Comentario::class);
    }
}