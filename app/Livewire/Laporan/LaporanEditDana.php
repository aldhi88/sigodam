<?php

namespace App\Livewire\Laporan;

use Livewire\Attributes\On;
use Livewire\Component;

class LaporanEditDana extends Component
{
    public $dt = [];
    public $form = [];


    public function initDataDana()
    {
        if (count($this->dt['laporan']) == 0) {
            $this->form['data_dana']['data'] = [
                'sbpp_terima' => 0,
                'sbpp_keluar' => 0,
                'op_terima' => 0,
                'op_keluar' => 0,
                'bp3_terima' => 0,
                'bp3_keluar' => 0,
            ];
        } else {
            $this->form['data_dana'] = $this->dt['laporan'][0]['data_dana'];
        }
    }

    public function updated($name, $value)
    {

    }

    #[On('laporan-create-dana-passdata')]
    public function passData()
    {
        $this->dispatch('laporan-create-getdata', form: ['data_dana'=>$this->form['data_dana']]);
    }
    public function mount()
    {
        // dump(0);
        // $this->dt['jlh_kelas'] = Sekolah::jlhKelas($this->dt['sekolah']['jenis_sekolah']);
        // $this->dt['angkaRomawi'] = Sekolah::kelasRomawiList();
        $this->initDataDana();
    }
    public function render()
    {
        return view('mods.laporan.laporan_edit_dana');
    }
}
