<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'CompareJá')</title>

    <link rel="stylesheet" href="{{ asset('otika-bootstrap-admin-template/assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('otika-bootstrap-admin-template/assets/bundles/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('otika-bootstrap-admin-template/assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('otika-bootstrap-admin-template/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('otika-bootstrap-admin-template/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('otika-bootstrap-admin-template/assets/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('otika-bootstrap-admin-template/assets/css/custom.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('otika-bootstrap-admin-template/assets/img/favicon.ico') }}" />

    @stack('styles')
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">

            @include('layouts.navbar')
            @include('layouts.sidebar')

            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        @yield('content')
                    </div>
                </section>
            </div>

            <footer class="main-footer">
                <div class="footer-left">
                    CompareJá &copy; {{ date('Y') }}
                </div>
            </footer>

        </div>
    </div>

    <script src="{{ asset('otika-bootstrap-admin-template/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('otika-bootstrap-admin-template/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('otika-bootstrap-admin-template/assets/js/custom.js') }}"></script>
    <script src="{{ asset('otika-bootstrap-admin-template/assets/bundles/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('otika-bootstrap-admin-template/assets/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('otika-bootstrap-admin-template/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>

    {{-- Inicialização global do select2 igual ao script.php original --}}
    <script>
        $(document).ready(function () {
            $('.select2').select2({
                placeholder: "Selecione...",
                language: {
                    noResults: function () {
                        return "Nenhum Registro Encontrado";
                    }
                }
            });
        });
    </script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        toastr.options = { positionClass: 'toast-top-right', timeOut: 4000 };
        @if(session('toast'))
            toastr.{{ session('toast.type') }}('{{ session('toast.message') }}');
        @endif
    </script>

    @stack('scripts')
</body>

</html>
