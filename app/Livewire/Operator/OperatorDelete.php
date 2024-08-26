<?php

namespace App\Livewire\Operator;

use App\Models\Sekolah;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class OperatorDelete extends Component
{
    #[On('operatordelete-delete')]
    public function delete($data)
    {
        $qSekolah = Sekolah::whereId($data['id'])->first();
        $userId = $qSekolah->user_id;
        $qSekolah->delete();
        User::find($userId)->delete();
        $this->dispatch('reloadDT',data:'dtTable');
        $this->dispatch('alert', data:['type' => 'success',  'message' => 'KHS '.$data['attr'].' telah berhasil dihapus']);
    }

    public function render()
    {
        return <<<'HTML'
        <div>
            {{-- Be like water. --}}
        </div>
        HTML;
    }
}
