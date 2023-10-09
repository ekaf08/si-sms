@extends('layouts.app')
@section('title', 'Ganti Password')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Ganti Password</li>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header text-white text-bold" style="background-color: #3c8dbc;">
                    <h3 class="card-title">Form Ganti Password</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ route('gantipassword.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password_lama">Password Lama : </label>
                                    <input type="password" class="form-control form-control-border" name="password_lama"
                                        id="password_lama">
                                    <div class="text-danger">{{ $errors->first('password_lama') }}</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password">Password Baru: </label>
                                    <input type="password" class="form-control form-control-border" name="password"
                                        id="password">
                                    <div class="text-danger">{{ $errors->first('password') }}</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="konfirmasi_password">Konfirmasi Password Baru: </label>
                                    <input type="password" class="form-control form-control-border"
                                        name="konfirmasi_password" id="konfirmasi_password">
                                </div>
                            </div>
                            <div class="col-sm-12 text-sm text-left">
                                <div class="form-check text-sm">
                                    <input type="checkbox" class="form-check-input" onclick="cekpass()" id="clik">
                                    <label for="clik">Tampilkan Password</label>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        @include('_message')
                    </div>
                    <div class="text-left card-footer mt-2">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <button class="btn btn-secondary" type="reset">
                            <i class="fas fa-trash"></i> Reset
                        </button>
                    </div>
                </form>

                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    @push('custom_script')
        <script>
            cekpass = () => {
                var x = document.getElementById("password");
                var y = document.getElementById("cpassword");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }

                if (y.type === "password") {
                    y.type = "text";
                } else {
                    y.type = "password";
                }
            }
        </script>
    @endpush
@endsection
