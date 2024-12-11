<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociado al modelo.
     */
    protected $table = 'cvs'; // Asegúrate de que el nombre coincida con tu migración y tabla en la base de datos

    /**
     * Los campos que pueden ser asignados masivamente.
     */
    protected $fillable = ['name', 'email', 'education', 'experience', 'skills', 'languages', 'user_id'];

    /**
     * Relación con el modelo User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
