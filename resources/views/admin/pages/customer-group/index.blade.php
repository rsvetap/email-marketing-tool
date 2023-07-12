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
                    <div class="d-md-flex justify-content-md-start mb-3">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="javascript:void(0)"
                                   class="btn btn-icon btn-sm btn-primary unwrap-block"
                                   title="Create new customer group">
                                    <i class="mdi mdi-plus"></i>
                                    Group
                                </a>
                            </div>
                        </div>
                    </div>

                    @include('admin.layout.components.error-messages')

                    <div class="mb-3 wrapped-block" style="display: none">
                        @include('admin.pages.customer-group.form.update-or-create')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @include('admin.pages.customer-group.data-table.table')
        </div>
    </div>

@endsection
