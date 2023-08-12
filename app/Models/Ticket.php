<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    // Define las columnas que se pueden asignar masivamente
    protected $fillable = [
        'user_id',
        'cedula',
        'contacto',
        'category_id',
        'titulo',
        'descripcion',
        'documento_1',
        'documento_2'
    ];

    // Relación con el modelo User (suponiendo que tienes un modelo User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el modelo Category (suponiendo que tienes un modelo Category)
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}