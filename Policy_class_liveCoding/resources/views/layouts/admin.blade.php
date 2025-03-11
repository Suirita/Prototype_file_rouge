<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite(['resources/css/admin.css', 'resources/js/admin.js'])
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            {{-- Logout --}}

            <ul class="navbar-nav ms-auto">
                <!-- User Profile Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                       {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                </button>
                            </form>

                        </li>
                    </ul>
                </li>
            </ul>


        </nav>

        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="/" class="brand-link">
                <img src="https://adminlte.io/themes/v3/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Blog</span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('public.public.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Accueil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link">
                                <i class="nav-icon fas fa-chart-bar"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    PkgsBlog
                                    <i class="right fas fa-angle-left"></i> <!-- Flèche pour sous-menu -->
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('article.index') }}" class="nav-link">
                                        <i class="fas fa-newspaper nav-icon"></i>
                                        <p>Articles</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('category.index') }}" class="nav-link">
                                        <i class="fas fa-layer-group nav-icon"></i>
                                        <p>Categories</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('tag.index') }}" class="nav-link">
                                        <i class="fas fa-tags nav-icon"></i>
                                        <p>Tags</p>
                                    </a>
                                </li>
                                <li class="nav-item">

                                    <a href="{{ route('comment.index') }}" class="nav-link">
                                        <i class="fas fa-comment nav-icon"></i>
                                        <p>Commentaires</p>

                                    <a href="{{ route('user.index') }}" class="nav-link">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Users</p>

                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        <!-- Footer -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                <b>Version 1.0</b> 
            </div>
            <strong>Copyright &copy; 2024 <a href="{{ Route('public.public.index') }}"><b>Soli-</b>Blogs</a>.</strong> All rights reserved.
        </footer>
    </div>

    <!-- Scripts -->
    @vite(['resources/js/admin.js'])
</body>
</html>
