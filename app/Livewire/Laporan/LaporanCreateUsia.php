<?php

namespace App\Livewire\Laporan;

use App\Models\Sekolah;
use Livewire\Component;

class LaporanCreateUsia extends Component
{
    public $dt = [];
    public $form = [];

    public function initDataUsia()
    {
        $fields = [
            'kecil_7',
            '7_12',
            '13_15',
            'besar_16',
        ];

        if (count($this->dt['laporan']) == 0) {
            foreach ($fields as $field) {
                for ($i = 1; $i <= $this->dt['jlh_kelas']; $i++) {
                    if($field=='kelas'){
                        $this->form['data_usia']['data'][$field][$i - 1] = ['jlh' => 0];
                    }else{
                        $this->form['data_usia']['data'][$field][$i - 1] = ['l' => 1, 'p' => 0];
                    }
                }
            }
        } else {
            $this->form['data_usia'] = $this->dt['laporan'][0]['data_usia'];
        }
    }

    public function reCountDataUsia()
    {
        $collection = collect($this->form['data_usia']['data']);
        $total = collect($collection->get('kecil_7'))
            ->zip(
                collect($collection->get('7_12')),
                collect($collection->get('13_15')),
                collect($collection->get('besar_16')),
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

        $result = ['jumlah' => $total->toArray()];
        $this->form['data_usia']['total'] = $result;
    }

    #[On('laporan-create-usia-passdata')]
    public function passData()
    {
        $this->dispatch('laporan-create-getdata', form: $this->form);
    }

    public function updated($name, $value)
    {
        $this->reCountDataUsia();
    }

    public function mount()
    {
        $this->dt['jlh_kelas'] = Sekolah::jlhKelas($this->dt['sekolah']['jenis_sekolah']);
        $this->dt['angkaRomawi'] = Sekolah::kelasRomawiList();
        $this->initDataUsia();
        $this->reCountDataUsia();
    }

    public function render()
    {
        return view('mods.laporan.laporan_create_usia');
    }
}
