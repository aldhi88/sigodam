<?php

namespace App\Livewire\Laporan;

use App\Models\Laporan;
use Livewire\Attributes\On;
use Livewire\Component;

class LaporanSetujui extends Component
{
    #[On('laporansetujui-setujui')]
    public function setujui($data)
    {

        Laporan::find($data['id'])->update(['status' => 1]);
        if(isset($data['is_from_detail'])){
            return redirect()->route('laporan.data.admin.disetujui')->with('status', 'Laporan '.$data['attr'].' telah berhasil disetujui');
        }
        $this->dispatch('reloadDT',data:'dtTable');
        $this->dispatch('alert', data:['type' => 'success',  'message' => 'Laporan '.$data['attr'].' telah berhasil disetujui']);
    }
    public function render()
    {
        return <<<'HTML'
        <div>
            {{-- Close your eyes. Count to one. That is how long forever feels. --}}
        </div>
        HTML;
    }
}
