@extends('admin.layout.main')

@section('title', 'Customer Information')

@section('content-wrapper')

    @include('admin.layout.components.breadcrumb', [
        'current_route_title'   => 'Customer Information',
        'previous_route_title'  => 'Customers',
        'previous_route_url'    => route('admin.customer.index')
    ])

    <div class="row">
        <div class="col-12">
            @include('admin.pages.customer.form.update-or-create')
        </div>
    </div><!-- .row -->

@endsection

