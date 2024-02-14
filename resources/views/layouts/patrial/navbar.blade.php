<header class="bg-white shadow  flex items-center z-9999 w-5/6 h-16 m-auto">
  <div class="container">
    <div class="flex items-center relative justify-between">
      <div>
        <a href="#"><img src="/img/smk.png" alt="" class="w-10 ml-4"></a>
      </div>
      <nav class=" m-auto ">
        <ul class="flex gap-9">
          <li class="group">
            <a class="nav-link active" aria-current="page" href="/home">Home</a>
          </li>

          <li class="group">
            <a class="nav-link" href="/about">About</a>
          </li>

          <li class="group">
            <a class="nav-link" href="/student/all">Student</a>
          </li>

          <li class="group">
            <a class="nav-link" href="/kelas/all">Major</a>
          </li>

          <li class="group">
            <a class="nav-link" href="/extracurricular">Extracurricular</a>
          </li>
        </ul>
      </nav>
      @auth
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Welcome, {{ auth()->user()->name }}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <form method="post" action="/login/index/out">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else<form class="d-flex gap-2" role="search">
                <a class="btn btn-success fw-semibold" href="/login/register">Register</a>
                <a class="btn btn-success fw-semibold" href="/login/index">Login</a>
            </form>
            @endauth
      <!-- <div class="d-flex mr-5">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="/login/index"><i class="fa-solid fa-user-plus"></i></a>
          </li>
        </ul>
      </div> -->
    </div>
  </div>
</header>