@extends('admin.layout.main')

@section('title', 'Customer Group')

@section('content-wrapper')

    @include('admin.layout.components.breadcrumb', [
        'current_route_title'   => 'Customer Group',
        'previous_route_title'  => 'Customer Groups',
        'previous_route_url'    => route('admin.customer-group.index')
    ])

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    @include('admin.pages.customer-group.form.update-or-create')
                </div>
            </div>
        </div>
    </div><!-- .row -->

@endsection

