<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Sekolah;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use DataTables;
use DB;

class LaporanController extends Controller
{
    public function create()
    {
        $data['page'] = 'laporan-create';
        $data['title'] = "Buat Laporan Data Sekolah";
        return view('mods.laporan.index', compact('data'));
    }
    public function dataOperator()
    {
        $data['page'] = 'laporan-data-operator';
        $data['title'] = "Laporan Data Sekolah";
        return view('mods.laporan.index', compact('data'));
    }
    public function dataAdminPengajuan()
    {
        $data['page'] = 'laporan-data-admin-pengajuan';
        $data['title'] = "Pengajuan Laporan Sekolah";
        return view('mods.laporan.index', compact('data'));
    }
    public function dataAdminDisetujui()
    {
        $data['page'] = 'laporan-data-admin-disetujui';
        $data['title'] = "Laporan Sekolah Disetujui";
        return view('mods.laporan.index', compact('data'));
    }
    public function edit($laporanId)
    {
        $data['id'] = $laporanId;
        $data['page'] = 'laporan-edit';
        $data['title'] = "Edit Laporan Sekolah";
        return view('mods.laporan.index', compact('data'));
    }
    public function detail($laporanId)
    {
        $data['id'] = $laporanId;
        $data['page'] = 'laporan-detail';
        $data['title'] = "Detail Laporan Sekolah";
        return view('mods.laporan.index', compact('data'));
    }


    public function dataOperatorDt()
    {
        $sekolahId = Sekolah::select('id')
            ->where('user_id', Auth::id())->first()->getAttribute('id');
        $data = Laporan::query()
            ->select(
                "laporan.*",
                DB::raw("MONTH(laporan.tgl_laporan) as bulan_tgl_laporan"),
                DB::raw("YEAR(laporan.tgl_laporan) as tahun_tgl_laporan"),
            )
            ->with([
                'sekolah',
                'sekolah.users',
                'sekolah.users.roles',
            ])
            ->where('sekolah_id', $sekolahId)

        ;

        $bulanList = Laporan::bulanList();
        $statusList = Laporan::statusList('badge');

        return DataTables::of($data)
            ->filterColumn('bulan_tgl_laporan', function($query, $keyword) {
                $sql = "MONTH(laporan.tgl_laporan)  like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->addColumn('bulan_tgl_laporan_string', function($data) use($bulanList) {
                return $bulanList[$data->bulan_tgl_laporan-1];
            })
            ->filterColumn('tahun_tgl_laporan', function($query, $keyword) {
                $sql = "YEAR(laporan.tgl_laporan)  like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->addColumn('status_label', function($data) use($statusList) {
                return $statusList[$data->status];
            })
            ->addColumn('action', function($data) use($bulanList){
                $return = '
                <div class="btn-group">
                    <a href="javascript:void(0)" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu" style="">
                ';

                $return .= '
                    <a class="dropdown-item" href="'.route('laporan.detail',$data->id).'"><i class="far fa-eye fa-fw"></i> Lihat Detail</a>
                ';

                if($data->status != 1){
                    $return .= '
                        <a class="dropdown-item" href="'.route('laporan.edit',$data->id).'"><i class="far fa-edit fa-fw"></i> Edit</a>
                    ';
                }

                if($data->status != 1){
                    unset($dtJson);
                    $dtJson['msg'] = 'menghapus data Laporan bulan '.$bulanList[$data->bulan_tgl_laporan-1].' '.$data->tahun_tgl_laporan;
                    $dtJson['attr'] = $data->tgl_laporan;
                    $dtJson['id'] = $data->id;
                    $dtJson['callback'] = "laporandelete-delete";
                    $dtJson = json_encode($dtJson);
                    $return .= '
                        <a class="dropdown-item text-danger" data-emit="modalconfirm-prepare" data-toggle="modal" data-target="#modalConfirm" href="javascript:void(0);" data-json=\''.$dtJson.'\'><i class="fas fa-trash-alt fa-fw"></i> Hapus</a>
                    ';
                }

                $return .='
                    </div>
                </div>
                ';

                return $return;
            })

            ->rawColumns(['action','status_label'])
            ->toJson();
    }

