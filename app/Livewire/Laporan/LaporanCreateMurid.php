<?php

namespace App\Livewire\Laporan;

use App\Models\Sekolah;
use Livewire\Attributes\On;
use Livewire\Component;

class LaporanCreateMurid extends Component
{
    public $dt = [];
    public $form = [];

    #[On('laporan-create-murid-passdata')]
    public function passData()
    {
        $this->dispatch('laporan-create-getdata', form: $this->form);
    }

    public function initDataMurid()
    {
        $fields = [
            'murid_mengulang',
            'murid_bulan_lalu',
            'pindah',
            'putus',
            'mati',
            'masuk',
            'naik',
            'tidak_naik',
            'kelas'
        ];

        if (count($this->dt['laporan']) == 0) {
            foreach ($fields as $field) {
                for ($i = 1; $i <= $this->dt['jlh_kelas']; $i++) {
                    if($field=='kelas'){
                        $this->form['data_murid']['data'][$field][$i - 1] = ['jlh' => 0];
                    }else{
                        $this->form['data_murid']['data'][$field][$i - 1] = ['l' => 0, 'p' => 0];
                    }
                }
            }
        } else {
            $this->form['data_murid'] = $this->dt['laporan'][0]['data_murid'];
        }
    }

    public function reCountDataMurid()
    {
        $collection = collect($this->form['data_murid']['data']);
        $total = collect($collection->get('murid_mengulang'))
            ->zip(
                collect($collection->get('murid_bulan_lalu')),
                collect($collection->get('pindah')),
                collect($collection->get('putus')),
                collect($collection->get('mati')),
                collect($collection->get('masuk')),
                collect($collection->get('naik')),
                collect($collection->get('tidak_naik'))
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
        $this->form['data_murid']['total'] = $result;
    }

    public function updated($name, $value)
    {
        $this->reCountDataMurid();
    }

    public function mount()
    {
        $this->dt['jlh_kelas'] = Sekolah::jlhKelas($this->dt['sekolah']['jenis_sekolah']);
        $this->dt['angkaRomawi'] = Sekolah::kelasRomawiList();
        $this->initDataMurid();
        $this->reCountDataMurid();
    }
    public function render()
    {
        return view('mods.laporan.laporan_create_murid');
    }
}
