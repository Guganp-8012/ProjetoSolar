<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = ['razao_social', 'logo', 'email', 'telefone', 'endereco', 'descricao'];

    public function depoimento()
    {
        return $this->hasMany(Depoimento::class);
    }

    public function contateNos()
    {
        return $this->hasMany(ContateNos::class);
    }
    
    public function servico()
    {
        return $this->hasMany(Servico::class);
    }
}
