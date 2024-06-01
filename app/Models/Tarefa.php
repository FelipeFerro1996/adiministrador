<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    protected $table = 'tarefas';

    public function getDataTarefaDataFormatadaAttribute(){
        return date('d/m/Y', strtotime($this->data_tarefa));
    }

    public function getDataTarefaHoraFormatadaAttribute(){
        return date('H:i', strtotime($this->data_tarefa));
    }
}
