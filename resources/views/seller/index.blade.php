@extends('layouts.app')

@section('content')
    <div class="flex-center container pt-5 mt-5">
        <div class="row text-center mb-5">
            <h2 class="col-12">Vendedores Disponíveis <a class="btn btn-success" href="{{ route('seller.create') }}">Adicionar +</a></h2>
        </div>
        <div class="row" id="sellers">

        </div>
    </div>

    <div id="confirmModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box" style="font-size: 25px; color: red;">
                        <i class="fas fa-exclamation-circle">&nbsp;&nbsp;</i>
                    </div>
                    <h4 class="modal-title">Você tem certeza?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Você realmente deseja excluir esta Vendedor? O processo não pode ser desfeito.</p>
                </div>
                <div class="modal-footer">
                    <form action="." id="seller-create" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                        <button type="submit" role="button" class="btn btn-danger">Deletar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script type="module" src="{{ asset('/assets/main.js') }}"></script>
@endsection
