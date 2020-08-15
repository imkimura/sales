<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sale;


class SaleController extends Controller
{

    public function __construct(Sale $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = $this->model->select('s.name', 's.email', 'sale.sale_value', 's.created_at')
                             ->join('seller as s', 's.id', '=', 'sale.seller_id')
                             ->get();

        return $this->responseAPI('Vendas listadas com sucesso', 201, $sales);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $sale = $this->model->fill($request->all());

            $sale->save();

            return $this->responseAPI('Vendedor inserido com sucesso', 201, $sale);

        } catch (\Exception $e) {

            return $this->responseAPI('Erro interno do servidor', 500);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

}
