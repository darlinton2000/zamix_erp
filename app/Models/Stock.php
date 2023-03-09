<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Stock extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'amount_entry', 'amount_exit', 'cost_price', 'sule_price', 'date_entry', 'date_exit'
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    /**
     * Consulta produtos que entraram no estoque
     *
     * @return void
     */
    public function queryGraphicEntryStock(){
        $results1 = DB::table(DB::raw('(SELECT DATE_ADD(\'2023-01-01\', INTERVAL (n.n + (m.m*12)) MONTH) AS data
                                        FROM (SELECT 0 AS m UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5) AS m,
                                        (SELECT 0 AS n UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9 UNION SELECT 10 UNION SELECT 11) AS n
                                        WHERE DATE_ADD(\'2023-01-01\', INTERVAL (n.n + (m.m*12)) MONTH) <= \'2023-12-31\') as m'))
            ->leftJoin('stocks as p', function ($join) {
                $join->on(DB::raw('YEAR(m.data)'), '=', DB::raw('YEAR(p.date_entry)'))
                     ->on(DB::raw('MONTH(m.data)'), '=', DB::raw('MONTH(p.date_entry)'));
            })
            ->select(DB::raw('COALESCE(COUNT(p.id), 0) AS quantidade_de_produtos'))
            ->groupBy(DB::raw('YEAR(m.data)'), DB::raw('MONTH(m.data)'))
            ->get();

        $valores1 = $results1->pluck('quantidade_de_produtos')->toArray();
        return $graphicValues1 = json_encode(array_values($valores1));
    }

    /**
     * Consulta produtos que sairam no estoque
     *
     * @return void
     */
    public function queryGraphicExitStock(){
        $results2 = DB::table(DB::raw('(SELECT DATE_ADD(\'2023-01-01\', INTERVAL (n.n + (m.m*12)) MONTH) AS data
                                        FROM (SELECT 0 AS m UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5) AS m,
                                        (SELECT 0 AS n UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9 UNION SELECT 10 UNION SELECT 11) AS n
                                        WHERE DATE_ADD(\'2023-01-01\', INTERVAL (n.n + (m.m*12)) MONTH) <= \'2023-12-31\') as m'))
            ->leftJoin('stocks as p', function ($join) {
                $join->on(DB::raw('YEAR(m.data)'), '=', DB::raw('YEAR(p.date_exit)'))
                     ->on(DB::raw('MONTH(m.data)'), '=', DB::raw('MONTH(p.date_exit)'));
            })
            ->select(DB::raw('COALESCE(COUNT(p.id), 0) AS quantidade_de_produtos'))
            ->groupBy(DB::raw('YEAR(m.data)'), DB::raw('MONTH(m.data)'))
            ->get();

        $valores2 = $results2->pluck('quantidade_de_produtos')->toArray();
        return $graphicValues2 = json_encode(array_values($valores2));
    }
}
