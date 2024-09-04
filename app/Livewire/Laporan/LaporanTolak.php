<?php

namespace App\Livewire\Laporan;

use App\Models\Laporan;
use Livewire\Attributes\On;
use Livewire\Component;

class LaporanTolak extends Component
{
    #[On('laporantolak-tolak')]
    public function tolak($data)
    {
        Laporan::find($data['id'])->update(['status' => 2]);
        $this->dispatch('alert', data:['type' => 'success',  'message' => 'Laporan '.$data['attr'].' telah berhasil ditolak']);
        if(!isset($data['is_from_detail'])){
            $this->dispatch('reloadDT',data:'dtTable');
        }else{
            $this->dispatch('laporandetail-refreshPage');
        }
    }
    public function render()
    {
        return <<<'HTML'
        <div>
            {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
        </div>
        HTML;
    }
}
