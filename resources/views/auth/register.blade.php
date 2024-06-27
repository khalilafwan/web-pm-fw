<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PMElectric | Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/pm_favico.png') }}">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Form Register</h1>
                    <p class="mb-4">Mohon Isi Data pada Form di Bawah ini untuk Membuat Akun.</p>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-4 py-3">
                                    <div class="card-body">
                                        <label class="control-label col-sm-4">Username</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" placeholder="Masukkan Username"
                                                name="username" value="{{ old('username') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-4 py-3">
                                    <div class="card-body">
                                        <label class="control-label col-sm-4">Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" placeholder="Masukkan Password"
                                                name="password" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-4 py-3">
                                    <div class="card-body">
                                        <label class="control-label col-sm-4">Confirm Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" placeholder="Confirm Password"
                                                name="password_confirmation" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-4 py-3">
                                    <div class="card-body">
                                        <label class="control-label col-sm-4">Nama</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" placeholder="Masukkan Nama"
                                                name="nama" value="{{ old('nama') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-4 py-3">
                                    <div class="card-body">
                                        <label class="control-label col-sm-4" for="role">Role</label>
                                        <div class="col-sm-8">
                                            <select name="role" id="role" class="form-control" required>
                                                <option value="admin" {{ old('role')=='admin' ? 'selected' : '' }}>Admin
                                                </option>
                                                <option value="design" {{ old('role')=='design' ? 'selected' : '' }}>
                                                    Design</option>
                                                <option value="nesting" {{ old('role')=='nesting' ? 'selected' : '' }}>
                                                    Nesting</option>
                                                <option value="program" {{ old('role')=='program' ? 'selected' : '' }}>
                                                    Program</option>
                                                <option value="checker" {{ old('role')=='checker' ? 'selected' : '' }}>
                                                    Checker</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('partials.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('partials.scripts')

    <!-- Page level plugins -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(Session::has('alert'))
    <script>
        Swal.fire({
            icon: '{{ Session::get('alert')['type'] }}',
            title: '{{ Session::get('alert')['title'] }}',
            text: '{{ Session::get('alert')['message'] }}',
            confirmButtonText: 'OK'
        }).then(function() {
                    // Redirect to tables-monitoring.php after the alert is closed
                    window.location.href ='{{ route('login') }}';
        });
    </script>
    @endif
</body>

</html>