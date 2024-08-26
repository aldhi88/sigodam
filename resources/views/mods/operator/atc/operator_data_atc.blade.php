@section('style')
        <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('script')

    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

    <script>

    window.addEventListener('reloadDt', param => {
        dtTable.ajax.reload();
    });

    var dtTable = $('#myTable').DataTable({
        processing: true,serverSide: true,pageLength: 25,sDom: 'lrtip',
        order: [[5, 'desc']],
        columnDefs: [
            { className: 'text-center', targets: ['_all'] },
        ],
        ajax: '{{ route("operator.data.dt") }}',
        columns: [
            { data: 'action', name: 'action', orderable: false, searchable:false },
            { data: 'users.username', name: 'users.username', orderable: true, searchable:true },
            { data: 'users.nickname', name: 'users.nickname', orderable: true, searchable:true },
            { data: 'jenis_sekolah', name: 'jenis_sekolah', orderable: true, searchable:true },
            { data: 'nama_sekolah', name: 'nama_sekolah', orderable: true, searchable:true },
            { data: 'created_at_custom', name: 'created_at', orderable: true, searchable:false },
        ],
        initComplete: function(settings){
            table = settings.oInstance.api();
            initSearchCol(table,'#header-filter','search-col-dt');
        }
    });



    </script>

@endsection
