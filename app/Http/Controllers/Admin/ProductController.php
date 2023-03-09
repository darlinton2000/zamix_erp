<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Exibe a pagina inicial listar produtos
     * Retorna os dados dos produtos cadastrados no BD
     *
     * @return void
     */
    public function index()
    {
        $products = Product::paginate(10);

        return view('admin.product.index', [
            'products' => $products
        ]);
    }

    /**
     * Exibe o formulario Novo Produto
     *
     * @return void
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Cadastra o produto no BD
     *
     * @param Request $request Recebe os dados do formulario
     * @return void
     */
    public function store(Request $request)
    {
        // Recebendo os dados do formulário
        $data = $request->only([
            'name',
            'cost_price',
            'sule_price',
            'amount'
        ]);

        // Inserindo no BD
        $product = new Product;
        $product->name = $data['name'];
        $product->cost_price = $data['cost_price'];
        $product->sule_price = $data['sule_price'];
        $product->amount = $data['amount'];
        $product->save();

        return redirect()->route('products')->with('success', 'Produto cadastrado com sucesso!');
    }

    /**
     * Deletando o produto
     *
     * @param integer $id Recebe o id do produto
     * @return void
     */
    public function destroy(int $id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('products')->with('success', 'Produto excluido com sucesso!');
    }

    /**
     * Exibe o formulario Editar Produto
     *
     * @param integer $id Recebe o id do produto
     * @return void
     */
    public function edit(int $id)
    {
        $product = Product::find($id);

        if ($product){
            return view('admin.product.edit', [
                'product' => $product
            ]);
        }   

        return redirect()->route('admin.product.edit');
    }

    /**
     * Edita o produto no BD
     *
     * @param Request $request Recebe os dados do formulario
     * @param integer $id Recebe o id do produto
     * @return void
     */
    public function update(Request $request, int $id)
    {
        $product = Product::find($id);

        if ($product){
            // Recebendo apenas os dados abaixo do formulario
            $data = $request->only([
                'name',
                'cost_price',
                'sule_price',
                'amount'
            ]);

            $product->name = $data['name'];
            $product->cost_price = $data['cost_price'];
            $product->sule_price = $data['sule_price'];
            $product->amount = $data['amount'];

            $product->save();

            if($product){
                return redirect()->route('products')->with('success', 'Produto atualizado com sucesso!');
            }
        }

        return redirect()->route('products')->with('error', 'Produto não excluido com sucesso!');
    }
}
