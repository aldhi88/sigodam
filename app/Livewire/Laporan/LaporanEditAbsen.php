<?php

namespace App\Livewire\Laporan;

use Livewire\Component;
use Livewire\Attributes\On;

class LaporanEditAbsen extends Component
{
    public $dt = [];
    public $form = [];

    #[On('laporan-create-absen-passdata')]
    public function passData()
    {
        $this->dispatch('laporan-create-getdata', form: ['data_absen'=>$this->form['data_absen']]);
    }

    public function initDataAbsen()
    {
        $this->dt['hari'] = 14;
        $fields = [
            'sakit',
            'izin',
            'alpa',
        ];

        if (count($this->dt['laporan']) == 0) {
            foreach ($fields as $field) {
                $this->form['data_absen']['data'][$field] = 0;
            }
        } else {
            $this->form['data_absen'] = $this->dt['laporan'][0]['data_absen'];
        }
    }

    public function reCountDataAbsen()
    {
        $this->form['data_absen']['total'] = collect($this->form['data_absen']['data'])->sum();
    }

    public function updated($name, $value)
    {
        $value = $value==""?0:$value;
        $value = (int)$value;
        $parts = explode(".", $name);
        $keyName = $parts[3];
        $this->form['data_absen']['data'][$keyName] = $value;

        $this->reCountDataAbsen();
        if($this->form['data_absen']['total']>$this->dt['hari']){
            $this->form['data_absen']['data'][$keyName] = 0;
        }
    }

    public function mount()
    {
        $this->initDataAbsen();
        $this->reCountDataAbsen();
    }
    public function render()
    {
        return view('mods.laporan.laporan_edit_absen');
    }
}
