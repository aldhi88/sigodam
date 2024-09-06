<?php

namespace App\Livewire\Dashboard;

use App\Models\Laporan;
use App\Models\Sekolah;
use Livewire\Component;

class Home extends Component
{
    public $dt = [];

    public function mount()
    {
        $blnList = Laporan::bulanList();
        $this->dt['blnNow'] = $blnList[intval(date('m'))];

        $dtSekolah = collect(Sekolah::all());
        $this->dt['sekolah']['jlh_tk'] = $dtSekolah->where('jenis_sekolah', 'TK')->count();
        $this->dt['sekolah']['jlh_sd'] = $dtSekolah->where('jenis_sekolah', 'SD')->count();
        $this->dt['sekolah']['jlh_sltp'] = $dtSekolah->where('jenis_sekolah', 'SLTP')->count();

        $dtLaporan = collect(Laporan::whereMonth('tgl_laporan',date('m'))
            ->with('sekolah')
            ->get());
        $this->dt['sekolah']['tk_melapor'] = $dtLaporan->where('sekolah.jenis_sekolah','TK')->count();
        $this->dt['sekolah']['sd_melapor'] = $dtLaporan->where('sekolah.jenis_sekolah','SD')->count();
        $this->dt['sekolah']['sltp_melapor'] = $dtLaporan->where('sekolah.jenis_sekolah','SLTP')->count();

        $dtLaporanSetujui = $dtLaporan->where('status', 1);
        $this->dt['sekolah']['tk_setujui'] = $dtLaporanSetujui->where('sekolah.jenis_sekolah','TK')->count();
        $this->dt['sekolah']['sd_setujui'] = $dtLaporanSetujui->where('sekolah.jenis_sekolah','SD')->count();
        $this->dt['sekolah']['sltp_setujui'] = $dtLaporanSetujui->where('sekolah.jenis_sekolah','SLTP')->count();

        $this->dt['sekolah']['persen_tk'] = $this->dt['sekolah']['jlh_tk'] !=0 ? ($this->dt['sekolah']['tk_setujui']/$this->dt['sekolah']['jlh_tk']) * 100 : 0;
        $this->dt['sekolah']['persen_sd'] = $this->dt['sekolah']['jlh_sd'] !=0 ? ($this->dt['sekolah']['sd_setujui']/$this->dt['sekolah']['jlh_sd']) * 100 : 0;
        $this->dt['sekolah']['persen_sltp'] = $this->dt['sekolah']['jlh_sltp'] !=0 ? ($this->dt['sekolah']['sltp_setujui']/$this->dt['sekolah']['jlh_sltp']) * 100 : 0;

    }
    public function render()
    {
        return view('mods.dashboard.home');
    }
}
