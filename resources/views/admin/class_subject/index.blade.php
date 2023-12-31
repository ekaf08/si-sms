@extends('layouts.app')
@section('title', 'List Kategori Kelas')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">List Kategori Kelas</li>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12" style="text-align: left;">
                    <a href="{{ route('subjectclass.add') }}" class="btn btn-primary">Tambah Kategori Kelas Baru</a>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Cari Kategori Kelas Berdasarkan ...</h3>
                        </div>

                        <form method="get" action="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="subject">Nama Kelas : </label>
                                        <input type="text" class="form-control" value="{{ Request::get('kelas') }}"
                                            name="kelas" placeholder="Nama kelas ..">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="subject">Nama Subject : </label>
                                        <input type="text" class="form-control" value="{{ Request::get('subject') }}"
                                            name="subject" placeholder="Nama subject ..">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="date">Tanggal : </label>
                                        <input type="date" class="form-control" value="{{ Request::get('date') }}"
                                            name="date">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <button class="btn btn-primary" type="submit" style="margin-top: 30px">
                                            <i class="fas fa-search"></i> Cari
                                        </button>
                                        <a href="{{ route('subjectclass.index') }}" class="btn btn-secondary"
                                            style="margin-top: 30px"> <i class="fas fa-trash"></i> Reset</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    @include('_message')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Kategori Kelas List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="10%">#</th>
                                        <th>Nama Kelas</th>
                                        <th>Subjek</th>
                                        <th>Dibuat Oleh</th>
                                        <th>Status</th>
                                        <th width="20%">Tanggal Dibuat</th>
                                        <th width="12%">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($getClassSubjectAll as $value => $item)
                                        <tr>
                                            <td>{{ $value + 1 }}</td>
                                            <td>{{ ucwords($item->kelas) }}</td>
                                            <td>{{ ucwords($item->subject_name) }}</td>
                                            <td>{{ ucwords($item->created_by_name) }}</td>
                                            <td>{{ $item->status == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                                            <td>{{ $item->created_at === null ? '-' : $item->created_at->format('d-m-Y') }}
                                            </td>
                                            <td>
                                                <!--Button Edit-->
                                                <a href="{{ route('subjectclass.edit', encrypt($item->id)) }}"
                                                    class="btn btn-primary" title="Edit Subjek {{ $item->subject_name }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <!--Button Edit Single-->
                                                <a href="{{ route('subjectclass.edit_single', encrypt($item->id)) }}"
                                                    class="btn btn-success" title="Edit Kelas {{ $item->kelas }}"> <i
                                                        class="fas fa-edit"></i>
                                                </a>
                                                <!--Button Haous/ Destroy-->
                                                <a href="{{ route('subjectclass.destroy', encrypt($item->id)) }}"
                                                    class="btn btn-danger"> <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div style="padding: 10px; float: right;">
                                {!! $getClassSubjectAll->appends('page')->links() !!}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
