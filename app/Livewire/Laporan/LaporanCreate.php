<?php

namespace App\Livewire\Laporan;

use App\Models\Laporan;
use App\Models\Sekolah;
use Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class LaporanCreate extends Component
{
    public $dt = [];
    public $form = [];

    #[On('laporan-create-getdata')]
    public function getData($form)
    {
        $this->form = array_merge($this->form, $form);
        $this->processData();
    }

    public function processData()
    {
        dump($this->all());
    }

    public function submit()
    {
        $this->dispatch('laporan-create-murid-passdata');
        $this->dispatch('laporan-create-agama-passdata');
        $this->dispatch('laporan-create-usia-passdata');
        $this->dispatch('laporan-create-absen-passdata');
        $this->dispatch('laporan-create-waktu-passdata');
    }

    public function mount()
    {
        $this->dt['sekolah'] = Sekolah::where('user_id', Auth::id())
            ->first()
            ->toArray();
        $this->dt['laporan'] = Laporan::where('sekolah_id', $this->dt['sekolah']['id'])
            ->orderBy('bulan', 'desc')
            ->get()->toArray();
    }

    public function render()
    {
        return view('mods.laporan.laporan_create');
    }
}
