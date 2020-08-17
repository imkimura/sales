@extends('layouts.app')

@section('content')
    <div class="flex-center container pt-5 mt-5">
        <div class="row text-center mb-5">
            <h2 class="col-12">Vendedores Disponíveis</h2>
        </div>
        <div class="row" id="sellers">
            <table class="table">
                <caption>Lista de Venddores</caption>
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($sellers as $seller)
                        <tr>
                            <th scope="row">{{ $seller->id }}</th>
                            <td>{{ $seller->name }}</td>
                            <td>{{ $seller->email }}</td>
                            <td><a class="btn btn-dark" href="{{ route('report.sale', ['id' => $seller->id]) }}">Relatório</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row mt-4 text-center" style="display: flex; justify-content:center">
            <a href="/new-sale" class="btn btn-success" style="width: 250px">Nova Venda</a>
        </div>
    </div>
@endsection
