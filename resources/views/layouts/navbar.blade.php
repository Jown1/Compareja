<nav class="navbar navbar-expand-lg main-navbar sticky">
    <div class="row w-100 no-gutters">
        <div class="col-11">
            <div class="form-inline row">
                <ul class="navbar-nav w-100">
                    <li class="col-3 float-right">
                        <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn">
                            <i data-feather="align-justify"></i>
                        </a>
                    </li>
                    <li class="col-7">
                        @if(request()->routeIs('produto.index') || request()->routeIs('produto.search'))
                            <form class="form-inline" action="{{ route('produto.search') }}" method="GET">
                                <div class="search-element d-flex w-100">
                                    <input class="form-control flex-grow-1" type="search" name="search"
                                           placeholder="Buscar" aria-label="Search"
                                           value="{{ request('search') }}" data-width="200">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-1">
            <ul class="navbar-nav navbar-right my-1 float-right">
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown"
                       class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        @php
                            $profileImage = session('user_profile_image');
                            $imageSrc = ($profileImage && $profileImage !== 'default-non-user.jpg')
                                ? asset('storage/img-profiles/' . $profileImage)
                                : asset('storage/img-profiles/default-non-user.jpg');
                        @endphp
                        <img alt="profile-image"
                             src="{{ $imageSrc }}"
                             class="user-img-radious-style"
                             onerror="this.src='{{ asset('storage/img-profiles/default-non-user.jpg') }}'">
                        <span class="d-sm-none d-lg-inline-block"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right pullDown">
                        @if(session('logged_in'))
                            <div class="dropdown-title">Bem vindo(a), {{ session('user_name') }}</div>
                            <a href="{{ route('user.profile') }}" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Perfil
                            </a>
                            @if(session('is_admin'))
                                <a href="{{ route('produto.list') }}" class="dropdown-item has-icon">
                                    <i class="fas fa-list"></i> Gerenciar Produtos
                                </a>
                                <a href="{{ route('produto.create') }}" class="dropdown-item has-icon">
                                    <i class="fas fa-plus"></i> Novo Produto
                                </a>
                            @endif
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('auth.logout') }}" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt mt-0"></i> Logout
                            </a>
                        @else
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('auth.login') }}" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-in-alt mt-0"></i> Login
                            </a>
                        @endif
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
