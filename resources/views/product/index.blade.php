@extends('layouts.app')

@section('title', 'Produtos — CompareJá')

@section('content')
<section class="section">
    <div class="row">
        <!-- Filtros -->
        <div class="col-2">
            <div class="form-group w-100">
                <label for="categorias">Categorias</label>
                {{-- select2 é inicializado globalmente no app.blade.php --}}
                <select class="form-control select2" multiple id="categorias" style="width: 100%;">
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ request('categoria') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Preço</label>
                <div class="input-group w-100">
                    <input type="text" class="form-control price-mask" placeholder="Min." id="preco-min">
                    <div class="input-group-prepend input-group-append">
                        <span class="input-group-text px-1">-</span>
                    </div>
                    <input type="text" class="form-control price-mask" placeholder="Max." id="preco-max">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-primary" id="btn-filtro-preco">
                            <i class="fas fa-angle-right"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Cidade / Região:</label>
                {{-- select2 simples (não multiple) --}}
                <select class="form-control cidade" id="cidade-select">
                    <option value="0" selected>Selecione...</option>
                    @foreach($cidades as $cidade)
                        <option value="{{ $cidade->id }}" {{ request('cidade') == $cidade->id ? 'selected' : '' }}>
                            {{ $cidade->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            @if(session('logged_in'))
                <a href="{{ route('produto.create') }}" class="btn btn-primary btn-block mt-3">
                    <i class="fas fa-plus"></i> Novo Produto
                </a>
            @endif
        </div>

        <!-- Produtos -->
        <div class="col-8">
            @if(isset($produtos) && count($produtos) > 0)
                <div class="row">
                    @foreach($produtos as $produto)
                        <div class="col-4">
                            <article class="article">
                                <div class="article-header">
                                    <div class="article-image"
                                         data-background="{{ asset('storage/img-produtos/' . $produto->foto) }}">
                                    </div>
                                    <div class="article-title"
                                         style="position:absolute;top:0;left:0;width:100%;
                                                background:rgba(0,0,0,0.5);color:#fff;
                                                padding:10px;box-sizing:border-box;">
                                        <h2 style="margin:0;font-size:16px;">
                                            <a href="#" style="color:#fff;text-decoration:none;">
                                                {{ $produto->nome }}
                                            </a>
                                        </h2>
                                    </div>
                                </div>
                                <div class="article-details">
                                    <p>{{ Str::words($produto->descricao, 8) }}</p>
                                    <div class="article-cta">
                                        <a href="{{ route('produto.description', $produto->id) }}" class="btn btn-primary">
                                            Comparar
                                        </a>
                                    </div>
                                </div>
                            </article>
                        </div>
                        @if($loop->iteration % 3 == 0 && !$loop->last)
                            </div><div class="row mt-3">
                        @endif
                    @endforeach
                </div>
            @else
                <div class="col-12">
                    <div class="alert alert-warning text-center">
                        <strong>Nenhum produto encontrado!</strong>
                    </div>
                </div>
            @endif
        </div>

        <div class="col-2"></div>

        <!-- Paginação no estilo Otika -->
        @if(isset($produtos) && method_exists($produtos, 'links') && $produtos->lastPage() > 1)
            <div class="col-12 d-flex justify-content-center mt-4">
                {{ $produtos->onEachSide(1)->links('pagination::bootstrap-4') }}
            </div>
        @endif
    </div>
</section>

@push('scripts')
<script>
    $(document).ready(function () {
        // Select2 para cidade sem campo de pesquisa
        $('#cidade-select').select2({
            minimumResultsForSearch: Infinity,
            placeholder: "Selecione...",
            language: { noResults: function() { return "Nenhum resultado"; } }
        });

        // Filtro por preço
        $('#btn-filtro-preco').on('click', function () {
            const min = $('#preco-min').val().replace(/\D/g, '');
            const max = $('#preco-max').val().replace(/\D/g, '');
            window.location.href = '{{ route('produto.index') }}?preco_min=' + min + '&preco_max=' + max;
        });

        // Máscara de preço
        $('.price-mask').on('input', function () {
            let value = this.value.replace(/\D/g, '');
            value = (value / 100).toFixed(2).replace('.', ',');
            this.value = 'R$ ' + value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        });
    });
</script>
@endpush
@endsection
