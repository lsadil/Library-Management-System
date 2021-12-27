<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('../img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="https://i.goopics.net/1vkrvw.png">
    <title>
        sing in
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>
    <!-- Nucleo Icons -->
    <link href="{{asset('css/nucleo-icons.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/nucleo-svg.css')}}" rel="stylesheet"/>
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{asset('css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('css/soft-ui-dashboard.css?v=1.0.3')}}" rel="stylesheet"/>
</head>

<body class="">
<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <!-- Navbar -->
            <nav
                class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                <div class="container-fluid">
                    <div class="sidenav-header">
                        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                           aria-hidden="true" id="iconSidenav"></i>
                        <a class="navbar-brand m-0"
                           href="https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html" target="_blank">
                            <img src="{{asset('img/logos/logoLibrary.png')}}" class="navbar-brand-img h-100"
                                 alt="mainn_logo">
                            <span class="ms-1 font-weight-bold">Library</span>
                        </a>
                    </div>
                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                            aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center me-2 active" aria-current="page"
                                   href="../resources/view/sign-in.html">
                                    <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                                    Menu Visiteur
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="../resources/view/sign-in.html">
                                    <i class="fa fa-user opacity-6 text-dark me-1"></i>
                                    Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="../resources/view/sign-in.html">
                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                    Sign In
                  </a>
                </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
</div>
<main class="main-content  mt-0">
    <section>
        <div class=container>
            <div class="page-header min-vh-75">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-8">
                                <img src="{{asset('img/illustrations/books.png')}}" class="navbar-brand-img h-100"
                                     alt="logo book">

                                <p class="mb-0">Enter your email and password to sign in</p>
                            </div>
                            <div class="card-body">
                                <form role="form">
                                    <label>Email</label>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" placeholder="Email" aria-label="Email"
                                               aria-describedby="email-addon">
                                    </div>
                                    <label>Password</label>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                                        <label class="form-check-label" for="rememberMe">Remember me</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </main>

<!--   Core JS Files   -->
  <script src="{{asset('js/core/popper.min.js')}}"></script>
  <script src="{{asset('js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('js/soft-ui-dashboard.min.js?v=1.0.3')}}"></script>
</body>

</html>
