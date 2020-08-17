<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Seller;
use App\Http\Resources\SellerResource;

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
        $sellers = SellerResource::collection($this->model->all());

        return $this->responseAPI('Vendedores retornados com sucesso!', 200, $sellers);
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

            $seller = $this->model->fill($request->all());

            $seller->save();

            return $this->responseAPI('Vendedor inserido com sucesso', 201, $seller);

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
        try {

            $seller = $this->model->findOrFail($id);

            return $this->responseAPI('Vendedor listado com sucesso', 201, $seller);

        } catch (\Exception $e) {

            return $this->responseAPI('Vendedor não encontrado', 500);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $seller = $this->model->findOrFail($id);
            $seller->fill($request->all());

            $seller->save();

            return $this->responseAPI('Vendedor modificado com sucesso', 201, $seller);

        } catch (\Exception $e) {

            return $this->responseAPI('Erro interno do servidor', 500);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $seller = $this->model->findOrFail($id);

            $seller->delete();

            return $this->responseAPI('Vendedor excluído com sucesso', 200);

        } catch (\Exception $e) {

            return $this->responseAPI('Erro interno do servidor', 500);

        }
    }
}
