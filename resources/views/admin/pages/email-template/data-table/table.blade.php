<div class="card">
    <div class="card-body">
        <table id="email-templates-dt" class="table dt-responsive nowrap">
            <thead>
            <tr>
                <th>Subject</th>
                <th>Action</th>
            </tr>
            <tfoot>
            <tr>
                <th>Subject</th>
                <th>Action</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>

@push('script')

    <script>
        $(function () {
            let dt_config = {

                ajax: '{{ route('admin.email-template.datatable') }}',

                columns: [
                    {
                        name: 'subject',
                        data: 'email_template_subject',
                        className: 'dt-body-center'
                    },
                    {
                        name: 'action',
                        data: 'email_template_action',
                        className: 'dt-body-center',
                        orderable: false,
                        searchable: false,
                    },
                ],
            };

            $('#email-templates-dt').DataTable({...dt_config, ...window.globalDataTableConfig});
        });
    </script>

@endpush
