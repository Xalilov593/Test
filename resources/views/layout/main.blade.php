<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
            <div class="position-sticky pt-3">
               <a href="{{route('dashboard')}}" class="nav-link"> <h4 class="text-white text-center my-3">Dashboard</h4></a>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('projects.index')}}">Loyihalar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('users.index')}}">Foydalanuvchilar</a>
                    </li>
                    @if(auth()->user()->hasRole('Super-admin'))
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('roles.index')}}">Rollar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('permissions.index')}}">Ruxsatlar</a>
                    </li>
                    @endif
                    <li class="nav-item mt-3 mb-3">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger w-100">Chiqish</button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
