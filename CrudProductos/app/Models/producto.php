<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    use HasFactory;
    // Le indicamos que valores insertar
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'categoria_id',
    ];
}
