@extends('layouts.app')
@section('title', 'Add New Admin')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{ route('admin_list') }}">List Admin</a></li>
    <li class="breadcrumb-item active">Edit Admin</li>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header text-white text-bold" style="background-color: #3c8dbc;">
                    <h3 class="card-title">Form Edit Admin</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ route('admin.update', encrypt($getRecord->id)) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nama : </label>
                                    <input type="text" class="form-control form-control-border" name="name"
                                        id="name" placeholder="Nama ..." required
                                        value="{{ old('name', $getRecord->name) }}">
                                    <div class="text-danger">{{ $errors->first('name') }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">email : </label>
                                    <input type="email" class="form-control form-control-border" name="email"
                                        id="email" placeholder="example@email.com" required
                                        value="{{ old('email', $getRecord->email) }}">
                                    <div class="text-danger">{{ $errors->first('email') }}</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password : </label>
                                    <input type="password" class="form-control form-control-border" name="password"
                                        id="password" readonly>
                                    <div class="text-danger">{{ $errors->first('password') }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cpassword">Konfirmasi Password : </label>
                                    <input type="password" class="form-control form-control-border" name="cpassword"
                                        id="cpassword" readonly>
                                </div>
                            </div>

                            <div class="col-md-12 text-sm text-left ml-2">
                                <div class="form-group row">
                                    <div class="form-check text-sm">
                                        <div id="ubah_password">
                                            <input type="checkbox" class="form-check-input" id="gantipass">
                                            <label for="gantipass">Ganti Password</label>
                                        </div>
                                    </div>
                                    <div class="form-check text-sm ml-2">
                                        <div id="tampil_password" hidden>
                                            <input type="checkbox" class="form-check-input" onclick="cekpass()"
                                                id="clik">
                                            <label for="clik">Tampilkan Password</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        @include('_message')
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
            // menampilkan password dan konfirmasi password
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
            //End menampilkan password dan konfirmasi password

            // untuk menghilangkan readonly password
            $(document).ready(function() {
                $('#gantipass').change(function() {
                    console.log('disini');
                    if (this.checked) {
                        $("#tampil_password").removeAttr("hidden");
                        $('#password').removeAttr('readonly');
                        $('#cpassword').removeAttr('readonly');
                    } else {
                        $("#tampil_password").attr("hidden", true);
                        $("#password").attr("readonly", true);
                        $("#cpassword").attr("readonly", true);
                    }
                })
            });
            //End untuk menghilangkan readonly password
        </script>
    @endpush
@endsection
