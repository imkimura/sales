@extends('layouts.app')

@section('content')
    <div class="flex-center container pt-5 mt-5">
        <div class="row text-center mb-5">
            <h2 class="col-12">Criar Venda</h2>
        </div>

        <div class="row" id="create-new-sale">
            <form action="{{ route('sale.store') }}" id="sale-create" method="POST" style="width: 100%">
                @csrf
                <div class="row" style="display: flex; align-items: center; justify-content: center;">

                    <div class="form-group col-10">
                        <label for="#seller_id">Vendedor</label>
                        <select class="custom-select" id="seller_id" name="seller_id">
                            <option selected>Selecione uma opção...</option>

                            @foreach ($sellers as $seller)
                                <option value="{{$seller->id }}">{{$seller->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-10">
                        <label for="#sale_value">Valor Venda</label>
                        <input type="text" class="form-control" id="sale_value" name="sale_value"/>
                    </div>

                    <div class="form-group col-10 mt-3 text-center">
                        <button class="btn btn-dark p-2" style="width: 30rem" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


@section('script')
    <script type="module" src="{{ asset('/assets/main.js') }}"></script>
@endsection
