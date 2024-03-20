<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Venda extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function clientes(): BelongsTo {
        return $this->belongsTo(Cliente::class);
    }
}
