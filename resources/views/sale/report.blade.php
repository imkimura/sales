@extends('layouts.app')

@section('content')
    <div class="flex-center container pt-5 mt-5">
        <div class="row text-center mb-5">
            <h2 class="col-12">Vendas do {{ $seller->name }}</h2>
        </div>
        <div class="row" id="sellers">
            <table class="table">
                <caption>Lista de Venddores</caption>
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">Valor Venda</th>
                    <th scope="col">Comissão</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                        <tr>
                            <th></th>
                            <th>{{ $seller->email }}</th>
                            <td>{{ $sale->sale_value }}</td>
                            <td>{{ $sale->commission }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                      <th scope="col">Total</th>
                      <th scope="col"> </th>
                      <th scope="col">{{$totalSales}}</th>
                      <th scope="col">{{$totalCommissions}}</th>
                      <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="row mt-4 text-center" style="display: flex; justify-content:center">
            <a href="/" class="btn btn-dark" style="width: 250px">Voltar</a>
        </div>
    </div>
@endsection
