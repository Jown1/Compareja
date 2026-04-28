<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

class Usuario extends Model
{
    use SoftDeletes;

    protected $table = 'usuario';

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'profile_image',
    ];

    protected $hidden = ['senha'];

    public function getAuthPassword(): string
    {
        return $this->senha;
    }

    public static function findByEmail(string $email): ?self
    {
        return self::where('email', $email)->first();
    }

    public static function createFromRequest(array $data): self
    {
        return self::create([
            'nome'          => $data['name'],
            'email'         => $data['email'],
            'senha'         => Hash::make($data['password']),
            'profile_image' => $data['profile_image'] ?? null,
        ]);
    }
}
