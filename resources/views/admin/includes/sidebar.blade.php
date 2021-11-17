<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.main.index')}}" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{route('admin.user.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-users-cog"></i>
                    <p>
                        Пользователи
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.client.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Клиенты
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.offer.index')}}" class="nav-link">
                    <i class="nav-icon fab fa-buffer"></i>
                    <p>
                        Офферы
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.showcase.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-window-restore"></i>
                    <p>
                        Витрины
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-cogs"></i>
                    <p>
                       СМС
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.sms-template.index')}}" class="nav-link">
                            <i class="far fa-envelope nav-icon"></i>
                            <p>Шаблоны СМС</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('admin.short-sites-link.index')}}" class="nav-link">
                            <i class="fas fa-external-link-alt nav-icon"></i>
                            <p>Сайты коротких ссылок</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.letter-name.index')}}" class="nav-link">
                            <i class="fas fa-spell-check nav-icon"></i>
                            <p>Буквенные имена</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.setting.edit')}}" class="nav-link">
                            <i class="fas fa-wrench nav-icon"></i>
                            <p>Настройки сайта</p>
                        </a>
                    </li>

                </ul>
            </li>
            {{--                                <li class="nav-item">--}}
            {{--                                    <a href="#" class="nav-link">--}}
            {{--                                        <i class="nav-icon fas fa-book"></i>--}}
            {{--                                        <p>--}}
            {{--                                            Аналитика--}}
            {{--                                            <i class="fas fa-angle-left right"></i>--}}
            {{--                                        </p>--}}
            {{--                                    </a>--}}
            {{--                                    <ul class="nav nav-treeview">--}}
            {{--                                        <li class="nav-item">--}}
            {{--                                            <a href="pages/examples/invoice.html" class="nav-link">--}}
            {{--                                                <i class="far fa-circle nav-icon"></i>--}}
            {{--                                                <p>Invoice</p>--}}
            {{--                                            </a>--}}
            {{--                                        </li>--}}
            {{--                                        <li class="nav-item">--}}
            {{--                                            <a href="pages/examples/profile.html" class="nav-link">--}}
            {{--                                                <i class="far fa-circle nav-icon"></i>--}}
            {{--                                                <p>Profile</p>--}}
            {{--                                            </a>--}}
            {{--                                        </li>--}}
            {{--                                        <li class="nav-item">--}}
            {{--                                            <a href="pages/examples/e-commerce.html" class="nav-link">--}}
            {{--                                                <i class="far fa-circle nav-icon"></i>--}}
            {{--                                                <p>E-commerce</p>--}}
            {{--                                            </a>--}}
            {{--                                        </li>--}}
            {{--                                        <li class="nav-item">--}}
            {{--                                            <a href="pages/examples/projects.html" class="nav-link">--}}
            {{--                                                <i class="far fa-circle nav-icon"></i>--}}
            {{--                                                <p>Projects</p>--}}
            {{--                                            </a>--}}
            {{--                                        </li>--}}
            {{--                                        <li class="nav-item">--}}
            {{--                                            <a href="pages/examples/project-add.html" class="nav-link">--}}
            {{--                                                <i class="far fa-circle nav-icon"></i>--}}
            {{--                                                <p>Project Add</p>--}}
            {{--                                            </a>--}}
            {{--                                        </li>--}}
            {{--                                        <li class="nav-item">--}}
            {{--                                            <a href="pages/examples/project-edit.html" class="nav-link">--}}
            {{--                                                <i class="far fa-circle nav-icon"></i>--}}
            {{--                                                <p>Project Edit</p>--}}
            {{--                                            </a>--}}
            {{--                                        </li>--}}
            {{--                                        <li class="nav-item">--}}
            {{--                                            <a href="pages/examples/project-detail.html" class="nav-link">--}}
            {{--                                                <i class="far fa-circle nav-icon"></i>--}}
            {{--                                                <p>Project Detail</p>--}}
            {{--                                            </a>--}}
            {{--                                        </li>--}}
            {{--                                        <li class="nav-item">--}}
            {{--                                            <a href="pages/examples/contacts.html" class="nav-link">--}}
            {{--                                                <i class="far fa-circle nav-icon"></i>--}}
            {{--                                                <p>Contacts</p>--}}
            {{--                                            </a>--}}
            {{--                                        </li>--}}
            {{--                                        <li class="nav-item">--}}
            {{--                                            <a href="pages/examples/faq.html" class="nav-link">--}}
            {{--                                                <i class="far fa-circle nav-icon"></i>--}}
            {{--                                                <p>FAQ</p>--}}
            {{--                                            </a>--}}
            {{--                                        </li>--}}
            {{--                                        <li class="nav-item">--}}
            {{--                                            <a href="pages/examples/contact-us.html" class="nav-link">--}}
            {{--                                                <i class="far fa-circle nav-icon"></i>--}}
            {{--                                                <p>Contact us</p>--}}
            {{--                                            </a>--}}
            {{--                                        </li>--}}
            {{--                                    </ul>--}}
            {{--                                </li>--}}


        </ul>
    </nav>
    <!-- /.sidebar-menu -->

</aside>