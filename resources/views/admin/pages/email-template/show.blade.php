@extends('admin.layout.main')

@section('title', 'Email Template')

@section('content-wrapper')

    @include('admin.layout.components.breadcrumb', [
        'current_route_title'   => 'Email Template',
        'previous_route_title'  => 'Email Templates',
        'previous_route_url'    => route('admin.email-template.index')
    ])

    @include('admin.layout.components.error-messages')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('admin.pages.email-template.form.update-or-create')
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('admin.pages.email-template.form.set-placeholders')
                </div>
            </div>
        </div>
    </div>

    @include('admin.layout.components.error-messages')

@endsection

