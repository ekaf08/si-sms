@extends('layouts.app')
@section('title', 'Edit Kelas')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{ route('kelas.index') }}">List Kelas</a></li>
    <li class="breadcrumb-item active">Edit Kelas</li>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header text-white text-bold" style="background-color: #3c8dbc;">
                    <h3 class="card-title">Form Edit Kelas</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ route('kelas.update', encrypt($getSingleKelas->id)) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nama Kelas : </label>
                                    <input type="text" class="form-control form-control-border" name="kelas"
                                        id="kelas" placeholder="Nama Kelas ..." required
                                        value="{{ old('kelas', $getSingleKelas->kelas) }}">
                                    <div class="text-danger">{{ $errors->first('kelas') }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status Kelas : </label>
                                    <select name="status" id="status" class="form-control form-control-border">
                                        <option {{ $getSingleKelas->status == 1 ? 'selected' : '' }} value="1">Aktif
                                        </option>
                                        <option {{ $getSingleKelas->status == 0 ? 'selected' : '' }} value="0">Tidak
                                            Aktif</option>
                                    </select>
                                    <div class="text-danger">{{ $errors->first('status') }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        @include('_message')
                    </div>
                    <div class="text-right card-footer mt-2">
                        <button class="btn btn-secondary" type="reset">
                            <i class="fas fa-trash"></i> Reset
                        </button>

                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-save"></i> Simpan
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
