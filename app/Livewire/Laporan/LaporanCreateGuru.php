<?php

namespace App\Livewire\Laporan;

use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class LaporanCreateGuru extends Component
{
    public $dt = [];
    public $form = [];
    public $temp = [];

    public function delPegawai($index)
    {
        unset($this->form['data_guru']['data'][$index]);
        $this->form['data_guru']['data'] = array_values($this->form['data_guru']['data']);
    }
    public function addPegawai()
    {
        $this->temp['tgl_lahir'] = Carbon::create($this->temp['tgl_lahir'])->format('d-m-Y');
        $this->temp['tgl_bertugas'] = Carbon::create($this->temp['tgl_bertugas'])->format('d-m-Y');
        $this->temp['istri_suami'] = 1;
        $this->temp['anak'] = 0;
        $this->temp['sakit'] = 0;
        $this->temp['izin'] = 0;
        $this->temp['alpa'] = 0;
        $this->temp['jlh'] = 0;
        $this->temp['gol_thn'] = 0;
        $this->temp['gol_bln'] = 0;
        $this->temp['all_thn'] = 0;
        $this->temp['all_bln'] = 0;
        $this->form['data_guru']['data'][] = $this->temp;
        $this->initDataTemp();
    }

    public function initDataTemp(){
        $this->temp = [
            'nip' => null,
            'nama' => null,
            'tempat_lahir' => null,
            'tgl_lahir' => null,
            'gender' => null,
            'ijazah' => null,
            'jabatan' => null,
            'tgl_bertugas' => null,
            'no_sk' => null,
            'no_sk_akhir' => null,
            'golongan' => null,
            'jam' => null,
            'gaji' => null,
            'agama' => null,
            'ket' => null,
        ];
    }
    public function initDataGuru()
    {
        if (count($this->dt['laporan']) == 0) {
            $this->form['data_guru']['data'] = [];
        } else {
            $this->form['data_guru'] = $this->dt['laporan'][0]['data_guru'];
        }
    }

    public function updated($name, $value)
    {
        // dump($this->form);
    }

    #[On('laporan-create-guru-passdata')]
    public function passData()
    {
        $this->dispatch('laporan-create-getdata', form: ['data_guru'=>$this->form['data_guru']]);
    }
    public function mount()
    {
        $this->initDataGuru();
        $this->initDataTemp();
    }
    public function render()
    {
        return view('mods.laporan.laporan_create_guru');
    }
}
