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
</head>

<body>
    <section class="section">
        <br><br><br>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Cadastre-se</h4>
                        </div>
                        <div class="card-body">

                            @if(session('register_error'))
                                <div class="alert alert-danger alert-dismissible show fade" id="register-error-alert">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert">
                                            <span>×</span>
                                        </button>
                                        {{ session('register_error') }}
                                    </div>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('auth.signup') }}">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="name">Nome</label>
                                        <input id="name" type="text"
                                            class="form-control @error('user.name') is-invalid @enderror"
                                            name="user[name]" value="{{ old('user.name') }}" autofocus>
                                        @error('user.name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input id="email" type="email"
                                        class="form-control @error('user.email') is-invalid @enderror"
                                        name="user[email]" value="{{ old('user.email') }}">
                                    @error('user.email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="password" class="d-block">Senha</label>
                                        <input id="password" type="password"
                                            class="form-control pwstrength @error('user.password') is-invalid @enderror"
                                            data-indicator="pwindicator"
                                            name="user[password]">
                                        <div id="pwindicator" class="pwindicator">
                                            <div class="bar"></div>
                                            <div class="label"></div>
                                        </div>
                                        @error('user.password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="password2" class="d-block">Confirme a senha</label>
                                        <input id="password2" type="password"
                                            class="form-control"
                                            name="user[password_confirmation]">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Cadastrar
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="mb-4 text-muted text-center">
                            Já possui cadastro? <a href="{{ route('auth.login') }}">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- General JS Scripts -->
    <script src="{{ asset('otika-bootstrap-admin-template/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('otika-bootstrap-admin-template/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('otika-bootstrap-admin-template/assets/js/custom.js') }}"></script>
    <script>
        $(document).ready(function () {
            if ($('#register-error-alert').length) {
                setTimeout(function () {
                    $('#register-error-alert').fadeOut(2000);
                }, 1000);
            }
        });
    </script>
</body>

</html>
