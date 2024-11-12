<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depoimento extends Model
{
    use HasFactory;

    protected $fillable = ['texto', 'empresa_id', 'user_id'];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
