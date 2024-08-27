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
        User::find($data['id'])->delete();
        Sekolah::where('user_id', $data['id'])->delete();
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
