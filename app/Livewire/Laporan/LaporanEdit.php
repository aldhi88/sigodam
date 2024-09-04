<?php

namespace App\Livewire\Laporan;

use App\Models\Laporan;
use App\Models\Sekolah;
use Auth;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class LaporanEdit extends Component
{
    public $dt = [];
    public $form = [];
    public $dtCounter = 0;

    #[On('laporan-create-getdata')]
    public function getData($form)
    {
        $this->form = array_merge($this->form, $form);
        $this->dtCounter++;
        if($this->dtCounter===5){
            $this->processData();
        }
    }

    public function processData()
    {
        Laporan::create($this->form);
        return redirect()->route('laporan.operator.data')->with('status', 'Profile updated!');
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
            ->where('status',1)
            ->orderBy('tgl_laporan', 'desc')
            ->get()->toArray();

        $this->form = [
            'sekolah_id' => $this->dt['sekolah']['id'],
            'tgl_laporan' => Carbon::now()->format('Y-m-d'),
            'data_murid' => null,
            'data_agama' => null,
            'data_usia' => null,
            'data_absen' => null,
            'data_waktu' => null,
            'data_inventaris' => null,
            'data_guru' => null,
            'status' => 0
        ];
    }
    public function render()
    {
        return view('mods.laporan.laporan_edit');
    }
}
