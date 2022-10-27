<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mi_agenda extends Model
{
    use HasFactory;
    protected $table = 'mi_agendas';
    protected $fillable = ['id_usuario', 'id_evento'];

    public function evento()
    {
        return $this->belongsTo(Eventos::class,'id_evento');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'id_usuario');
    }
}
