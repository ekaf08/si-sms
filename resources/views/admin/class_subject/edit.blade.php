@extends('layouts.app')
@section('title', 'Edit Subject')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{ route('subject.index') }}">List Subject</a></li>
    <li class="breadcrumb-item active">Edit Subject</li>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header text-white text-bold" style="background-color: #3c8dbc;">
                    <h3 class="card-title">Form Edit Subject</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ route('subject.update', encrypt($getSubjectSingle->id)) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Nama Subject : </label>
                                    <input type="text" class="form-control form-control-border" name="name"
                                        id="name" placeholder="Nama Subject ..." required
                                        value="{{ old('name', $getSubjectSingle->name) }}">
                                    <div class="text-danger">{{ $errors->first('name') }}</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="type">Type Subject : </label>
                                    <select name="type" id="type" class="form-control form-control-border">
                                        <option value="" selected="true" disabled="disabled">-- Pilih Salah Satu --
                                        </option>
                                        <option {{ $getSubjectSingle->status == 'Teori' ? 'selected' : '' }} value="Teori">
                                            Teori</option>
                                        <option {{ $getSubjectSingle->status == 'Praktikum' ? 'selected' : '' }}
                                            value="Praktikum">Praktikum</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="status">Status Subject : </label>
                                        <select name="status" id="status" class="form-control form-control-border">
                                            <option {{ $getSubjectSingle->status == 1 ? 'selected' : '' }} value="1">
                                                Aktif
                                            </option>
                                            <option {{ $getSubjectSingle->status == 0 ? 'selected' : '' }} value="0">
                                                Tidak
                                                Aktif</option>
                                        </select>
                                        <div class="text-danger">{{ $errors->first('status') }}</div>
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
