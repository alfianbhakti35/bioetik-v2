<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Assesment') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Assesment</a></div>
            <div class="breadcrumb-item"><a href="{{ route('assesment') }}">Data Assesment</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="assesment" :model="$assesment" />
    </div>
</x-app-layout>
