<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Requisition;
use App\Models\Stock;
use App\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $userCount = 0;
        $productCount = 0;
        $requisitionCount = 0;

        // Contagem de Usuários
        $userCount = User::count();

        // Contagem de Produtos
        $productCount = Product::count();

        // Contagem de Requisicoes
        $requisitionCount = Requisition::count();

        // Contagem de Estoque
        $stockCount = Stock::count();

        // Consulta do Grafico
        $stockClass = new Stock();
        // Consulta produtos que entraram no estoque
        $graphicValues1 = $stockClass->queryGraphicEntryStock();
        // Consulta produtos que sairam no estoque
        $graphicValues2 = $stockClass->queryGraphicExitStock();   

        return view('admin.home.index', [
            'userCount'        => $userCount,
            'productCount'     => $productCount,
            'requisitionCount' => $requisitionCount,
            'stockCount'       => $stockCount,
            'graphicValues1'   => $graphicValues1,
            'graphicValues2'   => $graphicValues2
        ]);
    }
}
