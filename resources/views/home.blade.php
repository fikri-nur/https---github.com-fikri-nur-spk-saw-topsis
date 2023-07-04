<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Page</title>


    <!-- Custom fonts for this template-->
    <link href="{{ asset('backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


    <!-- Custom styles for this template-->
    <link href="{{ asset('backend/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/vendor/bootstrap-fileinput/css/fileinput.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendor/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/bootstrap-datepicker3.min.css') }}">
    @stack('style-alt')
    <link href="{{ asset('frontend/assets/img/logo/logo.png') }}" rel='shortcut icon'>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('partials.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
                                <img class="img-profile rounded-circle" src="{{ asset('backend/img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <!-- <a class="dropdown-item" href="/">
                                    <i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Home
                                </a> -->

                                <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="post">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                @if(session()->has('message'))
                <div class="alert alert-{{ session()->get('alert-type') }} alert-dismissible fade show" role="alert" id="alert-message">
                    {{ session()->get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="card card-hover">
                                <div class="box bg-primary text-center">
                                    <div class="d-flex align-items-center justify-content-center p-3">
                                        <h1 class="font-light text-white"><i class="mdi mdi-target"></i></h1>
                                        <div class="ml-5">
                                            <h6 class="text-white">Alternatif</h6>
                                            <h4 class="text-white">{{ $alternativeCount }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-12 col-lg-6">
                            <div class="card card-hover">
                                <div class="box bg-secondary text-center">
                                    <div class="d-flex align-items-center justify-content-center p-3">
                                        <h1 class="font-light text-white"><i class="mdi mdi-format-list-bulleted"></i></h1>
                                        <div class="ml-5">
                                            <h6 class="text-white">Kriteria</h6>
                                            <h4 class="text-white">{{ $criteriaCount }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive mt-3">
                                        <table id="keterangan_c1" class="table table-striped table-bordered">
                                            <thead class="text-center">
                                                <tr>
                                                    <th colspan="3">C1 Pendidikan (Cost)</th>
                                                </tr>
                                                <tr>
                                                    <td>Nilai Kriteria</td>
                                                    <td>Skor</td>
                                                    <td>Keterangan</td>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <tr>
                                                    <td>X <= 0,5</td>
                                                    <td>1</td>
                                                    <td>Sangat Rendah</td>
                                                </tr>
                                                <tr>
                                                    <td>0,5 < X <=1</td>
                                                    <td>2</td>
                                                    <td>Rendah</td>
                                                </tr>
                                                <tr>
                                                    <td>1 < X <=1,5</td>
                                                    <td>3</td>
                                                    <td>Cukup Rendah</td>
                                                </tr>
                                                <tr>
                                                    <td>1,5 < X <=2</td>
                                                    <td>4</td>
                                                    <td>Kurang Baik</td>
                                                </tr>
                                                <tr>
                                                    <td>2 < X <=2,5</td>
                                                    <td>5</td>
                                                    <td>Baik</td>
                                                </tr>
                                                <tr>
                                                    <td>2,5 < X</td>
                                                    <td>6</td>
                                                    <td>Sangat Baik</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive mt-3">
                                        <table id="keterangan_c1" class="table table-striped table-bordered">
                                            <thead class="text-center">
                                                <tr>
                                                    <th colspan="3">C2 Pekerjaan (Cost)</th>
                                                </tr>
                                                <tr>
                                                    <td>Nilai Kriteria</td>
                                                    <td>Skor</td>
                                                    <td>Keterangan</td>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <tr>
                                                    <td>X <= 0,5</td>
                                                    <td>1</td>
                                                    <td>Sangat Tidak Layak</td>
                                                </tr>
                                                <tr>
                                                    <td>0,5 < X <=1</td>
                                                    <td>2</td>
                                                    <td>Tidak Layak</td>
                                                </tr>
                                                <tr>
                                                    <td>1 < X <=1,5</td>
                                                    <td>3</td>
                                                    <td>Cukup Layak</td>
                                                </tr>
                                                <tr>
                                                    <td>1,5 < X <=2</td>
                                                    <td>4</td>
                                                    <td>Kurang Layak</td>
                                                </tr>
                                                <tr>
                                                    <td>2 < X <=2,5</td>
                                                    <td>5</td>
                                                    <td>Layak</td>
                                                </tr>
                                                <tr>
                                                    <td>2,5 < X</td>
                                                    <td>6</td>
                                                    <td>Sangat Layak</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive mt-3">
                                        <table id="keterangan_c1" class="table table-striped table-bordered">
                                            <thead class="text-center">
                                                <tr>
                                                    <th colspan="3">C3 Penghasilan (Cost)</th>
                                                </tr>
                                                <tr>
                                                    <td>Nilai Kriteria</td>
                                                    <td>Skor</td>
                                                    <td>Keterangan</td>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <tr>
                                                    <td>X <= 0,5</td>
                                                    <td>1</td>
                                                    <td>Sangat Rendah</td>
                                                </tr>
                                                <tr>
                                                    <td>0,5 < X <=1</td>
                                                    <td>2</td>
                                                    <td>Rendah</td>
                                                </tr>
                                                <tr>
                                                    <td>1 < X <=1,5</td>
                                                    <td>3</td>
                                                    <td>Cukup Rendah</td>
                                                </tr>
                                                <tr>
                                                    <td>1,5 < X <=2</td>
                                                    <td>4</td>
                                                    <td>Kurang Baik</td>
                                                </tr>
                                                <tr>
                                                    <td>2 < X <=2,5</td>
                                                    <td>5</td>
                                                    <td>Baik</td>
                                                </tr>
                                                <tr>
                                                    <td>2,5 < X</td>
                                                    <td>6</td>
                                                    <td>Sangat Baik</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive mt-3">
                                        <table id="keterangan_c1" class="table table-striped table-bordered">
                                            <thead class="text-center">
                                                <tr>
                                                    <th colspan="3">C4 Status Perkawinan (Benefit)</th>
                                                </tr>
                                                <tr>
                                                    <td>Nilai Kriteria</td>
                                                    <td>Skor</td>
                                                    <td>Keterangan</td>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <tr>
                                                    <td>1</td>
                                                    <td>2</td>
                                                    <td>Menikah</td>
                                                </tr>
                                                <tr>
                                                    <td>0</td>
                                                    <td>1</td>
                                                    <td>Lajang</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive mt-3">
                                        <table id="keterangan_c1" class="table table-striped table-bordered">
                                            <thead class="text-center">
                                                <tr>
                                                    <th colspan="3">C5 Umur (Benefit)</th>
                                                </tr>
                                                <tr>
                                                    <td>Nilai Kriteria</td>
                                                    <td>Skor</td>
                                                    <td>Keterangan</td>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <tr>
                                                    <td>2,5 < X</td>
                                                    <td>6</td>
                                                    <td>Sangat Tua</td>
                                                </tr>
                                                <tr>
                                                    <td>2 < X <=2,5</td>
                                                    <td>5</td>
                                                    <td>Tua</td>
                                                </tr>
                                                <tr>
                                                    <td>1,5 < X <=2</td>
                                                    <td>4</td>
                                                    <td>Cukup Tua</td>
                                                </tr>
                                                <tr>
                                                    <td>1 < X <=1,5</td>
                                                    <td>3</td>
                                                    <td>Cukup Muda</td>
                                                </tr>
                                                <tr>
                                                    <td>0,5 < X <=1</td>
                                                    <td>2</td>
                                                    <td>Muda</td>
                                                </tr>
                                                <tr>
                                                    <td>X <= 0,5</td>
                                                    <td>1</td>
                                                    <td>Sangat Muda</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive mt-3">
                                        <table id="keterangan_c1" class="table table-striped table-bordered">
                                            <thead class="text-center">
                                                <tr>
                                                    <th colspan="3">C6 Tempat Tinggal (Benefit)</th>
                                                </tr>
                                                <tr>
                                                    <td>Nilai Kriteria</td>
                                                    <td>Skor</td>
                                                    <td>Keterangan</td>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <tr>
                                                    <td>0</td>
                                                    <td>2</td>
                                                    <td>Layak</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>1</td>
                                                    <td>Tidak Layak</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive mt-3">
                                        <table id="keterangan_c1" class="table table-striped table-bordered">
                                            <thead class="text-center">
                                                <tr>
                                                    <th colspan="3">C7 Kesehatan (Benefit)</th>
                                                </tr>
                                                <tr>
                                                    <td>Nilai Kriteria</td>
                                                    <td>Skor</td>
                                                    <td>Keterangan</td>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <tr>
                                                    <td>0</td>
                                                    <td>2</td>
                                                    <td>Sehat</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>1</td>
                                                    <td>Tidak Sehat</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive mt-3">
                                        <table id="keterangan_c1" class="table table-striped table-bordered">
                                            <thead class="text-center">
                                                <tr>
                                                    <th colspan="3">C8 Jumlah Anak (Benefit)</th>
                                                </tr>
                                                <tr>
                                                    <td>Nilai Kriteria</td>
                                                    <td>Skor</td>
                                                    <td>Keterangan</td>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <tr>
                                                    <td>2,5 < X</td>
                                                    <td>6</td>
                                                    <td>Sangat Banyak</td>
                                                </tr>
                                                <tr>
                                                    <td>2 < X <=2,5</td>
                                                    <td>5</td>
                                                    <td>Banyak</td>
                                                </tr>
                                                <tr>
                                                    <td>1,5 < X <=2</td>
                                                    <td>4</td>
                                                    <td>Kurang Banyak</td>
                                                </tr>
                                                <tr>
                                                    <td>1 < X <=1,5</td>
                                                    <td>3</td>
                                                    <td>Cukup Sedikit</td>
                                                </tr>
                                                <tr>
                                                    <td>0,5 < X <=1</td>
                                                    <td>2</td>
                                                    <td>Sedikit</td>
                                                </tr>
                                                <tr>
                                                    <td>X <= 0,5</td>
                                                    <td>1</td>
                                                    <td>Sangat Sedikit</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                @yield('content')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SPK</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <form action="" method="POST">
                        @csrf
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('backend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('backend/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('backend/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- file input -->
    <!-- file input -->
    <script src="{{ asset('backend/vendor/bootstrap-fileinput/js/plugins/piexif.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/bootstrap-fileinput/js/plugins/sortable.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/bootstrap-fileinput/themes/fas/theme.min.js') }}"></script>
    <!-- summernote -->
    <script src="{{ asset('backend/vendor/summernote/summernote-bs4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <!-- <script src="{{ asset('backend/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('backend/js/demo/chart-pie-demo.js') }}"></script> -->
    @stack('script-alt')

</body>

</html>