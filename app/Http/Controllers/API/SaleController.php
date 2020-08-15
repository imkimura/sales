<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sale;
use App\Seller;

class SaleController extends Controller
{

    public function __construct(Sale $model, Seller $sellerModel)
    {
        $this->model = $model;
        $this->sellerModel = $sellerModel;
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

            $sale->commission = number_format($sale->sale_value * 0.085, 2);

            $sale->save();

            return $this->responseAPI('Venda inserida com sucesso', 201, $sale);

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
    public function show($seller_id)
    {

        $sales = $this->model->select('s.name', 's.email', 'sale.sale_value', 'sale.commission', 's.created_at')
                             ->join('seller as s', 's.id', '=', 'sale.seller_id')
                             ->where('sale.seller_id', $seller_id)
                             ->get();

        return $this->responseAPI('Vendas listadas com sucesso', 201, $sales);
    }

}
