@section('style')
        <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('script')

    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

    <script>
    $('.only-number').on('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    window.addEventListener('reloadDt', param => {
        dtTable.ajax.reload();
    });

    var dtTable = $('#myTable').DataTable({
        processing: true,serverSide: true,pageLength: 25,sDom: 'lrtip',
        order: [[0, 'desc']],
        columnDefs: [
            { className: 'text-center', targets: ['_all'] },
        ],
        ajax: '{{ route("laporan.data.operator.dt") }}',
        columns: [
            { data: 'action', name: 'tgl_laporan', orderable: false, searchable:false },
            { data: 'bulan_tgl_laporan_string', name: 'bulan_tgl_laporan', orderable: true, searchable:true },
            { data: 'tahun_tgl_laporan', name: 'tahun_tgl_laporan', orderable: true, searchable:true },
            { data: 'status_label', name: 'status', orderable: true, searchable:true },
        ],
        initComplete: function(settings){
            var table = settings.oInstance.api();
            initSearchCol(table,'#header-filter','search-col-dt');
        }
    });



    </script>

@endsection
