@foreach($actions as $actionKey => $action)

    @php $id = Illuminate\Support\Str::random(16) @endphp

    @if(isset($action['route_name']) )

        @switch($actionKey)

            {{-- SHOW ACTION --}}
            @case('show')
                <a href="{{ $action['url'] }}"
                   class="btn btn-sm btn-sm-white btn-icon mb-1"
                   title="Show"
                >
                    <i class="fa-solid fa-eye"></i>
                </a>
                @break

                {{-- PRINT ACTION --}}
            @case('print')
                <a href="{{ $action['url'] }}"
                   class="btn btn-sm btn-sm-white btn-icon mb-1"
                   title="Download"
                >
                    <i class="fa-regular fa-file-lines"></i>
                </a>
                @break

                {{-- EDIT ACTION --}}
            @case('edit')
                <a href="{{ $action['url'] }}"
                   class="btn btn-sm btn-sm-white btn-icon mb-1"
                   title="Edit"
                >
                    <i class="fa-solid fa-pencil"></i>
                </a>
                @break

                {{-- DELETE ACTION --}}
            @case('delete')
                <a href="#"
                   onclick="
                       event.preventDefault();
                       if (confirm('Are you sure you want to delete the entry?')===true) {$('#delete_form_{{ $id }}').submit();}
                       "
                   class="btn btn-sm btn-sm-white btn-icon mb-1"
                   title="Delete"
                >
                    <i class="fa-regular fa-trash-can"></i>
                </a>
                <form id="delete_form_{{ $id }}"
                      style="display: none;"
                      method="post"
                      action="{{ $action['url'] }}"
                >
                    @csrf
                    @method('delete')
                    <input type="submit">
                </form>
                @break

            @default

                <span> Action "{{ $key }}" not defined in actions.blade.php </span>

        @endswitch
    @endif
@endforeach
