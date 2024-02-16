<!-- navbar start -->
<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="/dashboard/all"><img src="/img/smk.png" alt="" class="w-10 ml-4"></a>
    @auth
        <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome, {{ auth()->user()->name }}
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/home">Home</a></li>
                <li><a class="dropdown-item" href="/about">About</a></li>
                <li>
                    <form method="post" action="/login/index/out">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    @endauth
</header>

<div class="container-fluid">
    <div class="row">
        <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
            <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">

                <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto" style="height: 100vh; position: relative;">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="/dashboard/index">
                                <i class="bi bi-house-door-fill bi-lg"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="/dashboard/students/all">
                                <i class="bi bi-person-fill"></i>
                                Students
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="/dashboard/majors/all">
                                <i class="bi bi-building-fill"></i>
                                Majors
                            </a>
                        </li>

                    </ul>

                </div>

            </div>
        </div>
  <!-- navbar end -->