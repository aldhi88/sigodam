<?php

namespace App\Livewire\Operator;

use App\Models\Sekolah;
use App\Models\User;
use Hash;
use Livewire\Component;

class OperatorCreate extends Component
{
    public $form = [];
    public $jenisSekolah = [];

    public function rules()
    {
        return [
            "form.username" => "required|unique:users,username",
            "form.password" => "required|min:5",
            "form.nickname" => "required",
            "form.jenis_sekolah" => "required",
            "form.nama_sekolah" => "required|unique:sekolah,nama_sekolah,NULL,id,deleted_at,NULL",
        ];
    }

    protected $validationAttributes = [
        "form.username" => "Username",
        "form.password" => "Password",
        "form.nickname" => "Nama Operator",
        "form.jenis_sekolah" => "Jenis Sekolah",
        "form.nama_sekolah" => "Nama Sekolah",
    ];

    public function submit()
    {
        $data = $this->validate()['form'];

        $qUser = User::create([
            'role_id' => 2,
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'nickname' => $data['nickname'],
        ]);

        Sekolah::create([
            'user_id' => $qUser->id,
            'nama_sekolah' => $data['nama_sekolah'],
            'jenis_sekolah' => $data['jenis_sekolah']
        ]);

        $this->dispatch('alert', data:['type' => 'success',  'message' => 'Data berhasil di perbaharui.']);
        $this->resetForm();
    }

    public function mount()
    {
        $this->jenisSekolah = Sekolah::jenisSekolahList();
    }

    public function resetForm()
    {
        $this->form = [];
    }

    public function render()
    {
        return view('mods.operator.operator_create');
    }
}
