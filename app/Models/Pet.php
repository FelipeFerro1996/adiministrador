<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $filable=[];
    protected $table = 'pets';

    public function procedimentos(){
        return $this->hasMany(Procedimento::class);
    }

    public function especie(){
        return $this->belongsTo(Especie::class);
    }
}
