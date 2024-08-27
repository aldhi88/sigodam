<?php

namespace App\Livewire\Sekolah;

use App\Models\Sekolah;
use Livewire\Component;

class SekolahData extends Component
{
    public $select = [];

    public function mount()
    {
        $this->select['jenis'] = Sekolah::jenisSekolahList();
        $this->select['status'] = Sekolah::statusSekolahList();
        $this->select['desa'] = Sekolah::statusDesaList();
        $this->select['gugus'] = Sekolah::kategoriGugusList();
        $this->select['bangun'] = Sekolah::statusBangunanList();
        $this->select['kecamatan'] = Sekolah::kecamatanList();
    }

    public function render()
    {
        return view('mods.sekolah.sekolah_data');
    }
}
