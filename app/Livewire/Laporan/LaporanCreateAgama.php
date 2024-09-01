<?php

namespace App\Livewire\Laporan;

use App\Models\Sekolah;
use Livewire\Attributes\On;
use Livewire\Component;

class LaporanCreateAgama extends Component
{
    public $dt = [];
    public $form = [];

    public function initDataAgama()
    {
        $fields = [
            'islam',
            'katolik',
            'protestan',
            'hindu',
            'budha',
        ];

        if (count($this->dt['laporan']) == 0) {
            foreach ($fields as $field) {
                for ($i = 1; $i <= $this->dt['jlh_kelas']; $i++) {
                    if($field=='kelas'){
                        $this->form['data_agama']['data'][$field][$i - 1] = ['jlh' => 0];
                    }else{
                        $this->form['data_agama']['data'][$field][$i - 1] = ['l' => 0, 'p' => 0];
                    }
                }
            }
        } else {
            $this->form['data_agama'] = $this->dt['laporan'][0]['data_agama'];
        }
    }

    public function reCountDataAgama()
    {
        $collection = collect($this->form['data_agama']['data']);
        $total = collect($collection->get('islam'))
            ->zip(
                collect($collection->get('katolik')),
                collect($collection->get('protestan')),
                collect($collection->get('hindu')),
                collect($collection->get('budha')),
            )
            ->map(function ($items) {
                $total_l = 0;
                $total_p = 0;
                foreach ($items as $item) {
                    $total_l += $item['l'];
                    $total_p += $item['p'];
                }
                return [
                    'l' => $total_l,
                    'p' => $total_p,
                    'lp' => $total_l+$total_p
                ];
            });

        $result = ['jlh_bulan_ini' => $total->toArray()];
        $this->form['data_agama']['total'] = $result;
    }

    #[On('laporan-create-agama-passdata')]
    public function passData()
    {
        $this->dispatch('laporan-create-getdata', form: $this->form);
    }

    public function updated($name, $value)
    {
        $this->reCountDataAgama();
    }

    public function mount()
    {
        $this->dt['jlh_kelas'] = Sekolah::jlhKelas($this->dt['sekolah']['jenis_sekolah']);
        $this->dt['angkaRomawi'] = Sekolah::kelasRomawiList();
        $this->initDataAgama();
        $this->reCountDataAgama();
    }
    public function render()
    {
        return view('mods.laporan.laporan_create_agama');
    }
}
