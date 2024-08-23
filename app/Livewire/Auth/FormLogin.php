<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class FormLogin extends Component
{
    public $roles = [];
    public $eyeIcon = 'eye-close-fill';
    public $seePass = 'password';

    #[Rule('', as:'Login Sebagai')]
    public $auth_role_id;

    #[Rule('required|min:4', as:'ID Login')]
    public $username;

    #[Rule('required|min:5', as:'Kata Sandi')]
    public $password;

    public function render()
    {
        return view('mods.auth.form_login');
    }
}
