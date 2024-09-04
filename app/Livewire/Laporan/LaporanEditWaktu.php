<?php

namespace App\Livewire\Laporan;

use Livewire\Component;
use Livewire\Attributes\On;

class LaporanEditWaktu extends Component
{
    public $dt = [];
    public $form = [];

    #[On('laporan-create-waktu-passdata')]
    public function passData()
    {
        $this->dispatch('laporan-create-getdata', form: ['data_waktu'=>$this->form['data_waktu']]);
    }

    public function initDataWaktu()
    {
        $fields = [
            'pagi',
            'sore',
            'pagi_sore',
        ];

        if (count($this->dt['laporan']) == 0) {
            foreach ($fields as $field) {
                $this->form['data_waktu']['data'][$field] = false;
            }
        } else {
            $this->form['data_waktu'] = $this->dt['laporan'][0]['data_waktu'];
        }
    }

    public function updated($name, $value)
    {
        // dd($this->form);
    }

    public function mount()
    {
        $this->initDataWaktu();
    }
    public function render()
    {
        return view('mods.laporan.laporan_edit_waktu');
    }
}
