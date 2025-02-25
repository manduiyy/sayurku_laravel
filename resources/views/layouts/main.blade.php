<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sayurku - Sedia Sayuran Segar Setiap Hari</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css?load_time='.date('Y-m-d H:i:s')) }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    @if($current_page != 'login')
    <header class="header">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="col-lg-2">
                    <div class="logo">
                        <img src="{{ asset('images/logo.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-10">
                   <div class="d-flex justify-content-end">
                        <form action="" method="get" class="search">
                            <input type="text" name="search" id="search" placeholder="Cari di sayurku">
                        </form>
                   </div>  
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navigation">
            <div class="container-xxl">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
             
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="">Beranda</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="">Tentang Kami</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="">Produk Kami</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="">Blog</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="">Pesan Sayuran</a>
                  </li>

                  @if(session('isLoggedIn'))
                    <li class="nav-item dropdown">
                      <a href="" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expand="false">
                       {{ session('user_name') }}
                      </a>
                      <form id="logout-form" action="{{ route('logout')  }}" method="post" class="d-none">
                        @csrf
                      </form>
                      <ul class="dropdown-menu">
                        <li>
                          <a href="javascript:void(0); " class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit(); ">
                            Logout
                          </a>
                        </li>
                      </ul>
                    </li>
                  @endif
                </ul>
              </div>
            </div>
        </nav>
    </header>
    @endif

    @yield('container')
    @if($current_page != 'login')
    <footer class="footer">
        <div class="container-xxl">
            <div class="row vertically-center">
                <div class="col-2">
                    <div class="logo">
                        <img src="{{ asset('images/logo.png') }}" alt="">
                    </div>
                </div>
                <div class="col-10">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate eos ipsa ut, ipsam sed vel quibusdam beatae, iste deserunt non dicta voluptate repellendus deleniti omnis nam necessitatibus assumenda! Dolorum dignissimos illo, libero enim recusandae, maxime, quis deleniti perferendis eius natus possimus reiciendis laborum ipsum ab! Quas eius aspernatur a commodi.
                    </p>
                </div>
            </div>
            <div class="copy-right text-center">
                &copy; 2024 Sayurku
            </div>
        </div>
    </footer>
    @endif
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    @if($javascript_file)
    <script src="{{ asset('js/'.$javascript_file) }}"></script>
    @endif
  </body>
</html>