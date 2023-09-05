@extends('layouts.app')
@section('title', 'List Kelas')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">List Kelas</li>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12" style="text-align: left;">
                    <a href="{{ route('kelas.add') }}" class="btn btn-primary">Tambah Kelas Baru</a>
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
                            <h3 class="card-title">Cari Kelas Berdasarkan ...</h3>
                        </div>

                        <form method="get" action="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="name">Kelas : </label>
                                        <input type="text" class="form-control" value="{{ Request::get('name') }}"
                                            name="name" placeholder="Name ..">
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
                                        <a href="{{ route('kelas.index') }}" class="btn btn-secondary"
                                            style="margin-top: 30px"> <i class="fas fa-trash"></i> Reset</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    @include('_message')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Kelas List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="10%">#</th>
                                        <th>Kelas</th>
                                        <th>Dibuat Oleh</th>
                                        <th>Status</th>
                                        <th width="20%">Tanggal Dibuat</th>
                                        <th width="12%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($getRecord as $value => $item)
                                        <tr>
                                            <td>{{ $value + 1 }}</td>
                                            <td>{{ ucwords($item->name) }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                            <td>
                                                <!--Button Edit-->
                                                <a href="{{ route('admin.edit', encrypt($item->id)) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <!--Button Haous/ Destroy-->
                                                <a href="{{ route('admin.destroy', encrypt($item->id)) }}"
                                                    class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>

                            {{-- <div style="padding: 10px; float: right;">
                                {!! $getRecord->appends('page')->links() !!}
                            </div> --}}
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
