<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = ['razao_social', 'logo', 'email', 'telefone', 'endereco', 'descricao'];

    public function produto()
    {
        return $this->hasMany(Produto::class);
    }

    public function postagem()
    {
        return $this->hasMany(Postagem::class);
    }

    public function servico()
    {
        return $this->hasMany(Servico::class);
    }
}
