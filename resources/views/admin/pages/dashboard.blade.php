@extends('admin.layout.main')

@section('title', 'Dashboard')

@section('content-wrapper')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="form-inline">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light"
                                       id="dash-daterange">
                                <div class="input-group-append">
                                        <span class="input-group-text bg-primary border-primary text-white">
                                            <i class="mdi mdi-calendar-range font-13"></i>
                                        </span>
                                </div>
                            </div>
                        </div>
                        <a href="javascript: void(0);" class="btn btn-primary ml-2">
                            <i class="mdi mdi-autorenew"></i>
                        </a>
                        <a href="javascript: void(0);" class="btn btn-primary ml-1">
                            <i class="mdi mdi-filter-variant"></i>
                        </a>
                    </form>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">Breakfasts (total: not paid/just added to carts + paid) && Successfully
                    paid breakfasts</h4>
                <div style="height: 263px;" class="chartjs-chart">
                    <canvas id="high-performing-product"></canvas>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->

    </div> <!-- end col -->

@endsection
