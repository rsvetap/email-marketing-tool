<div class="card">
    <div class="card-body">
        <table id="groups-dt" class="table dt-responsive nowrap">
            <thead>
            <tr>
                <th>Title</th>
                <th>Action</th>
            </tr>
            <tfoot>
            <tr>
                <th>Title</th>
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

                ajax: '{{ route('admin.customer-group.datatable') }}',

                columns: [
                    {
                        name: 'title',
                        data: 'group_title',
                        className: 'dt-body-center'
                    },
                    {
                        name: 'action',
                        data: 'group_action',
                        className: 'dt-body-center',
                        orderable: false,
                        searchable: false,
                    },
                ],
            };

            $('#groups-dt').DataTable({...dt_config, ...window.globalDataTableConfig});
        });
    </script>

@endpush
