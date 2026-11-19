<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artigo extends Model
{
    protected $fillable = ['nome', 'tipo', 'detalhes', 'valor', 'quantidade'];

    protected function casts(): array
    {
        return ['valor' => 'decimal:2', 'quantidade' => 'integer'];
    }
}
