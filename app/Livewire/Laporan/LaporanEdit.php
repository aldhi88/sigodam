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
        if($this->dtCounter===8){
            $this->processData();
        }
    }

    public function processData()
    {
        // dd($this->all());
        Laporan::find($this->dt['laporan'][0]['id'])->update($this->form);
        return redirect()->route('laporan.data.operator')->with('status', 'Laporan baru berhasil diperbaharui');
    }

    public function submit()
    {
        $this->dispatch('laporan-create-murid-passdata');
        $this->dispatch('laporan-create-agama-passdata');
        $this->dispatch('laporan-create-absen-passdata');
        $this->dispatch('laporan-create-waktu-passdata');
        $this->dispatch('laporan-create-usia-passdata');
        $this->dispatch('laporan-create-inventaris-passdata');
        $this->dispatch('laporan-create-dana-passdata');
        $this->dispatch('laporan-create-guru-passdata');
    }

    public function mount($data)
    {
        $this->dt['sekolah'] = Sekolah::where('user_id', Auth::id())
            ->first()
            ->toArray();
        $this->dt['laporan'] = Laporan::whereId($data['id'])
            ->get()->toArray();

        $this->form = [
            'sekolah_id' => $this->dt['sekolah']['id'],
            'tgl_laporan' => $this->dt['laporan'][0]['tgl_laporan'],
            'data_murid' => null,
            'data_agama' => null,
            'data_absen' => null,
            'data_waktu' => null,
            'data_usia' => null,
            'data_inventaris' => null,
            'data_dana' => null,
            'data_guru' => null,
            'status' => 0
        ];
    }
    public function render()
    {
        return view('mods.laporan.laporan_edit');
    }
}
