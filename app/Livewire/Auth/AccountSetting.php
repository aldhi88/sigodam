<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Auth;
use Hash;
use Livewire\Component;

class AccountSetting extends Component
{
    public $account = [];
    public $form = [];

    public function rules()
    {
        return [
            "form.nickname" => "required",
            "form.password" => "",
            "form.old_pass" => "",
        ];
    }

    protected $validationAttributes = [
        "form.nickname" => "Nama Pengguna",
        "form.old_pass" => "Password Lama",
        "form.password" => "Password Baru",
    ];

    public function mount()
    {
        $this->form['nickname'] = Auth::user()->nickname;
        $this->form['old_pass'] = null;
        $this->form['password'] = null;
    }

    public function submit()
    {
        $data = $this->validate()['form'];

        if(!is_null($data["password"])){
            $this->validate([
                "form.old_pass" => [
                    "required",
                    function ($attribute, $value, $fail) use($data){
                        if(!Hash::check($data['old_pass'], Auth::user()->password)){
                            return $fail('Password lama tidak sesuai.');
                        }
                    },
                ],
                "form.password" => "min:5|different:form.old_pass",
            ]);

            $data['password'] = Hash::make($data['password']);
        }else{
            unset($data['password']);
        }

        unset($data['old_pass']);
        User::find(Auth::id())->update($data);
        $this->dispatch('alert', data:['type' => 'success',  'message' => 'Data berhasil di perbaharui.']);
        $this->dispatch('topmenu-mount');
        $this->form['old_pass'] = null;
        $this->form['password'] = null;
    }

    public function resetForm()
    {
        $this->mount();
    }

    public function render()
    {
        return view('mods.auth.account_setting');
    }
}
