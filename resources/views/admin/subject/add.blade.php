@extends('layouts.app')
@section('title', 'Tambah Subject')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{ route('subject.index') }}">List Subject</a></li>
    <li class="breadcrumb-item active">Tambah Subject</li>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header text-white text-bold" style="background-color: #3c8dbc;">
                    <h3 class="card-title">Form Input Subject</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ route('subject.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Nama subject : </label>
                                    <input type="text" class="form-control form-control-border" name="name"
                                        id="name" placeholder="Nama subject .." required value="{{ old('name') }}">
                                    <div class="text-danger">{{ $errors->first('name') }}</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="type">Type Subject : </label>
                                    <select name="type" id="type" class="form-control form-control-border">
                                        <option value="" selected="true" disabled="disabled">-- Pilih --
                                        </option>
                                        <option value="Teori">Teori</option>
                                        <option value="Praktikum">Praktikum</option>
                                    </select>
                                    <div class="text-danger">{{ $errors->first('type') }}</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status">Status Subject : </label>
                                    <select name="status" id="status" class="form-control form-control-border">
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
