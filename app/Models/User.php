<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'apelido', 'email', 'password', 'foto', 'telefone', 'funcionario'];
    
    // Relacionamento 1:1 com Depoimento
    public function depoimento()
    {
        return $this->hasOne(Depoimento::class);
    }
    
    // Relacionamento 1:N com Comentario
    public function comentario()
    {
        return $this->hasMany(Comentario::class);
    }

    // Relacionamento 1:N com Postagem
    public function postagem()
    {
        return $this->hasMany(Postagem::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
