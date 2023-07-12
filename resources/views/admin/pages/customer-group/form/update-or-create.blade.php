<form method="post"
      action="{{ isset($group) ? route('admin.customer-group.update', $group) : route('admin.customer-group.store') }}">
    @csrf
    @method(isset($group) ? 'PUT' : 'POST')
    <div class="form-row">
        <div class="col-12">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text"
                       class="form-control"
                       id="title"
                       name="title"
                       value="{{ old('title', isset($group) ? $group->title : '') }}"
                       required>
            </div>
        </div>

    </div>

    @if (isset($group))
        @include('admin.layout.components.error-messages')
    @endif

    <div class="row">
        <div class="col-md-12 text-right">
            @if (!isset($group))
                <a type="javascript:void(0)" class="btn btn-md btn-danger mt-1 mr-3 wrap-block">
                    Cancel
                </a>
            @endif

            <button type="submit" class="btn btn-md btn-primary mt-1">
                {{ isset($group) ? 'Update' : 'Create' }}
            </button>
        </div>
    </div>
</form>
