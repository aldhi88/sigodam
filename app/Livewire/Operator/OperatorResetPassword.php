<?php

namespace App\Livewire\Operator;

use App\Models\User;
use Hash;
use Livewire\Attributes\On;
use Livewire\Component;

class OperatorResetPassword extends Component
{
    public $form = [];
    public $dtJson = [];

    public function rules()
    {
        return [
            "form.password" => "required|min:5",
        ];
    }

    protected $validationAttributes = [
        "form.password" => "Password",
    ];

    public function mount($data)
    {
        $qUser = User::find($data['operatorId'])->toArray();
        $this->form['username'] = $qUser['username'];

        $this->dtJson['msg'] = 'melakukan reset data password untuk Operator '.$this->form['username'];
        $this->dtJson['attr'] = $this->form['username'];
        $this->dtJson['id'] = $qUser['id'];
        $this->dtJson['callback'] = "operatorresetpassword-resetPassword";
        $this->dtJson = json_encode($this->dtJson);
    }

    public function submit()
    {
        $this->validate()['form'];
        $this->dispatch('showModal', data:$this->dtJson);
    }

    #[On('operatorresetpassword-resetPassword')]
    public function resetPassword($data)
    {
        User::find($data['id'])->update(['password' => Hash::make($this->form['password'])]);
        $this->dispatch('alert', data:['type' => 'success',  'message' => 'Password berhasil direset']);
        $this->form['password'] = "";
    }

    public function resetForm()
    {
        $this->mount($data);

    }

    public function render()
    {
        return view('mods.operator.operator_reset_password');
    }
}
