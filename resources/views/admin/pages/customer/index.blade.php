@extends('admin.layout.main')

@section('title', 'Customers')

@section('content-wrapper')

    @include('admin.layout.components.breadcrumb', [
        'current_route_title' => 'Customers'
    ])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin.customer.create') }}"
                       class="btn btn-icon btn-sm btn-primary" title="Create new customer user">
                        <i class="mdi mdi-plus"></i>
                        Customer
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @include('admin.layout.components.error-messages')
            @include('admin.pages.customer.data-table.table')
        </div>
    </div>

@endsection
