<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Requisition;
use Illuminate\Support\Facades\Validator;

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

    /**
     * Exibe o formulario Nova Requisicao
     *
     * @return void
     */
    public function create()
    {
        $users = User::orderby('name')->get();
        $products = Product::orderby('name')->get();

        return view('admin.requisition.create', [
            'users'    => $users,
            'products' => $products
        ]);
    }

    /**
     * Cadastra a requisicao no BD
     *
     * @param Request $request Recebe os dados do formulario
     * @return void
     */
    public function store(Request $request)
    {
        $dataAtual = date("Y-m-d");

        // Recebendo os dados do formulário
        $data = $request->only([
            'user_id',
            'product_id',
            'amount',
            'withdrawal_date'
        ]);

        // Validando
        $validator = Validator::make($data, [
            'user_id'         => ['required', 'numeric', 'max:10000'],
            'product_id'      => ['required', 'numeric', 'max:10000'],
            'amount'          => ['required', 'numeric', 'max:10000'],
            'withdrawal_date' => ['required', 'date']
        ]);

        if ($data['withdrawal_date'] < $dataAtual){
            return redirect()->back()->with('error', 'A Data da Retirada não pode ser menor que a Data Atual!');
        }

        // Verificando se existe algum erro com a validação
        if ($validator->fails()){
            return redirect()->route('requisitions.create')
                ->withErrors($validator)
                ->withInput();
        }

        // Inserindo no BD
        $requisition = new Requisition();
        $requisition->user_id         = $data['user_id'];
        $requisition->product_id      = $data['product_id'];
        $requisition->amount          = $data['amount'];
        $requisition->withdrawal_date = $data['withdrawal_date'];
        $requisition->save();

        return redirect()->route('requisitions')->with('success', 'Requisição cadastrada com sucesso!');
    }
}
