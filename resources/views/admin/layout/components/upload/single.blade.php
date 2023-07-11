@php
    $key = ($attachmentGroup ?? '') . '_' . ($attachmentKey ?? '');
@endphp

<div class="mt-1 mb-2">
    <form method="post"
          id="dropzone_{{ $key }}"
          action="{{ route('admin.api.file.single-upload') }}"
          class="dropzone dz-clickable"
    >
        @csrf
        @method('POST')

        <div id="template-container-{{ $key }}" class="dz-message">
            <div>
                <i class="h1 text-muted dripicons-cloud-upload"></i>
                <h3>Drop file's here or click to upload.</h3>
                <span class="text-muted font-13"> </span>
            </div>
        </div>
    </form>

    <!-- file preview template -->
    <div class="d-none" id="template-template-{{ $key }}">
        <div>
            <div class="card mt-1 mb-0 shadow-none border border-light">
                <div class="p-2">
                    <div class="row align-items-center">
                        <div class="img-box">
                            <img data-dz-thumbnail class="rounded bg-light" alt="" src="">
                        </div>
                        <div class="col pl-0">
                            <a href="javascript:void(0);" class="text-muted font-weight-bold" data-dz-name></a>
                            <p class="mb-0" data-dz-size></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')

    <script>
        var attachments = @json(app($modelInstance)->where('id', $modelID)->first()->attachmentsGroup($attachmentGroup));

        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        var id = '{{ '#dropzone_' . $key }}';

        Dropzone.autoDiscover = false;

        var myDropzone = new Dropzone(id, {
            previewsContainer: document.getElementById('template-container-' + '{{ $key }}'),
            previewTemplate  : document.querySelector('#template-template-' + '{{ $key }}').innerHTML,
            uploadMultiple   : false,
            paramName        : 'file',
            clickable        : true,
            maxFiles         : 1,
            acceptedFiles    : '.jpeg,.jpg,.png',
            init             : function () {

                let this_this = this;

                $.each(attachments, function (key, value) {

                    let mockFile = {name: value.filename, size: value.filesize, accepted: true};

                    this_this.emit('addedfile', mockFile);
                    this_this.emit('thumbnail', mockFile, value.url);
                    this_this.emit('complete', mockFile);
                    this_this.files.push(mockFile);
                });

                this_this.on('maxfilesexceeded', function (file) {
                    this_this.removeAllFiles();
                    this_this.addFile(file);
                });
            }
        });

        myDropzone.on('sending', function (file, xhr, formData) {
            formData.append('_token', CSRF_TOKEN);
            formData.append('model_instance', '{{ str_replace("\\", "\\\\", $modelInstance) }}');
            formData.append('model_id', '{{ $modelID }}');
            formData.append('attachment_group', '{{ $attachmentGroup }}');
            formData.append('attachment_key', '{{ $attachmentKey }}');
        });

    </script>
@endpush
