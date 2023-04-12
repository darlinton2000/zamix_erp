<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Stock;
use Illuminate\Support\Facades\Validator;

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

    /**
     * Exibe o formulario Adicionar Estoque
     *
     * @return void
     */
    public function create()
    {
        $products = Product::orderby('name')->get();

        return view('admin.stock.create', [
            'products' => $products
        ]);
    }

    /**
     * Metodo para adicionar o produto no estoque
     *
     * @param Request $request Recebe os dados do formulario
     * @return void
     */
    public function store(Request $request)
    {
        // Recebendo os dados do formulário
        $data = $request->only([
            'product_id',
            'amount_entry',
            'amount_exit',
            'cost_price',
            'sule_price',
            'date_entry',
            'date_exit'
        ]);

        // Validando
        $validator = Validator::make($data, [
            'product_id'      => ['required', 'numeric', 'max:10000'],
            'amount_entry'    => ['required', 'numeric', 'max:10000'],
            'amount_exit'     => ['nullable', 'numeric', 'max:10000'],
            'cost_price'      => ['required', 'numeric', 'max:10000'],
            'sule_price'      => ['required', 'numeric', 'max:10000'],
            'date_entry'      => ['required', 'date'],
            'date_exit'       => ['nullable','date']
        ]);

        // Verificando se a quantidade saida é maior que a quantidade entrada
        if ($data['amount_exit'] > $data['amount_entry']) {
            return redirect()->route('stocks')->with('error', 'A Quantidade Saída não pode ser maior que a Quantidade Entrada!');
        }

        // Verificando se a Data Saida é menor que a Data Entrada
        if ($data['date_exit'] < $data['date_entry']) {
            return redirect()->route('stocks')->with('error', 'A Data Saída não pode ser menor que a Data Entrada!');
        }

        // Verificando se existe algum erro com a validação
        if ($validator->fails()){
            return redirect()->route('stocks.create')
                ->withErrors($validator)
                ->withInput();
        }

        // Inserindo no BD
        $stock = new Stock();
        $stock->product_id      = $data['product_id'];
        $stock->amount_entry    = $data['amount_entry'];
        $stock->amount_exit     = $data['amount_exit'];
        $stock->cost_price      = $data['cost_price'];
        $stock->sule_price      = $data['sule_price'];
        $stock->date_entry      = $data['date_entry'];
        $stock->date_exit       = $data['date_exit'];
        $stock->save();

        return redirect()->route('stocks')->with('success', 'Produto adicionado no estoque com sucesso!');
    }

    /**
     * Deletando o produto no estoque
     *
     * @param integer $id Recebe o id do produto no estoque
     * @return void
     */
    public function destroy(int $id)
    {
        $product_stock = Stock::find($id);
        $product_stock->delete();

        return redirect()->route('stocks')->with('success', 'Produto excluído do estoque com sucesso!');
    }

    /**
     * Exibe o formulario Editar Produto no Estoque
     *
     * @param integer $id Recebe o id do produto no estoqe
     * @return void
     */
    public function edit(int $id)
    {
        $product_stock = Stock::find($id);
        $products = Product::orderby('name')->get();

        if ($product_stock){
            return view('admin.stock.edit', [
                'product_stock' => $product_stock,
                'products' => $products
            ]);
        }

        return redirect()->route('admin.stock.edit');
    }

    /**
     * Edita o produto do estoque no BD
     *
     * @param Request $request Recebe os dados do formulario
     * @param integer $id Recebe o id do produto no estoque
     * @return void
     */
    public function update(Request $request, int $id)
    {
        $product_stock = Stock::find($id);

        if ($product_stock){
            // Recebendo apenas os dados abaixo do formulario
            $data = $request->only([
                'product_id',
                'amount_entry',
                'amount_exit',
                'cost_price',
                'sule_price',
                'date_entry',
                'date_exit'
            ]);

            // Validando
            $validator = Validator::make($data, [
                'product_id'      => ['required', 'numeric', 'max:10000'],
                'amount_entry'    => ['required', 'numeric', 'max:10000'],
                'amount_exit'     => ['nullable', 'numeric', 'max:10000'],
                'cost_price'      => ['required', 'numeric', 'max:10000'],
                'sule_price'      => ['required', 'numeric', 'max:10000'],
                'date_entry'      => ['required', 'date'],
                'date_exit'       => ['nullable','date']
            ]);

            // Verificando se a quantidade saida é maior que a quantidade entrada
            if ($data['amount_exit'] > $data['amount_entry']) {
                return redirect()->route('stocks')->with('error', 'A Quantidade Saída não pode ser maior que a Quantidade Entrada!');
            }

            // Verificando se a Data Saida é menor que a Data Entrada
            if ($data['date_exit'] < $data['date_entry']) {
                return redirect()->route('stocks')->with('error', 'A Data Saída não pode ser menor que a Data Entrada!');
            }

            // Verificando se existe algum erro com a validação
            if ($validator->fails()){
                return redirect()->route('stocks.edit', ['id' => $product_stock->id])
                    ->withErrors($validator)
                    ->withInput();
            }

            // Inserindo no BD
            $product_stock->product_id      = $data['product_id'];
            $product_stock->amount_entry    = $data['amount_entry'];
            $product_stock->amount_exit     = $data['amount_exit'];
            $product_stock->cost_price      = $data['cost_price'];
            $product_stock->sule_price      = $data['sule_price'];
            $product_stock->date_entry      = $data['date_entry'];
            $product_stock->date_exit       = $data['date_exit'];
            $product_stock->save();

            if($product_stock){
                return redirect()->route('stocks')->with('success', 'Produto no Estoque atualizado com sucesso!');
            }
        }

        return redirect()->route('stocks')->with('error', 'Produto no Estoque atualizado com sucesso!');
    }
}
