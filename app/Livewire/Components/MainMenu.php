<?php

namespace App\Livewire\Components;

use App\Models\AuthLogin;
use App\Models\Laporan;
use App\Models\Lov;
use App\Models\SpInduk;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class MainMenu extends Component
{
    public $isAdmin = false;
    public $isOperator = false;
    public $isSupervisor = false;
    public $notif = [];

    public function render()
    {
        return view('components.layouts.menu');
    }

    #[On('mainmenu-mount')]
    public function mount()
    {
        if(Auth::user()->role_id == 1){
            $this->isAdmin = true;
        }

        if(Auth::user()->role_id == 2){
            $this->isOperator = true;
        }

        if(Auth::user()->role_id == 3){
            $this->isSupervisor = true;
        }

        $dtLaporan = Laporan::all();

        $this->notif['pengajuan'] = collect($dtLaporan)->where('status',0)->count();
        $this->notif['disetujui'] = collect($dtLaporan)->where('status',1)->count();

        if($this->isOperator){
            $this->notif['tolak'] = collect($dtLaporan)->where('status',2)->where('sekolah_id', Auth::user()->sekolah->id)->count();
        }

        // dump($this->all());
    }


}
