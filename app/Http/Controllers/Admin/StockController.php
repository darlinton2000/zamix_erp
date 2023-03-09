<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Stock;

class StockController extends Controller
{
    /**
     * Exibe a pagina inicial listar estoque
     * Retorna os dados do estoque cadastrados no BD
     *
     * @return void
     */
    public function index()
    {
        $stocks = Stock::paginate(10);

        return view('admin.stock.index', [
            'stocks' => $stocks
        ]);
    }
}
