<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;


class LaporanController extends Controller
{
    public function create()
    {
        $data['page'] = 'laporan-create';
        $data['title'] = "Buat Laporan Data Sekolah";
        return view('mods.laporan.index', compact('data'));
    }
    public function operatorData()
    {
        $data['page'] = 'laporan-operator-data';
        $data['title'] = "Laporan Data Sekolah";
        return view('mods.laporan.index', compact('data'));
    }
    public function adminData()
    {
        $data['page'] = 'laporan-admin-data';
        $data['title'] = "Laporan Data Sekolah";
        return view('mods.laporan.index', compact('data'));
    }

    public function dataDt()
    {
        // $data = Sekolah::query()
        //     ->select(
        //         "sekolah.*",
        //         DB::raw("DATE_FORMAT(sekolah.created_at, '%d/%m/%Y') as created_at_custom"),
        //     )
        //     ->with([
        //         'users',
        //     ])
        // ;

        // return DataTables::of($data)
        //     ->addColumn('action', function($data){
        //         $return = '
        //         <div class="btn-group">
        //             <a href="javascript:void(0)" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
        //                 <i class="mdi mdi-dots-vertical"></i>
        //             </a>
        //             <div class="dropdown-menu" style="">
        //         ';

        //         $return .= '
        //             <a class="dropdown-item" href="#"><i class="far fa-eye fa-fw"></i> Detail</a>
        //         ';

        //         $return .='
        //             </div>
        //         </div>
        //         ';

        //         return $return;
        //     })
        //     ->rawColumns(['action'])
        //     ->toJson();
    }
}
