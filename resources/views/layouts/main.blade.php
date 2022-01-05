
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>

    <!-- General CSS Files -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">
    {{-- CSS Libraries --}}
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}} ">
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/select2-bootstrap4.css') }}">
    {{-- Template CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                        <h1 id="jam" style="background-color:black; color:white;"></h1>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        {{-- <img src="{{ asset('assets/img/image/'.$post->image) }}" class="img-thumbnail" alt="image" style="width: 150px"> --}}
                        <img alt="image" src="{!! asset('/storage/images/'.Auth::user()->image) !!}" class="rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title"></div>
                            <a href="{{ route('user-profile',Auth::user()->id) }}" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" style="cursor: pointer" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                            class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i>Logout
                        </a>

                        <form action="{{ route('logout') }}" method="post" id="logout-form" style="display: none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="main-sidebar sidebar-style-2">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="index.html">Task QL</a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="index.html">Task</a>
                </div>
                <ul class="sidebar-menu">
                    <li class="menu-header">Main Menu</li>
                    <li class="{{ setActive('dashboard') }}">
                        <a href="{{ route('dashboard') }}">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    @can('posts.index')
                    <li class="{{ setActive('post') }}">
                        <a href="{{ route('post.index') }}" class="nav-link">
                            <i class="fas fa-book-open"></i>
                            <span>Posts</span>
                        </a>
                    </li>
                    @endcan

                    @can('categories.index')
                    <li class="{{ setActive('category') }}">
                        <a href="{{ route('category.index') }}" class="nav-link">
                            <i class="fas fa-tag"></i>
                            <span>Kategori</span>
                        </a>
                    </li>
                    @endcan

                    <li
                    class="dropdown {{ setActive('role') . setActive('permission') . setActive('user') }}">
                    @if (auth()->user()->can('roles.index') ||
                    auth()->user()->can('permission.index') ||
                    auth()->user()->can('users.index'))
                    <a href="#" class="nav-link has-dropdown">
                        <i class="fas fa-users"></i>
                        <span>Users Management</span>
                    </a>
                    @endif

                    <ul class="dropdown-menu">
                        @can('roles.index')
                        <li class="{{ setActive('role') }}">
                            <a href="{{ route('role.index') }}" class="nav-link">
                                <i class="fas fa-unlock"></i>
                                <span>Roles</span>
                            </a>
                        </li>
                        @endcan

                        @can('permissions.index')
                        <li class="{{ setActive('permission') }}">
                            <a href="{{ route('permission.index') }}" class="nav-link">
                                <i class="fas fa-key"></i>
                                <span>Permissions</span>
                            </a>
                        </li>
                        @endcan

                        @can('users.index')
                        <li class="{{ setActive('user') }}">
                            <a href="{{ route('user.index') }}" class="nav-link">
                                <i class="fas fa-users"></i>
                                <span>Users</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                <li class="menu-header">Pengaturan</li>
                <li class="dropdown {{ setActive('settings') }}">
                    <a href="#" class="nav-link has-dropdown">
                        <i class="far fa-user"></i><span>Profil Pengguna</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="{{ setActive('change-profile') }}">
                            <a href="{{ route('user-profile', auth()->user()->id) }}">Ubah Profil</a></li>
                            <li class="{{ setActive('change-password') }}">
                                <a href="{{ route('user-password', auth()->user()->id) }}">Ganti Password</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </aside>
        </div>
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>@yield('title')</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">@yield('title')</a></div>
                    </div>
                </div>
                @yield('content')
            </section>
        </div>
        <footer class="main-footer">
            <div class="footer-left">
                Copyright &copy; {{ date('Y') }} <div class="bullet"></div> Development By <a href="https://nauval.in/">Byu</a>
            </div>
        </footer>
    </div>
</div>

{{-- General JS Scripts --}}
<script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
<script src="{{ asset('assets/modules/popper.js') }}"></script>
<script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/modules/nicescroll/dist/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('assets/modules/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/stisla.js') }}"></script>
<script src="{{ asset('assets/modules/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
{{-- Template JS File --}}
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>


<!-- Page Specific JS File -->
@yield('script')


<script>
    $(document).ready(function (){
        setInterval(function() {
            var waktu = moment();
            $('#jam').html(waktu.format("MMMM DD YYYY HH:mm:ss"))
        },500);
    });
</script>
</body>
</html>
