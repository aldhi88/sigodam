

@extends('components.layouts.app',["data" => $data])

@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">{{$data['title']}}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">{{$data['title']}}</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col">

        @livewire('laporan.'.$data['page'], ['data'=>$data])

        @if ($data['page']=='laporan-data-operator')
            @livewire('components.modal-confirm')
            @livewire('laporan.laporan-delete')
        @endif
        @if ($data['page']=='laporan-data-admin-pengajuan')
            @livewire('components.modal-confirm')
            @livewire('laporan.laporan-setujui')
            @livewire('laporan.laporan-tolak')
        @endif
        @if ($data['page']=='laporan-detail')
            @livewire('components.modal-confirm')
            @livewire('laporan.laporan-setujui')
            @livewire('laporan.laporan-tolak')
        @endif

    </div>
</div>

@endsection
