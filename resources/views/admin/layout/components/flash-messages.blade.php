@if($errors->any())
    <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        @foreach ($errors->all() as $key => $error)
            <strong>{{ $loop->iteration }}. </strong> {!! $error !!} <br>
        @endforeach
    </div>
@endif

@if ($message = Session::get('success'))
    @push('script')
        <script> toastr.success('{!! $message !!}'); </script>
    @endpush
@endif

@if ($message = Session::get('error'))
    @push('script')
        <script> toastr.error('{!! $message !!}'); </script>
    @endpush
@endif