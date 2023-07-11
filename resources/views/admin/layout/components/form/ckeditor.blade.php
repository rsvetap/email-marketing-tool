<div class="form-row">
    <div class="form-group col-md-12">
        <label>{{ $title }}</label>
        <textarea class="form-control" id="{{ $id }}" name="{{ $name }}">{{ $value }}</textarea>
    </div>

    @error($id)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror

</div>

@push('script')

    <script>

        CKEDITOR.replace('{!! $id !!}', {
            filebrowserUploadUrl:    "{{ route('admin.ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            language:                '{!! $language !!}',
            on:                      {
                instanceReady: function (evt) {
                    evt.editor.dataProcessor.htmlFilter.addRules({
                        elements: {
                            img: function (element) {
                                element.addClass('lazyload');
                            }
                        }
                    });
                },
            }
        });

    </script>

@endpush
