<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postagem extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'conteudo', 'data', 'empresa_id', 'categoria_id'];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
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