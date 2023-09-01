@extends('layouts.app')
@section('title', 'List Admin')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">List Admin</li>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12" style="text-align: left;">
                    <a href="{{ route('add_admin') }}" class="btn btn-primary">Add New Admin</a>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('_message')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Admin List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="10%">#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th width="20%">Created Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getRecord as $value => $item)
                                        <tr>
                                            <td>{{ $value + 1 }}</td>
                                            <td>{{ ucwords($item->name) }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
