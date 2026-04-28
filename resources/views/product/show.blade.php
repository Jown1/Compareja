@extends('layouts.app')

@section('title', 'Detalhes do Produto — CompareJá')

@section('content')

<section class="content-header">
    <div class="row mb-2">
        <div class="col-sm-6 mt-2">
            <h4>Produto</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('produto.list') }}">Lista</a></li>
                <li class="breadcrumb-item active">Visualizar</li>
            </ol>
        </div>
    </div>
</section>

<section class="section">
    <div class="row">
        <div class="col-12">
            <h3 class="text-center">{{ $produto->nome }}</h3>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center mb-4">
                            <img src="{{ asset('storage/img-produtos/' . $produto->foto) }}"
                                 alt="{{ $produto->nome }}"
                                 style="max-height: 300px; max-width: 100%; object-fit: contain;"
                                 onerror="this.src='https://placehold.co/300x300?text=Sem+Foto'">
                        </div>
                        <div class="col-md-8">
                            <h5>Fabricante:</h5>
                            <p>{{ $produto->fabricante ?: '—' }}</p>
                            <h5>Categoria:</h5>
                            <p>{{ $produto->categoria->nome ?? '—' }}</p>
                            <h5>Descrição:</h5>
                            <p>{{ $produto->descricao ?: '—' }}</p>
                            <h5>Preço:</h5>
                            <p class="text-warning font-weight-bold" style="font-size: 1.3rem;">
                                R$ {{ number_format($produto->preco, 2, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-2">
            <a href="{{ route('produto.edit', $produto->id) }}" class="btn btn-primary mr-2">
                Editar
            </a>
            <a href="{{ route('produto.description', $produto->id) }}" class="btn btn-success mr-2">
                Ver Pública
            </a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete">
                Excluir
            </button>
        </div>
    </div>
</section>

{{-- Modal de exclusão --}}
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmar exclusão</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Tem certeza que deseja excluir este produto?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form action="{{ route('produto.destroy', $produto->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
