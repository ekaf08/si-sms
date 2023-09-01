@extends('layouts.app')
@section('title', 'Add New Admin')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{ route('admin_list') }}">List Admin</a></li>
    <li class="breadcrumb-item active">Add Admin</li>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nama : </label>
                                    <input type="text" class="form-control form-control-border" name="name"
                                        id="name" placeholder="Nama ..." required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">email : </label>
                                    <input type="email" class="form-control form-control-border" name="email"
                                        id="email" placeholder="example@email.com" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password : </label>
                                    <input type="password" class="form-control form-control-border" name="password"
                                        id="password" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cpassword">Konfirmasi Password : </label>
                                    <input type="password" class="form-control form-control-border" name="cpassword"
                                        id="cpassword" required>
                                </div>
                            </div>
                            <div class="col-sm-4 text-right">

                            </div>
                            <div class="col-sm-4 text-right">

                            </div>
                            <div class="col-sm-4 text-sm text-right">
                                <div class="form-check text-sm">
                                    <input type="checkbox" class="form-check-input" onclick="cekpass()" id="clik">
                                    <label for="clik">Tampilkan Password</label>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="text-right card-footer mt-2">
                        <button class="btn btn-secondary" type="reset">
                            Reset
                        </button>

                        <button class="btn btn-primary" type="submit">
                            Simpan
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
