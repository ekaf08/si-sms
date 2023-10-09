@extends('layouts.app')
@section('title', 'Tambah Kategori Kelas')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{ route('subject.index') }}">List Kategori Kelas</a></li>
    <li class="breadcrumb-item active">Tambah Kategori Kelas</li>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header text-white text-bold" style="background-color: #3c8dbc;">
                    <h3 class="card-title">Form Input Kategori Kelas</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ route('subjectclass.store') }}" method="POST">
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
                                    @foreach ($getSubject as $subject)
                                        <div>
                                            <label for="{{ $subject->name }}" style="font-weight: normal;" class="ml-2">
                                                <input type="checkbox" name="subject_id[]" value=" {{ $subject->id }}"
                                                    id="{{ $subject->name }}">
                                                {{ $subject->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                    <div class="text-danger">{{ $errors->first('subject_id') }}</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status">Status Kategori Kelas : </label>
                                    <select name="status" id="status" class="form-control form-control-border">
                                        <option value="" selected="true" disabled>-- Pilih --</option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
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
        <script></script>
    @endpush
@endsection
