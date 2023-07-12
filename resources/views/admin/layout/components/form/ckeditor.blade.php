<div class="form-row">
    <div class="form-group col-md-12">
        <label for="{{ $id }}" class="mb-1">
            {{ $title }}
        </label>
        <textarea class="form-control" id="{{ $id }}" name="{{ $name }}">
            {{ $value }}
        </textarea>
    </div>

    @error($id)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror

</div>
@push('script')

    <script>
        $(function () {
            ClassicEditor
                .create( {{ $id }}, {
                    extraPlugins: [ SimpleUploadAdapterPlugin ],
                } )
                .then( editor => {
                    editor.editing.view.change(
                        writer => {
                            writer.setStyle(
                                'height', '{{ $height  }}px',
                                editor.editing.view.document.getRoot()
                            );
                        } );
                } )
                .catch( error => {
                    console.error( error );
                } );

            class SimpleUploadAdapter {
                constructor(loader) {
                    this.loader = loader;
                }

                upload() {
                    return this.loader.file
                        .then( file => new Promise( ( resolve, reject ) => {
                            this._initRequest();
                            this._initListeners( resolve, reject, file );
                            this._sendRequest( file );
                        } ) );
                }

                abort() {
                    if ( this.xhr ) {
                        this.xhr.abort();
                    }
                }


                _initRequest() {
                    const xhr = this.xhr = new XMLHttpRequest();

                    xhr.open('POST', '{{ route('admin.ckeditor.upload') }}', true);
                    xhr.setRequestHeader('x-csrf-token', '{{ csrf_token() }}');
                    xhr.responseType = 'json';
                }

                _initListeners(resolve, reject, file) {
                    const xhr = this.xhr;
                    const loader = this.loader;
                    const genericErrorText = `Couldn't upload file: ${file.name}.`;

                    xhr.addEventListener('error', () => reject(genericErrorText));
                    xhr.addEventListener('abort', () => reject());
                    xhr.addEventListener('load', () => {
                        const response = xhr.response;

                        if (!response || response.error) {
                            return reject(response && response.error ? response.error.message : genericErrorText);
                        }

                        resolve({
                            default: response.url
                        });
                    });
                    if (xhr.upload) {
                        xhr.upload.addEventListener('progress', evt => {
                            if (evt.lengthComputable) {
                                loader.uploadTotal = evt.total;
                                loader.uploaded = evt.loaded;
                            }
                        });
                    }
                }

                _sendRequest(file) {
                    const data = new FormData();

                    data.append('upload', file);

                    this.xhr.send(data);
                }
            }

            function SimpleUploadAdapterPlugin( editor ) {
                editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
                    return new SimpleUploadAdapter( loader );
                };
            }
        });

    </script>

@endpush
