<?php

namespace App\Livewire\Auth;

use App\Models\Role;
use App\Models\User;
use Auth;
use Hash;
use Livewire\Component;

class FormLogin extends Component
{
    public $roles = [];
    public $valid = [];

    public function rules()
    {
        return [
            "valid.username" => "required",
            "valid.password" => "required",
            "valid.role_id" => "required",
        ];
    }

    protected $validationAttributes = [
        "valid.username" => "Username",
        "valid.password" => "Password",
        "valid.role_id" => "Role",
    ];

    public function mount()
    {
        $this->roles = Role::all()->toArray();
    }

    public function login()
    {
        $credentials = $this->validate()['valid'];

        if (Auth::attempt($credentials)) {
            return redirect()->route('anchor');
        }

        session()->flash('message', 'Data login anda tidak ditemukan');

        // $q = User::query()
        //     ->where('username', $data['username'])
        //     ->where('role_id', $data['role_id'])
        //     ->first();

        // if ($q && Hash::check($data['password'], $q->password)) {
        //     Auth::loginUsingId($q[0]['id']);
        //     return redirect()->route('anchor');
        // } else {
        //     session()->flash('message', 'Data login anda tidak ditemukan');
        // }

    }



    public function render()
    {
        return view('mods.auth.form_login');
    }
}
