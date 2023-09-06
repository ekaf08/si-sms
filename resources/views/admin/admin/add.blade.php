@extends('layouts.app')
@section('title', 'Tambah Admin')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{ route('admin_list') }}">List Admin</a></li>
    <li class="breadcrumb-item active">Tambah Admin</li>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header text-white text-bold" style="background-color: #3c8dbc;">
                    <h3 class="card-title">Form Input Admin</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ route('admin.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Nama : </label>
                                    <input type="text" class="form-control form-control-border" name="name"
                                        id="name" placeholder="Nama ..." required value="{{ old('name') }}">
                                    <div class="text-danger">{{ $errors->first('name') }}</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Email : </label>
                                    <input type="email" class="form-control form-control-border" name="email"
                                        id="email" placeholder="example@email.com" required value="{{ old('email') }}">
                                    <div class="text-danger">{{ $errors->first('email') }}</div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password">Password : </label>
                                    <input type="password" class="form-control form-control-border" name="password"
                                        id="password" required>
                                    <div class="text-danger">{{ $errors->first('password') }}</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cpassword">Konfirmasi Password : </label>
                                    <input type="password" class="form-control form-control-border" name="cpassword"
                                        id="cpassword" required>
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
