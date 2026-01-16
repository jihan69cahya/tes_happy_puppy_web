<aside class="page-sidebar">
    <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
    <div class="main-sidebar" id="main-sidebar">
        <ul class="sidebar-menu" id="simple-bar">
            <li class="pin-title sidebar-main-title">
                <div>
                    <h5 class="sidebar-title f-w-700">Pinned</h5>
                </div>
            </li>
            <li class="sidebar-main-title">
                <div>
                    <h5 class="lan-1 f-w-700 sidebar-title">General</h5>
                </div>
            </li>
            <li class="sidebar-list"> <i class="fa-solid fa-thumbtack"></i><a class="sidebar-link"
                    href="{{ route('dashboard.index') }}"><svg class="stroke-icon">
                        <use href="{{ asset('assets') }}/svg/iconly-sprite.svg#Home-dashboard"></use>
                    </svg>
                    <h6 class="f-w-600">Dashboard</h6>
                </a>
            </li>
            <li class="sidebar-list"> <i class="fa-solid fa-thumbtack"></i><a class="sidebar-link" href="#"><svg
                        class="stroke-icon">
                        <use href="{{ asset('assets') }}/svg/iconly-sprite.svg#Folder"></use>
                    </svg>
                    <h6 class="f-w-600">Produk</h6>
                </a>
            </li>
        </ul>
    </div>
    <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
</aside><!-- Page sidebar end-->
