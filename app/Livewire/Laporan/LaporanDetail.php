<?php

namespace App\Livewire\Laporan;

use App\Models\Laporan;
use App\Models\Sekolah;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class LaporanDetail extends Component
{
    public $dt = [];
    public $form = [];
    public $data = [];

    protected $listeners = [
        'laporandetail-refresh' => '$refresh'
    ];

    #[On('laporandetail-refreshPage')]
    public function refreshPage()
    {
        $this->mount($this->data);
    }

    public function mount($data)
    {
        $this->data = $data;
        $this->dt['laporan'] = Laporan::query()
            ->with('sekolah')
            ->whereId($data['id'])->first()->toArray();

        $this->dt['jlh_kelas'] = Sekolah::jlhKelas($this->dt['laporan']['sekolah']['jenis_sekolah']);
        $this->dt['angkaRomawi'] = Sekolah::kelasRomawiList();
        $this->dt['hari'] = 14;
        $this->form = $this->dt['laporan'];
        $this->dt['status_label'] = Laporan::statusList('label')[$this->form['status']];
        $this->dt['status_class'] = Laporan::statusList('class')[$this->form['status']];
        // dd($this->all());
    }

    public function render()
    {
        return view('mods.laporan.laporan_detail');
    }
}
