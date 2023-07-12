@extends('admin.layout.main')

@section('title', 'Create Template')

@section('content-wrapper')

    @include('admin.layout.components.breadcrumb', [
        'current_route_title'   => 'Create Template',
        'previous_route_title'  => 'Email Templates',
        'previous_route_url'    => route('admin.email-template.index')
    ])

    <div class="row">
        <div class="col-12">
            @include('admin.pages.email-template.form.update-or-create')
        </div>
    </div><!-- .row -->

@endsection
