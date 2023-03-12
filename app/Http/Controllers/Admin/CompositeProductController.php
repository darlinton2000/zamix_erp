<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CompositeProduct;
use Illuminate\Support\Facades\DB;

class CompositeProductController extends Controller
{
    /**
     * Exibe a pagina inicial listar produtos compostos
     * Retorna os dados dos produtos compostos cadastrados no BD
     *
     * @return void
     */
    public function index()
    {   
        $compositeProducts = CompositeProduct::paginate(10);

        return view('admin.compositeProduct.index', [
            'compositeProducts' => $compositeProducts
        ]);
    }
}
