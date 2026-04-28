<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supermercado extends Model
{
    use SoftDeletes;

    protected $table = 'supermercado';

    protected $fillable = ['nome', 'imagem'];

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'produto_supermercado', 'supermercado_id', 'produto_id');
    }
}
