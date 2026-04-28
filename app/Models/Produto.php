<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use SoftDeletes;

    protected $table = 'produto';

    protected $fillable = [
        'nome',
        'fabricante',
        'descricao',
        'id_categoria',
        'foto',
        'preco',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function supermercados()
    {
        return $this->belongsToMany(Supermercado::class, 'produto_supermercado', 'produto_id', 'supermercado_id');
    }

    public function cidades()
    {
        return $this->belongsToMany(Cidade::class, 'produto_categoria_cidade', 'produto_id', 'cidade_id')
            ->withPivot('categoria_id');
    }

    public function scopeAtivos($query)
    {
        return $query->whereNull('deleted_at');
    }

    public static function search(string $keyword)
    {
        return self::where('nome', 'LIKE', "%{$keyword}%")
            ->orWhere('fabricante', 'LIKE', "%{$keyword}%")
            ->with('categoria')
            ->get();
    }

    public function getPrecoBrFormatted(): string
    {
        return currency($this->preco);
    }
}
