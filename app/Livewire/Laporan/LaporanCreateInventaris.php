<?php

namespace App\Livewire\Laporan;

use App\Models\Sekolah;
use Livewire\Attributes\On;
use Livewire\Component;

class LaporanCreateInventaris extends Component
{
    public $dt = [];
    public $form = [];


    public function initDataInventaris()
    {
        if (count($this->dt['laporan']) == 0) {
            $this->form['data_inventaris']['data'] = [
                'i1a' => 0,
                'i1c_r_kelas' => 0,
                'i1c_r_guru' => 0,
                'i1c_r_uks' => 0,
                'i1c_r_kepsek' => 0,
                'i1c_r_pustaka' => 0,

                'i2a_permanen' => 0,
                'i2a_semi' => 0,
                'i2a_darurat' => 0,
                'i2b_permanen' => 0,
                'i2b_semi' => 0,
                'i2b_darurat' => 0,
                'i2c_permanen' => 0,
                'i2c_semi' => 0,
                'i2c_darurat' => 0,

                'i3a_permanen' => 0,
                'i3a_semi' => 0,
                'i3a_darurat' => 0,
                'i3b_permanen' => 0,
                'i3b_semi' => 0,
                'i3b_darurat' => 0,
                'i3c_permanen' => 0,
                'i3c_semi' => 0,
                'i3c_darurat' => 0,

                'i4a' => 0,
                'i4b' => 0,
                'i4c' => 0,

                'i5a_item' => 0,
                'i5a_luas' => 0,
                'i5a_tahun' => 0,
                'i5b_item' => 0,
                'i5b_luas' => 0,
                'i5b_tahun' => 0,
                'i5c_item' => 0,
                'i5c_luas' => 0,
                'i5c_tahun' => 0,

                'i6' => 'baik',

                'i7_qty' => 0,
                'i7_baik' => 0,
                'i7_rusak' => 0,

                'i8_qty' => 0,
                'i8_baik' => 0,
                'i8_rusak' => 0,

                'i9_qty' => 0,
                'i9_baik' => 0,
                'i9_rusak' => 0,

                'i10a' => "",

                'i11_qty' => 0,
                'i11_baik' => 0,
                'i11_rusak' => 0,

                'ii1_qty' => 0,
                'ii1_baik' => 0,
                'ii1_rusak' => 0,
                'ii2_qty' => 0,
                'ii2_baik' => 0,
                'ii2_rusak' => 0,
                'ii3_qty' => 0,
                'ii3_baik' => 0,
                'ii3_rusak' => 0,
                'ii4_qty' => 0,
                'ii4_baik' => 0,
                'ii4_rusak' => 0,
                'ii5_qty' => 0,
                'ii5_baik' => 0,
                'ii5_rusak' => 0,
                'ii6_qty' => 0,
                'ii6_baik' => 0,
                'ii6_rusak' => 0,
                'ii7_qty' => 0,
                'ii7_baik' => 0,
                'ii7_rusak' => 0,
                'ii8_qty' => 0,
                'ii8_baik' => 0,
                'ii8_rusak' => 0,
                'ii9_qty' => 0,
                'ii9_baik' => 0,
                'ii9_rusak' => 0,
                'ii10_qty' => 0,
                'ii10_baik' => 0,
                'ii10_rusak' => 0,
                'ii11_qty' => 0,
                'ii11_baik' => 0,
                'ii11_rusak' => 0,
                'ii12_qty' => 0,
                'ii12_baik' => 0,
                'ii12_rusak' => 0,
                'ii13_qty' => 0,
                'ii13_baik' => 0,
                'ii13_rusak' => 0,
                'ii14_qty' => 0,
                'ii14_baik' => 0,
                'ii14_rusak' => 0,
                'ii15_qty' => 0,
                'ii15_baik' => 0,
                'ii15_rusak' => 0,
                'ii16_qty' => 0,
                'ii16_baik' => 0,
                'ii16_rusak' => 0,
            ];
        } else {
            $this->form['data_inventaris'] = $this->dt['laporan'][0]['data_inventaris'];
        }
    }

    public function updated($name, $value)
    {

    }

    #[On('laporan-create-inventaris-passdata')]
    public function passData()
    {
        $this->dispatch('laporan-create-getdata', form: ['data_inventaris'=>$this->form['data_inventaris']]);
    }
    public function mount()
    {
        $this->initDataInventaris();
    }
    public function render()
    {
        return view('mods.laporan.laporan_create_inventaris');
    }
}
