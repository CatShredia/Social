@extends('admin.layouts.default')
@section('content')
    <div class="wrapper">

        @include('admin.includes.header')

        @include('admin.includes.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="col-md-12" style="padding: 10px">
                        <!-- /.row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Categories</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0">
                                        @livewire('category')

                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>

        @include('admin.includes.footer')

        @include('admin.includes.control')
    </div>
    <!-- ./wrapper -->
@endsection