    public function dataAdminPengajuanDt()
    {
        $data = Laporan::query()
            ->select(
                "laporan.*",
                DB::raw("MONTH(laporan.tgl_laporan) as bulan_tgl_laporan"),
                DB::raw("YEAR(laporan.tgl_laporan) as tahun_tgl_laporan"),
            )
            ->with([
                'sekolah',
                'sekolah.users',
                'sekolah.users.roles',
            ])
            ->where('status', '!=', 1)
        ;

        $bulanList = Laporan::bulanList();
        $statusList = Laporan::statusList('badge');

        return DataTables::of($data)
            ->filterColumn('bulan_tgl_laporan', function($query, $keyword) {
                $sql = "MONTH(laporan.tgl_laporan)  like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->addColumn('bulan_tgl_laporan_string', function($data) use($bulanList) {
                return $bulanList[$data->bulan_tgl_laporan-1];
            })
            ->filterColumn('tahun_tgl_laporan', function($query, $keyword) {
                $sql = "YEAR(laporan.tgl_laporan)  like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->addColumn('status_label', function($data) use($statusList) {
                return $statusList[$data->status];
            })
            ->addColumn('action', function($data) use($bulanList){
                $return = '
                <div class="btn-group">
                    <a href="javascript:void(0)" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu" style="">
                ';

                $return .= '
                    <a class="dropdown-item" href="'.route('laporan.detail',$data->id).'"><i class="far fa-eye fa-fw"></i> Lihat Detail</a>
                ';

                if($data->status != 1){
                    unset($dtJson);
                    $dtJson['msg'] = 'menyetujui laporan '.$bulanList[$data->bulan_tgl_laporan-1].' '.$data->tahun_tgl_laporan.' dari '.$data->sekolah->nama_sekolah;
                    $dtJson['attr'] = $data->sekolah->nama_sekolah;
                    $dtJson['id'] = $data->id;
                    $dtJson['callback'] = "laporansetujui-setujui";
                    $dtJson = json_encode($dtJson);
                    $return .= '
                        <a class="dropdown-item text-success" data-emit="modalconfirm-prepare" data-toggle="modal" data-target="#modalConfirm" href="javascript:void(0);" data-json=\''.$dtJson.'\'><i class="fas fa-check-circle fa-fw"></i> Setujui</a>
                    ';
                }

                if($data->status != 1){
                    unset($dtJson);
                    $dtJson['msg'] = 'menolak laporan '.$bulanList[$data->bulan_tgl_laporan-1].' '.$data->tahun_tgl_laporan.' dari '.$data->sekolah->nama_sekolah;
                    $dtJson['attr'] = $data->sekolah->nama_sekolah;
                    $dtJson['id'] = $data->id;
                    $dtJson['callback'] = "laporantolak-tolak";
                    $dtJson = json_encode($dtJson);
                    $return .= '
                        <a class="dropdown-item text-danger" data-emit="modalconfirm-prepare" data-toggle="modal" data-target="#modalConfirm" href="javascript:void(0);" data-json=\''.$dtJson.'\'><i class="fas fa-times-circle fa-fw"></i> Tolak</a>
                    ';
                }

                $return .='
                    </div>
                </div>
                ';

                return $return;
            })

            ->rawColumns(['action','status_label'])
            ->toJson();
    }

    public function dataAdminDisetujuiDt()
    {
        $data = Laporan::query()
            ->select(
                "laporan.*",
                DB::raw("MONTH(laporan.tgl_laporan) as bulan_tgl_laporan"),
                DB::raw("YEAR(laporan.tgl_laporan) as tahun_tgl_laporan"),
            )
            ->with([
                'sekolah',
                'sekolah.users',
                'sekolah.users.roles',
            ])
            ->where('status', 1)
        ;

        $bulanList = Laporan::bulanList();
        $statusList = Laporan::statusList('badge');

        return DataTables::of($data)
            ->filterColumn('bulan_tgl_laporan', function($query, $keyword) {
                $sql = "MONTH(laporan.tgl_laporan)  like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->addColumn('bulan_tgl_laporan_string', function($data) use($bulanList) {
                return $bulanList[$data->bulan_tgl_laporan-1];
            })
            ->filterColumn('tahun_tgl_laporan', function($query, $keyword) {
                $sql = "YEAR(laporan.tgl_laporan)  like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->addColumn('status_label', function($data) use($statusList) {
                return $statusList[$data->status];
            })
            ->addColumn('action', function($data) use($bulanList){
                $return = '
                <div class="btn-group">
                    <a href="javascript:void(0)" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu" style="">
                ';

                $return .= '
                    <a class="dropdown-item" href="'.route('laporan.detail',$data->id).'"><i class="far fa-eye fa-fw"></i> Lihat Detail</a>
                ';

                $return .='
                    </div>
                </div>
                ';

                return $return;
            })

            ->rawColumns(['action','status_label'])
            ->toJson();
    }
}
