<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use DataTables;
use DB;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function data()
    {
        $data['page'] = 'sekolah-data';
        $data['title'] = "Data Sekolah";
        return view('mods.sekolah.index', compact('data'));
    }

    public function dataDt()
    {
        $data = Sekolah::query()
            ->select(
                "sekolah.*",
                DB::raw("DATE_FORMAT(sekolah.created_at, '%d/%m/%Y') as created_at_custom"),
            )
            ->with([
                'users',
            ])
        ;

        return DataTables::of($data)
            ->addColumn('action', function($data){
                // $return = '
                // <div class="btn-group">
                //     <a href="javascript:void(0)" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                //         <i class="mdi mdi-dots-vertical"></i>
                //     </a>
                //     <div class="dropdown-menu" style="">
                // ';

                // $return .= '
                //     <a class="dropdown-item" href="#"><i class="far fa-eye fa-fw"></i> Detail</a>
                // ';

                // $return .='
                //     </div>
                // </div>
                // ';

                // return $return;
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    public function edit($sekolahId)
    {
        $data['page'] = 'sekolah-edit';
        $data['title'] = "Sekolah Saya";
        $data['sekolahId'] = $sekolahId;
        return view('mods.sekolah.index', compact('data'));
    }
}
