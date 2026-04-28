@extends('layouts.app')

@section('title', $produto->nome . ' — CompareJá')

@section('content')

{{-- Fancybox --}}
@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
@endpush

{{-- Breadcrumb --}}
<section class="content-header">
    <div class="row mb-4">
        <div class="col-12">
            <div style="font-size: 1rem;">
                <a href="{{ route('produto.index') }}">Produtos</a>
                <i class="fas fa-chevron-right mx-2"></i>
                <span>{{ $produto->categoria->nome ?? '' }}</span>
                <i class="fas fa-chevron-right mx-2"></i>
                <span>{{ $produto->nome }}</span>
            </div>
        </div>
    </div>
</section>

{{-- Imagem destaque --}}
<div class="jumbotron py-4 mb-4 text-center bg-light">
    <a href="{{ asset('storage/img-produtos/' . $produto->foto) }}" data-fancybox="gallery">
        <img src="{{ asset('storage/img-produtos/' . $produto->foto) }}"
             alt="{{ $produto->nome }}"
             class="img-fluid rounded mb-3"
             style="max-height: 220px;"
             onerror="this.src='https://placehold.co/400x220?text=Sem+Foto'">
    </a>
</div>

{{-- Comparação por supermercado --}}
<section class="section">
    <div class="row">
        <div class="col-12">
            <h3 class="text-center">{{ $produto->nome }}</h3>
        </div>
        <div class="col-1"></div>
        <div class="col-10">
            @if(isset($supermercado) && count($supermercado) > 0)
                <ul class="list-group">
                    @foreach($supermercado as $mercado)
                        <li class="list-group-item mb-3">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-2 text-center mb-2 mb-md-0">
                                    <a href="{{ asset('storage/img-supermercados/' . $mercado->imagem) }}" data-fancybox="gallery">
                                        <img alt="{{ $mercado->nome }}"
                                             src="{{ asset('storage/img-supermercados/' . $mercado->imagem) }}"
                                             class="img-fluid rounded mx-auto d-block"
                                             style="max-height: 60px;"
                                             onerror="this.src='https://placehold.co/80x60?text={{ urlencode($mercado->nome) }}'">
                                    </a>
                                </div>
                                <div class="col-12 col-md-6 text-center text-md-left mb-2 mb-md-0">
                                    <h4 class="mb-0">{{ $mercado->nome }}</h4>
                                </div>
                                <div class="col-12 col-md-4 text-center">
                                    <h3 class="text-warning mb-0">
                                        R$ {{ number_format(rand(1000, 99900) / 100, 2, ',', '.') }}
                                    </h3>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="alert alert-info text-center">
                    Nenhum supermercado cadastrado para este produto.
                </div>
            @endif
        </div>
        <div class="col-1"></div>
    </div>
</section>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
@endpush

@endsection
