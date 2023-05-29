<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedimento extends Model
{
    use HasFactory;
    protected $filable=[];
    protected $table = 'procedimentos';

    public function pet(){
        return $this->belongsTo(Pet::class);
    }
}
