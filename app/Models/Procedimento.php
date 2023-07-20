<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Procedimento extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $filable=[];
    protected $table = 'procedimentos';

    public function pet(){
        return $this->belongsTo(Pet::class);
    }

    public function getDataProcedimentoFormatadaAttribute(){
        return date('d/m/Y', strtotime($this->data_procedimento));
    }
}
