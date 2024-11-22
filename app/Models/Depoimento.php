<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depoimento extends Model
{
    use HasFactory;

    protected $fillable = ['texto', 'empresa_id', 'user_id'];

    // Relacionamento N:1 com Empresa
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    // Relacionamento N:1 com User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
