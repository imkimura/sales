<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seller;

class SellerController extends Controller
{

    public function __construct(Seller $model)
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
        return view('seller.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function create()
    {
        return view('seller.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seller = $this->model->findOrFail($id);

        return view('seller.create', [
            'seller' => $seller
        ]);
    }
}
