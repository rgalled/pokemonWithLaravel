<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pokemon extends Model
{
    use HasFactory;
    
    protected $table = 'pokemon';

    protected $fillable = ['nombre','vida','defensa','sexo','tamaño','tipo'];
        
}


