@foreach($actions as $actionKey => $action)

    @php $id = Illuminate\Support\Str::random(16); @endphp

    @if(isset($action['route_name']) )

        @switch($actionKey)

            @case('show')
            <a href="{{ $action['url'] }}" class="btn btn-icon btn-sm btn-primary" title="View details">
                <i class="mdi mdi-eye-outline"></i>
            </a>
            @break

            @case('edit')
            <a href="{{ $action['url'] }}" class="btn btn-icon btn-sm btn-success" title="Edit details">
                <i class="mdi mdi-pencil"></i>
            </a>
            @break

            @case('delete')
            <a href="#"
               onclick="event.preventDefault();var r=confirm('Are you sure you want to delete the entry?');
                       if (r===true) {$('#delete_form_{{ $id }}').submit();}"
               class="btn btn-icon btn-sm btn-danger" title="Delete">
                <i class="mdi mdi-delete"></i>
            </a>
            <form id="delete_form_{{ $id }}" style="display: none;" method="post" action="{{ $action['url'] }}">
                @csrf
                @method('delete')
                <input type="submit">
            </form>
            @break

            @case('booking')
                <a href="{{ $action['url'] }}" class="btn btn-sm btn-primary" title="View details">
                    show booking
                </a>
            @break

            @case('qr-confirm')
                <a href="#"
                   onclick="
                       event.preventDefault();
                       var inputText = prompt('Please enter the code:');
                       if (inputText !== null) {
                           $('#confirm_form_{{ $id }} input[name=confirm_text]').val(inputText);
                           var r = confirm('Are you sure you want to confirm this QR without scanning?');
                           if (r === true) {
                               $('#confirm_form_{{ $id }}').submit();
                           }
                       }"
                   class="btn btn-icon btn-sm btn-success qr-scan" title="Confirm">
                    confirm (without QR-scan)
                </a>
                <form id="confirm_form_{{ $id }}" style="display: none;" method="post" action="{{ $action['url'] }}">
                    @csrf
                    @method('post')
                    <input type="hidden" name="route-from" value="reservations_{{ $action['date'] }}">
                    <input type="hidden" name="confirm_text" value="">
                    <input type="submit">
                </form>

                @break

            @default

            <span> Action "{{ $key }}" not defined in actions.blade.php </span>

        @endswitch
    @endif
@endforeach
