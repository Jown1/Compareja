@extends('layouts.app')

@section('title', isset($produto->id) ? 'Editar Produto' : 'Novo Produto')

@section('content')

<section class="content-header">
    <div class="row mb-2">
        <div class="col-sm-6 mt-2">
            <h4>Produto</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('produto.list') }}">Lista</a></li>
                @if(isset($produto->id))
                    <li class="breadcrumb-item"><a href="{{ route('produto.show', $produto->id) }}">Visualizar</a></li>
                @endif
                <li class="breadcrumb-item active">{{ isset($produto->id) ? 'Editar' : 'Adicionar' }}</li>
            </ol>
        </div>
    </div>
</section>

<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ isset($produto->id) ? route('produto.update', $produto->id) : route('produto.store') }}"
                          enctype="multipart/form-data" method="POST">
                        @csrf

                        {{-- Imagem --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Imagem do produto</label>
                            <div class="col-sm-12 col-md-7">
                                <div id="image-preview" class="image-preview">
                                    <label for="image-upload" id="image-label">Escolha a imagem</label>
                                    <input type="file" name="foto" id="image-upload" accept=".jpg,.jpeg,.png"
                                           {{ isset($produto->id) ? '' : 'required' }} style="pointer-events: none" />
                                </div>
                                @if(isset($produto->foto))
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/img-produtos/' . $produto->foto) }}"
                                             height="60" alt="foto atual"
                                             onerror="this.style.display='none'">
                                        <small class="text-muted ml-2">Foto atual</small>
                                    </div>
                                @endif
                                @error('foto')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Nome --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nome</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="nome"
                                       class="form-control @error('nome') is-invalid @enderror"
                                       placeholder="Digite o nome do produto"
                                       value="{{ old('nome', $produto->nome ?? '') }}" required>
                                @error('nome')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        {{-- Fabricante --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Fabricante</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="fabricante"
                                       class="form-control"
                                       placeholder="Digite o nome do fabricante"
                                       value="{{ old('fabricante', $produto->fabricante ?? '') }}">
                            </div>
                        </div>

                        {{-- Categoria --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="categorias">Categoria</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control select2 @error('id_categoria') is-invalid @enderror"
                                        name="id_categoria" id="categorias" required>
                                    <option value="">Selecione...</option>
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}"
                                            {{ old('id_categoria', $produto->id_categoria ?? '') == $categoria->id ? 'selected' : '' }}>
                                            {{ $categoria->nome }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_categoria')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Preço --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Preço (R$)</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="preco"
                                       class="form-control money @error('preco') is-invalid @enderror"
                                       placeholder="0,00"
                                       value="{{ old('preco', isset($produto->preco) ? number_format($produto->preco, 2, ',', '.') : '') }}"
                                       required>
                                @error('preco')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        {{-- Descrição --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Descrição</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea name="descricao" class="form-control" rows="5"
                                          placeholder="Digite a descrição do produto">{{ old('descricao', $produto->descricao ?? '') }}</textarea>
                            </div>
                        </div>

                        {{-- Botão --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <a href="{{ route('produto.list') }}" class="btn btn-secondary ml-2">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
<link href="{{ asset('otika-bootstrap-admin-template/assets/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('otika-bootstrap-admin-template/assets/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#categorias').select2();

        $.uploadPreview({
            input_field: "#image-upload",
            preview_box: "#image-preview",
            label_field: "#image-label",
            label_default: "Escolha a imagem",
            label_selected: "Trocar imagem",
            no_label: false
        });

        // Máscara de preço
        $('.money').on('input', function () {
            let value = this.value.replace(/\D/g, '');
            value = (value / 100).toFixed(2).replace('.', ',');
            this.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        });
    });
</script>
@endpush

@endsection
