<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
    use HasFactory;
    public function miagenda()
    {
        return $this->hasMany(Mi_agenda::class,'id_evento');
    }
}
