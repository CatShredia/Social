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
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-bullhorn"></i>
                                    Information
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="callout callout-danger">
                                    <h5>Red</h5>
                                </div>
                                <div class="callout callout-info">
                                    <h5>Blue</h5>
                                </div>
                                <div class="callout callout-warning">
                                    <h5>Yellow</h5>
                                </div>
                                <div class="callout callout-success">
                                    <h5>Green</h5>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
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
