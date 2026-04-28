@extends('layouts.app')

@section('title', 'Gerenciar Produtos — CompareJá')

@section('content')

<section class="content-header">
    <div class="row mb-2">
        <div class="col-sm-6 mt-2">
            <h4>Gerenciar Produtos</h4>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('produto.create') }}" class="btn btn-primary float-right">
                <i class="fas fa-plus"></i> Novo Produto
            </a>
        </div>
    </div>
</section>

<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tabelaProdutos" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Foto</th>
                                    <th>Nome</th>
                                    <th>Fabricante</th>
                                    <th>Preço</th>
                                    <th>Cadastro</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
<link rel="stylesheet" href="{{ asset('otika-bootstrap-admin-template/assets/bundles/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('otika-bootstrap-admin-template/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('otika-bootstrap-admin-template/assets/bundles/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('otika-bootstrap-admin-template/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $('#tabelaProdutos').DataTable({
        ajax: {
            url: '{{ route('produto.list') }}',
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        },
        columns: [
            { data: 'id', width: '40px' },
            { data: 'foto', orderable: false },
            { data: 'nome' },
            { data: 'fabricante' },
            { data: 'preco' },
            { data: 'criacao' },
            {
                data: 'id',
                orderable: false,
                render: function (id) {
                    return `
                        <a href="/produto/${id}/exibir" class="btn btn-info btn-sm mr-1">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="/produto/${id}/editar" class="btn btn-warning btn-sm mr-1">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="/produto/${id}/excluir" method="POST" style="display:inline"
                              onsubmit="return confirm('Excluir este produto?')">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>`;
                }
            }
        ],
        language: { url: 'https://cdn.datatables.net/plug-ins/1.13.8/i18n/pt-BR.json' },
        order: [[0, 'desc']]
    });
</script>
@endpush

@endsection
