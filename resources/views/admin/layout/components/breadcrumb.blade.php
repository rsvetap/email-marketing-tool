<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard.index') }}" title="Home">
                            Home
                        </a>
                    </li>
                    @if(isset($previous_route_url))
                        <li class="breadcrumb-item">
                            <a href="{{ $previous_route_url }}" title="{{ ucfirst($previous_route_title) }}">
                                {{ ucfirst($previous_route_title) }}
                            </a>
                        </li>
                    @endif
                    <li class="breadcrumb-item active">
                        {{ ucfirst($current_route_title) }}
                    </li>
                </ol>
            </div>
            <h4 class="page-title">
                {{ ucfirst($current_route_title) }}
            </h4>
        </div>
    </div>
</div>
