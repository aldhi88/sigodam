<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;
use DataTables;
use DB;

class OperatorController extends Controller
{
    public function create()
    {
        $data['page'] = 'operator-create';
        $data['title'] = "Operator Sekolah Baru";
        return view('mods.operator.index', compact('data'));
    }

    public function data()
    {
        $data['page'] = 'operator-data';
        $data['title'] = "Data Operator Sekolah";
        return view('mods.operator.index', compact('data'));
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
                $return = '
                <div class="btn-group">
                    <a href="javascript:void(0)" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu" style="">
                ';

                $return .= '
                    <a class="dropdown-item" href="'.route('operator.resetPassword',$data->user_id).'"><i class="fas fa-unlock-alt fa-fw"></i> Reset Password</a>
                ';

                unset($dtJson);
                $dtJson['msg'] = 'menghapus data Operator '.$data->users->username;
                $dtJson['attr'] = $data->users->username;
                $dtJson['id'] = $data->id;
                $dtJson['callback'] = "operatordelete-delete";
                $dtJson = json_encode($dtJson);
                $return .= '<div class="dropdown-divider"></div>';
                $return .= '
                    <a class="dropdown-item text-danger" data-emit="modalconfirm-prepare" data-toggle="modal" data-target="#modalConfirm" href="javascript:void(0);" data-json=\''.$dtJson.'\'><i class="fas fa-trash-alt fa-fw"></i> Hapus</a>
                ';

                $return .='
                    </div>
                </div>
                ';

                return $return;
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    public function edit()
    {
        $data['page'] = 'operator-edit';
        $data['title'] = "Ubah Data Operator Sekolah";
        return view('mods.operator.index', compact('data'));
    }

    public function resetPassword($operatorId)
    {
        $data['page'] = 'operator-reset-password';
        $data['title'] = "Ubah Password Operator Sekolah";
        $data['operatorId'] = $operatorId;
        return view('mods.operator.index', compact('data'));
    }
}
