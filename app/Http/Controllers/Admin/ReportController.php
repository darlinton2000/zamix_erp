<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Stock;

class ReportController extends Controller
{   
    /**
     * Exibi a pagina 'Relatório Entrada de Estoque'
     *
     * @return void
     */
    public function entryStock()
    {
        return view('admin.report.entryStock');
    }

    /**
     * Metodo para pesquisar o relatorio entrada de estoque
     *
     * @param Request $request
     * @return void
     */
    public function searchEntryStock(Request $request)
    {
        // Recebendo apenas os dados abaixo do formulario
        $data = $request->only([
            'date_entry1',
            'date_entry2'
        ]);

        if ($data['date_entry1'] > $data['date_entry2']){
            return redirect()->back()->with('error', 'A Data Inicial não pode ser maior que a Data Final!');
        }

        $stocks = Stock::whereBetween('date_entry', [$data['date_entry1'], $data['date_entry2']])->get();

        return view('admin.report.searchEntryStock', [
            'stocks' => $stocks
        ]);
    }

    /**
     * Exibi a pagina 'Relatório Saida do Estoque'
     *
     * @return void
     */
    public function exitStock()
    {
        return view('admin.report.exitStock');
    }

    /**
     * Metodo para pesquisar o relatorio saida do estoque
     *
     * @param Request $request
     * @return void
     */
    public function searchExitStock(Request $request)
    {
        // Recebendo apenas os dados abaixo do formulario
        $data = $request->only([
            'date_exit1',
            'date_exit2'
        ]);

        if ($data['date_exit1'] > $data['date_exit2']){
            return redirect()->back()->with('error', 'A Data Inicial não pode ser maior que a Data Final!');
        }

        $stocks = Stock::whereBetween('date_exit', [$data['date_exit1'], $data['date_exit2']])->get();

        return view('admin.report.searchExitStock', [
            'stocks' => $stocks
        ]);
    }
}
