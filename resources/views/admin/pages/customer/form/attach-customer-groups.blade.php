<form action="{{ route('admin.customer.attachGroups', $customer) }}" method="post">
    @csrf
    @method('post')

    <div class="form-group">
        <label for="attach_groups">Attach Groups:</label>
        <select id="attach_groups"
                class="select2 form-control select2-multiple"
                name="groups[]"
                data&ndash;toggle="select2" multiple="multiple" aria-hidden="true"
        >
            @foreach($groups as $group)
                <option value="{{ $group->id }}" @selected($customer->groups->contains($group))>
                    {{ $group->title }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="d-md-flex justify-content-md-end">
        <button type="submit" class="btn btn-icon btn-primary">Save</button>
    </div>
</form>
