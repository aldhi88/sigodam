<?php

namespace App\Livewire\Sekolah;

use App\Models\Sekolah;
use Livewire\Component;

class SekolahEdit extends Component
{
    public $form = [];
    public $select = [];

    public function submit()
    {
        $data = $this->validate()['form'];
        Sekolah::find($this->form['id'])->update($data);
        $this->dispatch('alert', data:['type' => 'success',  'message' => 'Data berhasil di perbaharui.']);

    }

    public function mount($data)
    {
        $this->form = Sekolah::whereId($data['sekolahId'])
            ->with('users')
            ->first()
            ->toArray();

        $this->select['jenis'] = Sekolah::jenisSekolahList();
        $this->select['status'] = Sekolah::statusSekolahList();
        $this->select['desa'] = Sekolah::statusDesaList();
        $this->select['gugus'] = Sekolah::kategoriGugusList();
        $this->select['bangun'] = Sekolah::statusBangunanList();
        $this->select['kecamatan'] = Sekolah::kecamatanList();
    }

    public function rules()
    {
        return [
            "form.nama_sekolah" => "required",
            "form.jenis_sekolah" => "required",
            "form.status_sekolah" => "required",
            "form.no_agenda" => "required",
            "form.jalan" => "required",
            "form.nama_desa" => "required",
            "form.status_desa" => "required",
            "form.tahun_pendirian" => "required",
            "form.kategori_gugus" => "required",
            "form.jarak_ke_camat" => "required",
            "form.status_bangunan" => "required",
            "form.kecamatan" => "required",
            "form.kanin" => "required",
            "form.penilik" => "required",
            "form.nss" => "required",
            "form.npsn" => "required",
        ];
    }

    protected $validationAttributes = [
        "form.nama_sekolah" => "Nama Sekolah",
        "form.jenis_sekolah" => "Jenis Sekolah",
        "form.status_sekolah" => "Status Sekolah",
        "form.no_agenda" => "No. Agenda",
        "form.jalan" => "Nama Jalan",
        "form.nama_desa" => "Nama Desa",
        "form.status_desa" => "Status Desa",
        "form.tahun_pendirian" => "Tahun Pendirian",
        "form.kategori_gugus" => "Kategori Gugus",
        "form.jarak_ke_camat" => "Jarak ke Kantor Camat",
        "form.status_bangunan" => "Status Bangunan",
        "form.kecamatan" => "Kecamatan",
        "form.kanin" => "KANIN/KANDEP DIKBUD KEC",
        "form.penilik" => "Penilik TK/SD/SLTP",
        "form.nss" => "NSS",
        "form.npsn" => "NPSN",
    ];

    public function render()
    {
        return view('mods.sekolah.sekolah_edit');
    }
}
