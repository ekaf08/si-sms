@extends('layouts.app')
@section('title', 'Edit Kategori Kelas')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{ route('subject.index') }}">List Kategori Kelas</a></li>
    <li class="breadcrumb-item active">Edit Kategori Kelas</li>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header text-white text-bold" style="background-color: #3c8dbc;">
                    <h3 class="card-title">Form Edit Kategori Kelas</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ route('subjectclass.update', encrypt($getClassSubjectSingle->id)) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="class_id">Nama Kelas : </label>
                                    <select name="class_id" id="class_id" class="form-control form-control-border">
                                        <option value="" selected="true" disabled="disabled">-- Pilih Salah Satu --
                                        </option>
                                        @foreach ($getClass as $kelas)
                                            <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
                                        @endforeach
                                    </select>
                                    <div class="text-danger">{{ $errors->first('class_id') }}</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="subject_id">Nama Subject : </label>
                                    <select name="subject_id" id="subject_id" class="form-control form-control-border">
                                        <option value="" selected="true" disabled="disabled">-- Pilih Salah Satu --
                                        </option>
                                        @foreach ($getSubject as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="text-danger">{{ $errors->first('subject_id') }}</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status">Status Kategori Kelas : </label>
                                    <select name="status" id="status" class="form-control form-control-border">
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                    <div class="text-danger">{{ $errors->first('status') }}</div>
                                </div>
                            </div>
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
