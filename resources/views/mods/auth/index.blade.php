@extends('components.layouts.auth', ['data' => $data])

@section('content')
    @livewire('auth.'.$data['page'])
    {{-- @if ($data['page'] == 'login')

        @livewire('auth.form-login')

    @elseif ($data['page'] == 'register')

        @livewire('auth.form-register')

    @elseif ($data['page'] == 'forgot')

        @livewire('auth.form-forgot')

    @else --}}

    {{-- @endif --}}
@endsection
