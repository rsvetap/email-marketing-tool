@extends('admin.layout.main')

@section('title', 'Customer Groups')

@section('content-wrapper')

    @include('admin.layout.components.breadcrumb', [
        'current_route_title' => 'Customer Groups'
    ])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin.email-template.create') }}"
                       class="btn btn-icon btn-sm btn-primary" title="Create new email template">
                        <i class="mdi mdi-plus"></i>
                        Template
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @include('admin.layout.components.error-messages')
            @include('admin.pages.email-template.data-table.table')
        </div>
    </div>

@endsection
