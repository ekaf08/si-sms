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
                <div class="card-header">
                    <h3 class="card-title">Form Input Admin</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('admin.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nama : </label>
                                    <input type="text" class="form-control form-control-border" name="name"
                                        id="name" placeholder="Nama ...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">email : </label>
                                    <input type="email" class="form-control form-control-border" name="email"
                                        id="email" placeholder="example@email.com">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password : </label>
                                    <input type="password" class="form-control form-control-border" name="password"
                                        id="password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cpassword">Konfirmasi Password : </label>
                                    <input type="password" class="form-control form-control-border" name="cpassword"
                                        id="cpassword">
                                </div>
                            </div>
                        </div>

                        <div class="text-right">
                            <button class="btn btn-secondary" type="reset">
                                Reset
                            </button>

                            <button class="btn btn-primary" type="reset">
                                Simpan
                            </button>
                        </div>
                    </form>
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
