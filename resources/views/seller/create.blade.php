@extends('layouts.app')

@section('content')
    <div class="flex-center container pt-5 mt-5">
        <div class="row text-center mb-5">
            <h2 class="col-12">Criar Vendedor</h2>
        </div>

        <div class="row" id="create-seller">
            @if(Route::currentRouteName() == 'seller.create')
            <form action="{{ route('seller.store') }}" id="seller-create" method="POST" style="width: 100%">
                @csrf
                <div class="row" style="display: flex; align-items: center; justify-content: center;">
                    <div class="form-group col-10">
                        <label for="#name">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" />
                    </div>
                    <div class="form-group col-10">
                        <label for="#email">Email</label>
                        <input type="text" class="form-control" id="email" name="email"/>
                    </div>

                    <div class="form-group col-10 mt-3 text-center">
                        <button class="btn btn-dark p-2" style="width: 30rem" type="submit">Submit</button>
                    </div>
                </div>
            </form>
            @else
            <form action="{{ route('seller.update', ['seller' => $seller->id]) }}" id="seller-create" method="POST" style="width: 100%">
                @csrf
                {{ method_field('PUT') }}
                <div class="row" style="display: flex; align-items: center; justify-content: center;">
                    <div class="form-group col-10">
                        <label for="#name">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $seller->name }}"/>
                    </div>
                    <div class="form-group col-10">
                        <label for="#email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $seller->email }}"/>
                    </div>

                    <div class="form-group col-10 mt-3 text-center">
                        <button class="btn btn-dark p-2" style="width: 30rem" type="submit">Submit</button>
                    </div>
                </div>
            </form>
            @endif
        </div>
    </div>
@endsection


@section('script')
    <script type="module" src="{{ asset('/assets/main.js') }}"></script>
@endsection
