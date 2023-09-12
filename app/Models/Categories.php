<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Categories extends Model
{
    use HasFactory;


    protected $fillable = ['name'];// Agrega los campos que puedan ser asignados en masa

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'category_user', 'category_id', 'user_id');
    }
}


