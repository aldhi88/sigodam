<?php

namespace App\Livewire\Laporan;

use App\Models\Laporan;
use Livewire\Attributes\On;
use Livewire\Component;

class LaporanDelete extends Component
{
    #[On('laporandelete-delete')]
    public function delete($data)
    {
        Laporan::find($data['id'])->delete();
        $this->dispatch('reloadDT',data:'dtTable');
        $this->dispatch('alert', data:['type' => 'success',  'message' => 'Laporan '.$data['attr'].' telah berhasil dihapus']);
    }

    public function render()
    {
        return <<<'HTML'
        <div>
            {{-- The best athlete wants his opponent at his best. --}}
        </div>
        HTML;
    }
}
