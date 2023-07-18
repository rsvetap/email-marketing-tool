<form method="post" action="{{ route('admin.email-template.set-placeholders', $template) }}" id="placeholders-form">
    @csrf
    @method('POST')

    <div class="col-md-12">
        <div class="form-group">
            <div id="placeholder-fields">
                <!-- Placeholder fields will be added dynamically here -->
                <input type="hidden" id="placeholders" name="placeholders" value="{{ htmlspecialchars(json_encode($template->placeholders)) }}">
                @if(!is_null($template->placeholders))
                    @php
                        $count = 0;
                    @endphp
{{--@dd($template->placeholders );--}}
                    @foreach($template->placeholders as $key => $value)
                        <div class="form-row mb-2">
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="placeholder_key[{{ $count }}]"
                                       placeholder="Key" value="{{ $key }}">
                            </div>
                            <div class="col-md-5">
                                <select class="form-control" name="placeholder_value[{{ $count }}]">
                                    <option value="">-- Choose Field --</option>
                                    @foreach($placeholderValues as $placeholderValue)
                                        <option value="{{ $placeholderValue }}" @selected($placeholderValue === $value)>{{ $placeholderValue }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger remove-placeholder-btn">Remove</button>
                            </div>
                        </div>

                        @php
                            $count++;
                        @endphp
                    @endforeach
                @endif
            </div>

            <!-- Buttons -->
            <button id="add-placeholder-btn" type="button" class="btn btn-primary mt-2 mr-2">
                <i class="mdi mdi-plus"></i>
                Add
            </button>
            <button id="save-placeholders-btn" type="button" class="btn btn-success mt-2" style="display: none;">Save
            </button>
        </div>
    </div><!-- Placeholders -->

</form>

@push('script')
    <script>
        $(document).ready(function () {
            var placeholderCount = {{ $template->placeholders ? count($template->placeholders) : 0 }},
                placeholderFieldsContainer = $('#placeholder-fields'),
                saveButton = $('#save-placeholders-btn');

            /* Add placeholder */
            $('#add-placeholder-btn').on('click', function () {
                placeholderCount++;

                var placeholderHtml = `
            <div class="form-row mb-2">
                <div class="col-md-5">
                    <input type="text" class="form-control" name="placeholder_key[${placeholderCount}]" placeholder="Key">
                </div>
                <div class="col-md-5">
                    <select class="form-control" name="placeholder_value[${placeholderCount}]">
                        <option value="">-- Select a field --</option>
                        @foreach($placeholderValues as $placeholderValue)
                <option value="{{ $placeholderValue }}">{{ $placeholderValue }}</option>
                        @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger remove-placeholder-btn" data-placeholder-count="${placeholderCount}">Remove</button>
                </div>
            </div>
        `;

                placeholderFieldsContainer.append(placeholderHtml);
                saveButton.show();
            });

            /* Remove placeholder */
            placeholderFieldsContainer.on('click', '.remove-placeholder-btn', function () {
                $(this).closest('.form-row').remove();
                // Hide the save button if there are no placeholders remaining
                if (placeholderFieldsContainer.find('.form-row').length === 0) {
                    saveButton.hide();
                }
            });

            // Show the save button when a field is changed
            $('input[name^="placeholder_key"], select[name^="placeholder_value"]').on('change', function () {
                saveButton.show();
            });

            // Update placeholders and store in hidden field on save button click
            saveButton.on('click', function () {
                event.preventDefault();

                var placeholders = {};
                $('input[name^="placeholder_key"]').each(function () {
                    var key = $(this).val();
                    var index = $(this).attr('name').match(/\d+/);
                    var value = $(`select[name="placeholder_value[${index}]"]`).val();
                    if (key && value) {
                        placeholders[key] = value;
                    }
                });
                $('#placeholders').val(JSON.stringify(placeholders));

                $('#placeholders-form').submit();
            });
        });

    </script>

@endpush
