<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Requisition;

class RequisitionController extends Controller
{
    /**
     * Exibe a pagina inicial listar requisicoes
     * Retorna os dados das requisicoes cadastrados no BD
     *
     * @return void
     */
    public function index()
    {
        $requisitions = Requisition::paginate(10);

        return view('admin.requisition.index', [
            'requisitions' => $requisitions
        ]);
    }
}
