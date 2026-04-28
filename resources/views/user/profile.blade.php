@extends('layouts.app')

@section('title', 'Meu Perfil — CompareJá')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6">
        <h5 class="font-weight-bold mb-3">Meu Perfil</h5>

        <div class="card shadow-sm">
            <div class="card-body p-4">

                {{-- Foto de perfil + form de upload --}}
                <div class="text-center mb-4">
                    <div style="position: relative; display: inline-block;">
                        <img id="preview-foto"
                             src="{{ asset('storage/img-profiles/' . (session('user_profile_image') ?: 'default-non-user.jpg')) }}"
                             class="rounded-circle"
                             width="100" height="100"
                             style="object-fit: cover; border: 3px solid #6777ef;"
                             alt="Foto de perfil"
                             onerror="this.src='{{ asset('storage/img-profiles/default-non-user.jpg') }}'">

                        {{-- Botão de editar foto --}}
                        <label for="input-foto"
                               style="position: absolute; bottom: 0; right: 0;
                                      background: #6777ef; color: #fff; border-radius: 50%;
                                      width: 28px; height: 28px; display: flex;
                                      align-items: center; justify-content: center;
                                      cursor: pointer; box-shadow: 0 2px 6px rgba(0,0,0,0.3);">
                            <i class="fas fa-camera" style="font-size: 12px;"></i>
                        </label>
                    </div>

                    <h5 class="mt-3 mb-0">{{ session('user_name') }}</h5>
                    <p class="text-muted small">{{ session('user_email') }}</p>
                </div>

                {{-- Form oculto de upload de imagem --}}
                <form id="form-foto" action="{{ route('user.update_image') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" id="input-foto" name="profile_image"
                           accept="image/jpg,image/jpeg,image/png,image/webp"
                           style="display: none;">
                </form>

                <hr>

                {{-- Form de dados --}}
                <form action="{{ route('user.update') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="font-weight-bold">Nome</label>
                        <input type="text" name="nome" class="form-control"
                               value="{{ session('user_name') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">E-mail</label>
                        <input type="email" name="email" class="form-control"
                               value="{{ session('user_email') }}" required>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-success btn-block">
                            <i class="fas fa-save mr-1"></i> Atualizar Perfil
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Ao selecionar imagem: preview imediato e submit automático
    document.getElementById('input-foto').addEventListener('change', function () {
        const file = this.files[0];
        if (!file) return;

        // Preview antes do upload
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('preview-foto').src = e.target.result;
        };
        reader.readAsDataURL(file);

        // Submit do form de foto
        document.getElementById('form-foto').submit();
    });
</script>
@endpush

@endsection
