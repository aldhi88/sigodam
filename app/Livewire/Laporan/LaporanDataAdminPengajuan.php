<?php

namespace App\Livewire\Laporan;

use App\Models\Laporan;
use Livewire\Component;

class LaporanDataAdminPengajuan extends Component
{
    public $select = [];

    public function mount()
    {
        $flashMsg = session()->get('status');
        if(!is_null($flashMsg)){
            $this->dispatch('alert', data:['type' => 'success',  'message' => $flashMsg]);
        }

        $this->select['bulan'] = Laporan::bulanList();
        $this->select['status'] = Laporan::statusList('label');
    }
    public function render()
    {
        return view('mods.laporan.laporan_data_admin_pengajuan');
    }
}
