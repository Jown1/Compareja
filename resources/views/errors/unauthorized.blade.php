@extends('layouts.app')

@section('title', 'Acesso Negado — CompareJa')

@section('content')
<div class="text-center py-5">
    <i class="fas fa-lock fa-4x text-danger mb-3"></i>
    <h3 class="fw-bold">Acesso Não Autorizado</h3>
    <p class="text-muted">Você não tem permissão para acessar esta página.</p>
    <a href="{{ route('auth.login') }}" class="btn btn-success mt-2">
        <i class="fas fa-sign-in-alt me-1"></i> Fazer Login
    </a>
</div>
@endsection
