<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Seller;
use DB;

class HomeController extends Controller
{
    public function __construct(Sale $saleModel, Seller $sellerModel)
    {
        $this->saleModel = $saleModel;
        $this->sellerModel = $sellerModel;
    }

    function index()
    {
        $sellers = $this->sellerModel->all();

        return view('index', [
            'sellers' => $sellers
        ]);
    }

    function report($id) {

        $sales = $this->saleModel->select('sale.sale_value', 'sale.commission', 's.created_at')
                             ->join('seller as s', 's.id', '=', 'sale.seller_id')
                             ->where('sale.seller_id', $id)
                             ->get();

        $seller = $this->sellerModel->findOrFail($id);

        $total = $this->saleModel->select(DB::raw('SUM(sale.sale_value) as sale_values, SUM(sale.commission) as commissions'))
                                ->where('sale.seller_id', $id)
                                ->first();

        return view('sale.report', [
                'sales' => $sales,
                'seller' => $seller,
                'totalSales' => $total->sale_values,
                'totalCommissions' => $total->commissions]);
    }

    function store() {
        $sellers = $this->sellerModel->all();

        return view('sale.store', ['sellers' => $sellers]);
    }
}
