<?php

namespace App\Http\Controllers;

use App\Providers\ServiceParcela;
use App\Providers\ServicesTarefas;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $parcelas = ServiceParcela::getDadosParcelasDebitosGrafico(date('Y-m'));

        $tarefas = ServicesTarefas::getAllTarefas(status:1);
        $tableHeadTarefas = ServicesTarefas::getTableHeader();

        $dados = [
            'parcelas'=>$parcelas,
            'tarefas'=>$tarefas,
            'tableHeadTarefas'=>$tableHeadTarefas,
        ];

        return view('home', $dados);
    }
}
