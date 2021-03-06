{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" />
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('css')

    <title>Halaman Admin</title>
</head>

<body>
    <!-- Navigation bar -->
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin-dashboard.php">
                <img src="{{ URL::asset('assets/img/logo-sistem.png') }}" alt="" height="97"
                    class="d-inline-block align-text-top" />
            </a>

            <text class="nav-item dropdown">
                <a class="navbar-brand fs-6 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"> Halo, ADMIN! </a>
                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                    <li><a class="dropdown-item" href="daftar-akun-admin.php">Buat Akun</a></li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <li style="cursor: pointer" class="dropdown-item"
                            onclick="event.preventDefault(); this.closest('form').submit();">Keluar</li>
                    </form>
                </ul>
            </text>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto px-0">
                <div id="sidebar" class="collapse collapse-horizontal show border-end">
                    <div id="sidebar-nav" class="list-group border-0 rounded-0 text-sm-start min-vh-100">
                        <div class="d-flex flex-column flex-shrink-0 p-2 bg-light" style="width: 240px">
                            <ul class="nav nav-pills flex-column mb-auto">
                                <li class="nav-item">
                                    <a href="/dashboard"
                                        class="nav-link {{ Request::is('dashboard') ? 'active' : 'text-dark' }}"
                                        aria-current="page">
                                        <svg class="bi me-2" width="16" height="16">
                                            <use xlink:href="#dashboard" />
                                        </svg>
                                        Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('data-pelamar') }}"
                                        class="nav-link link-dark {{ Request::is('data-pelamar') ? 'active' : 'text-dark' }}">
                                        <svg class="bi me-2" width="16" height="16">
                                            <use xlink:href="admin-data-pelamar.php" />
                                        </svg>
                                        Data Pelamar
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#"
                                        class="nav-link link-dark dropdown-toggle {{ Request::is('input-tes-tertulis') || Request::is('input-tes-wawancara') || Request::is('input-tes-praktik')  ? 'active' : 'text-dark' }}"
                                        id="adminDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false" aria-current="page">
                                        <svg class="bi me-2" width="16" height="16">
                                            <use xlink:href="#" />
                                        </svg>
                                        Input Nilai
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-light dropdown-menu-end"
                                        aria-labelledby="adminDropdownMenuLink">
                                        <li><a class="dropdown-item {{ Request::is('input-tes-tertulis') ? 'active' : 'text-dark' }}"
                                                href="{{ route('input-tes-tertulis') }}">Nilai Ujian
                                                Tertulis</a></li>
                                        <li><a class="dropdown-item {{ Request::is('input-tes-wawancara') ? 'active' : 'text-dark' }}"
                                                href="{{ route('input-tes-wawancara') }}">Nilai
                                                Wawancara</a></li>
                                        <li><a class="dropdown-item {{ Request::is('input-tes-praktik')  ? 'active' : 'text-dark' }}"
                                                href="{{ route('input-tes-praktik') }}">Nilai Praktek</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('cetak-laporan') }}"
                                        class="nav-link link-dark {{ Request::is('cetak-laporan')  ? 'active' : 'text-dark' }}">
                                        <svg class="bi me-2" width="16" height="16">
                                            <use xlink:href="admin-cetak-laporan.php" />
                                        </svg>
                                        Cetak Laporan
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#"
                                        class="nav-link link-dark dropdown-toggle {{ Request::is('admin-schedule') || Request::is('input-nilai-min')  || Request::is('update-kuota-posisi') ? 'active' : 'text-dark' }}"
                                        id="adminDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false" aria-current="page">
                                        <svg class="bi me-2" width="16" height="16">
                                            <use xlink:href="#" />
                                        </svg>
                                        Pengaturan
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-light dropdown-menu-end"
                                        aria-labelledby="adminDropdownMenuLink">
                                        <li><a class="dropdown-item" href="{{ route('logs') }}">Log Activity</a></li>
                                        <li><a class="dropdown-item {{ Request::is('input-nilai-min') ? 'active' : 'text-dark' }}"
                                                href="{{ route('input-nilai-minimal') }}">Input Nilai
                                                Minimal</a></li>
                                        <li><a class="dropdown-item {{ Request::is('admin-schedule') ? 'active' : 'text-dark' }}"
                                                href="{{ route('admin-timeline') }}">Update Jadwal</a></li>
                                        <li><a class="dropdown-item" href="{{ route('update-kuota-posisi') }}">Update
                                                Jumlah
                                                Posisi</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            @yield('content')
            @include('sweetalert::alert')
        </div>
    </div>

    </br></br></br></br>

    <!-- Footer -->
    <footer class="text-lg-start text-white" style="background-color: #929fba">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Links -->
            <section class="">
                <!--Grid row-->
                <div class="row">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-weight-bold">PUSYANKESWANNAK</h5>
                        <p>Jl. Raya Bambu Apus Cipayung</br>
                            Jakarta Timur</br>
                            Telp. 021 8455748</br>
                            Fax. 8455753</br>
                            Email : puspelkeswan1@gmail.com</p>
                    </div>
                    <!-- Grid column -->

                    <hr class="w-100 clearfix d-md-none" />

                    <!-- Grid column -->
                    <hr class="w-100 clearfix d-md-none" />

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-weight-bold">Link Terkait</h5>
                        <p> <a class="text-white" href="https://jakarta.go.id/">Pemerintah Provinsi DKI Jakarta</a></p>
                        <p> <a class="text-white" href="https://www.pertanian.go.id/">Kementerian Pertanian</a></p>
                        <p> <a class="text-white" href="https://dkpkp.jakarta.go.id/">Dinas Ketahanan Pangan Kelautan
                                dan Pertanian</a></p> </br>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-weight-bold">Follow us</h5>

                        <!-- Facebook -->
                        <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="#!"
                            role="button"><i class="fa fa-facebook-f"></i></a>

                        <!-- Youtube -->
                        <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39"
                            href="https://www.youtube.com/channel/UC2Ipz8jxMVKEvffY3aH7TYg" role="button"><i
                                class="fa fa-youtube"></i></a>

                        <!-- Instagram -->
                        <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac"
                            href="https://www.instagram.com/pusyankeswannak.jakarta/" role="button"><i
                                class="fa fa-instagram"></i></a>
                    </div>
                </div>
                <!--Grid row-->
            </section>
            <!-- Section: Links -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            ?? 2021 Hak Cipta:
            <a class="text-white" href="https://pusyankeswanak.jakarta.go.id/">PUSYANKESWANNAK</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    @yield('script')
</body>

</html>