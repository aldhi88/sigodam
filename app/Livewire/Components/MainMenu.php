<?php

namespace App\Livewire\Components;

use App\Models\AuthLogin;
use App\Models\Lov;
use App\Models\SpInduk;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class MainMenu extends Component
{

    public function render()
    {
        return view('components.layouts.menu');
    }

    #[On('mainmenu-mount')]
    public function mount()
    {

    }


}
