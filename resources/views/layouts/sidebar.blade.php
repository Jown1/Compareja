<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('produto.index') }}">
                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                <span class="logo-name">CompareJá</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>

            @if(session('logged_in'))
                <li class="{{ request()->routeIs('produto.index') || request()->routeIs('produto.description') ? 'active' : '' }}">
                    <a href="{{ route('produto.index') }}" class="menu-toggle nav-link has-dropdown">
                        <i data-feather="shopping-bag"></i><span>Produtos</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="{{ request()->routeIs('produto.index') ? 'active' : '' }}">
                            <a href="{{ route('produto.index') }}" class="nav-link">
                                <span>À venda</span>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('produto.list') ? 'active' : '' }}">
                            <a href="{{ route('produto.list') }}" class="nav-link">
                                <span>Cadastrados</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @else
                <li class="{{ request()->routeIs('produto.index') || request()->routeIs('produto.description') ? 'active' : '' }}">
                    <a href="{{ route('produto.index') }}" class="nav-link">
                        <i data-feather="shopping-bag"></i><span>Produtos</span>
                    </a>
                </li>
            @endif

        </ul>
    </aside>
</div>
