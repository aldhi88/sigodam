<?php

namespace App\Livewire\Laporan;

use App\Models\Laporan;
use App\Models\Sekolah;
use Carbon\Carbon;
use Livewire\Component;

class LaporanDetail extends Component
{
    public $dt = [];
    public $form = [];

    public function mount($data)
    {
        $this->dt['laporan'] = Laporan::query()
            ->with('sekolah')
            ->whereId($data['id'])->first()->toArray();
        $this->dt['laporan']['tgl_laporan_indonesia'] = Carbon::create($this->dt['laporan']['tgl_laporan'])->translatedFormat('F Y');
        $this->dt['jlh_kelas'] = Sekolah::jlhKelas($this->dt['laporan']['sekolah']['jenis_sekolah']);
        $this->dt['angkaRomawi'] = Sekolah::kelasRomawiList();
        $this->dt['hari'] = 14;
        $this->form = $this->dt['laporan'];
        // dd($this->dt);
    }
    public function render()
    {
        return view('mods.laporan.laporan_detail');
    }
}
