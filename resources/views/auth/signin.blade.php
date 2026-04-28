<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>CompareJá</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('otika-bootstrap-admin-template/assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('otika-bootstrap-admin-template/assets/bundles/bootstrap-social/bootstrap-social.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('otika-bootstrap-admin-template/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('otika-bootstrap-admin-template/assets/css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('otika-bootstrap-admin-template/assets/css/custom.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('otika-bootstrap-admin-template/assets/img/favicon.ico') }}" />
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .left-column {
            width: 50%;
            background: url('{{ asset('otika-bootstrap-admin-template/assets/img/login-image.jpg') }}') no-repeat center center;
            background-size: cover;
        }

        .left-column img {
            height: 100%;
            width: auto;
            object-fit: cover;
        }

        .right-column {
            width: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-primary {
            width: 100%;
            max-width: 400px;
        }

        h1.display-4 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="d-flex h-100">
        <!-- Coluna da Imagem -->
        <div class="left-column">
            <img class="img-fluid" src="{{ asset('assets/img/sigin-road.jpg') }}">
        </div>
        <!-- Coluna do Login -->
        <div class="right-column">
            <div class="w-100" style="max-width: 400px;">
                <h1 class="text-center display-4 font-weight-bold mb-4 text-dark">Comparejá</h1>
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        @if(session('login_error'))
                            <div class="alert alert-danger alert-dismissible show fade" id="login-error-alert">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>×</span>
                                    </button>
                                    {{ session('login_error') }}
                                </div>
                            </div>
                        @endif

                        @if(session('register_success'))
                            <div class="alert alert-success alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>×</span>
                                    </button>
                                    {{ session('register_success') }}
                                </div>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('auth.do_login') }}" class="needs-validation" novalidate>
                            @csrf
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}"
                                    tabindex="1" required autofocus>
                                <div class="invalid-feedback">
                                    @error('email'){{ $message }}@else Por favor insira o seu e-mail @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label">Senha</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password" tabindex="2" required>
                                <div class="invalid-feedback">
                                    @error('password'){{ $message }}@else Por favor insira a sua senha! @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Entrar
                                </button>
                            </div>
                        </form>
                        <div class="d-flex align-items-center mb-3">
                            <hr class="flex-grow-1">
                            <span class="mx-3">ou</span>
                            <hr class="flex-grow-1">
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <a class="btn btn-success btn-lg btn-block" tabindex="4" href="{{ route('auth.register') }}">
                                    Cadastre-se
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5 text-muted text-center">
                    Para retornar à pagina de produtos: <a href="{{ route('produto.index') }}">clique aqui!</a>
                </div>
            </div>
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('otika-bootstrap-admin-template/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('otika-bootstrap-admin-template/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('otika-bootstrap-admin-template/assets/js/custom.js') }}"></script>
    <script>
        $(document).ready(function () {
            if ($('#login-error-alert').length) {
                setTimeout(function () {
                    $('#login-error-alert').fadeOut(2000);
                }, 1000);
            }
        });
    </script>
</body>

</html>
