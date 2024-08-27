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
            { className: 'bg-red', targets: ['_all'] },
        ],
        ajax: '{{ route("sekolah.data.dt") }}',
        columns: [
            { data: 'action', name: 'action', orderable: false, searchable:false },
            { data: 'nama_sekolah', name: 'nama_sekolah', orderable: true, searchable:true },
            { data: 'jenis_sekolah', name: 'jenis_sekolah', orderable: true, searchable:true },
            { data: 'status_sekolah', name: 'status_sekolah', orderable: true, searchable:true },
            { data: 'jalan', name: 'jalan', orderable: true, searchable:true },
            { data: 'nama_desa', name: 'nama_desa', orderable: true, searchable:true },
            { data: 'status_desa', name: 'status_desa', orderable: true, searchable:true },
            { data: 'tahun_pendirian', name: 'tahun_pendirian', orderable: true, searchable:true },
            { data: 'kategori_gugus', name: 'kategori_gugus', orderable: true, searchable:true },
            { data: 'jarak_ke_camat', name: 'jarak_ke_camat', orderable: true, searchable:true },
            { data: 'status_bangunan', name: 'status_bangunan', orderable: true, searchable:true },
            { data: 'kecamatan', name: 'kecamatan', orderable: true, searchable:true },
            { data: 'kanin', name: 'kanin', orderable: true, searchable:true },
            { data: 'penilik', name: 'penilik', orderable: true, searchable:true },
            { data: 'nss', name: 'nss', orderable: true, searchable:true },
            { data: 'npsn', name: 'npsn', orderable: true, searchable:true },
        ],
        initComplete: function(settings){
            table = settings.oInstance.api();
            initSearchCol(table,'#header-filter','search-col-dt');
        }
    });



    </script>

@endsection
