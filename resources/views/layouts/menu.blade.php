<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/" wire:navigate>
                    <span data-feather="pie-chart"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                @if (Request::is('users/*'))
                <a class="nav-link active" href="/users" wire:navigate>
                    <span data-feather="users"></span>
                    ຜູ້ໃຊ້
                </a>
                @else
                <a class="nav-link {{ Request::is('users') ? 'active' : '' }}" href="/users" wire:navigate>
                    <span data-feather="users"></span>
                    ຜູ້ໃຊ້
                </a>
                @endif
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('categories') ? 'active' : '' }}" href="/categories" wire:navigate>
                    <span data-feather="menu"></span>
                    ປະເພດສິນຄ້າ
                </a>
            </li>
            <li class="nav-item">
                @if (Request::is('products/*'))
                <a class="nav-link active" href="/products" wire:navigate>
                    <span data-feather="align-left"></span>
                    ສິນຄ້າ
                </a>
                @else
                <a class="nav-link {{ Request::is('products') ? 'active' : '' }}" href="/products" wire:navigate>
                    <span data-feather="align-left"></span>
                    ສິນຄ້າ
                </a>
                @endif
            </li>
            <li class="nav-item">
                @if (Request::is('orders/*'))
                <a class="nav-link active" href="/orders" wire:navigate>
                    <span data-feather="shopping-cart"></span>
                    ສັ່ງຊື້+ນຳເຂົ້າ
                </a>
                @else
                    <a class="nav-link {{ Request::is('orders') ? 'active' : '' }}" href="/orders" wire:navigate>
                        <span data-feather="shopping-cart"></span>
                        ສັ່ງຊື້+ນຳເຂົ້າ
                    </a>
                @endif
            </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>ລາຍງານຂໍູ້ມນ</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    ປະເພດສິນຄ້າ
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    ສິນຄ້າ
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    ສັ່ງຊື້+ນຳເຂົ້າ
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    ຂາຍສິນຄ້າ
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    ລາຍຮັບ+ລາຍຈ່າຍ
                </a>
            </li>
        </ul>
    </div>
</nav>
