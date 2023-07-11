<div class="card">
    <div class="card-body">
        <table id="customers-dt" class="table dt-responsive nowrap">
            <thead>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Sex</th>
                <th>Birth Date</th>
                <th>Register at</th>
                <th>Updated at</th>
                <th>Action</th>
            </tr>
            <tfoot>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Sex</th>
                <th>Birth Date</th>
                <th>Register at</th>
                <th>Updated at</th>
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

                ajax: '{{ route('admin.customer.datatable') }}',

                columns: [
                    {
                        name: 'first_name',
                        data: 'customer_first_name',
                        className: 'dt-body-center'
                    },
                    {
                        name: 'last_name',
                        data: 'customer_last_name',
                        className: 'dt-body-center'
                    },
                    {
                        name: 'email',
                        data: 'customer_email',
                        className: 'dt-body-center'
                    },
                    {
                        name: 'sex',
                        data: 'customer_sex',
                        className: 'dt-body-center',
                        searchable: false,
                    },
                    {
                        name: 'birth_date',
                        data: 'customer_birth_date',
                        className: 'dt-body-center',
                        searchable: false,
                    },
                    {
                        name: 'created_at',
                        data: 'customer_created_at',
                        className: 'dt-body-center',
                        searchable: false,
                    },
                    {
                        name: 'updated_at',
                        data: 'customer_updated_at',
                        className: 'dt-body-center',
                        searchable: false,
                    },
                    {
                        name: 'action',
                        data: 'customer_action',
                        className: 'dt-body-center',
                        orderable: false,
                        searchable: false,
                    },
                ],
            };

            $('#customers-dt').DataTable({...dt_config, ...window.globalDataTableConfig});
        });
    </script>

@endpush
