@extends('admin.layout.main')

@section('title', 'Dashboard')

@section('content-wrapper')
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-body">

                <h4 class="mb-3 header-title">Send Emails</h4>

                <form method="post"
                      action="{{ route('admin.email-sending.send') }}">
                    @csrf
                    @method('POST')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="template">Email Template</label>
                                <select class="form-control mb-2" name="template">
                                    <option value="">-- Choose Template --</option>
                                    @foreach($templates as $template)
                                        <option value="{{ $template->id }}">
                                            {{ ucfirst($template->template_name) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="customers">Recipients</label>
                                <select id="customers"
                                        class="select2 form-control select2-multiple"
                                        name="customers[]"
                                        data&ndash;toggle="select2" multiple="multiple" aria-hidden="true"
                                >
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->email }}">
                                            {{ $customer->full_name . ' - ' . $customer->email }}
                                        </option>
                                    @endforeach
                                </select>
                                <input id="all-option" type="checkbox">Select All
                            </div>
                        </div>
                    </div>

                    @include('admin.layout.components.error-messages')

                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-md btn-primary mt-1">
                                Send
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@push('script')
    <script>
        $(document).ready(function () {
            var allOption = $('#all-option');

            allOption.click(function () {
                if (allOption.is(':checked')) {
                    $("#customers > option").prop("selected", true);
                    $("#customers").trigger("change");
                } else {
                    $("#customers > option").prop("selected", false);
                    $("#customers").trigger("change");
                }
            });
        });
    </script>
@endpush
