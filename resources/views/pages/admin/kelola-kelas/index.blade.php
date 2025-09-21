@extends('layouts.main')

@php
$classes = [
    ['id' => 1, 'kode_kelas' => 'SD-6-PG', 'jenjang' => 'SD', 'kelas' => '6', 'jadwal' => 'Pagi'],
    ['id' => 2, 'kode_kelas' => 'SMP-9-SR', 'jenjang' => 'SMP', 'kelas' => '9', 'jadwal' => 'Sore'],
    ['id' => 3, 'kode_kelas' => 'SMA-12-PG', 'jenjang' => 'SMA', 'kelas' => '12', 'jadwal' => 'Pagi'],
    ['id' => 4, 'kode_kelas' => 'SD-4-SR', 'jenjang' => 'SD', 'kelas' => '4', 'jadwal' => 'Sore'],
    ['id' => 5, 'kode_kelas' => 'SMP-7-PG', 'jenjang' => 'SMP', 'kelas' => '7', 'jadwal' => 'Pagi'],
    ['id' => 6, 'kode_kelas' => 'SMA-11-SR', 'jenjang' => 'SMA', 'kelas' => '11', 'jadwal' => 'Sore'],
    ['id' => 7, 'kode_kelas' => 'SD-5-PG', 'jenjang' => 'SD', 'kelas' => '5', 'jadwal' => 'Pagi'],
    ['id' => 8, 'kode_kelas' => 'SMP-8-SR', 'jenjang' => 'SMP', 'kelas' => '8', 'jadwal' => 'Sore'],
    ['id' => 9, 'kode_kelas' => 'SMA-10-PG', 'jenjang' => 'SMA', 'kelas' => '10', 'jadwal' => 'Pagi'],
];
@endphp

@section('content')
<div class="space-y-6">
    {{-- Breadcrumb --}}
    @include('components.alerts')
    <div class="flex flex-wrap items-center justify-between gap-3">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90">{{ $title }}</h2>
        <nav>
            <ol class="flex items-center gap-1.5">
                <li>
                    <a class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400" href="{{ url('/admin') }}">
                        Admin
                        <svg class="stroke-current" width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.0765 12.667L10.2432 8.50033L6.0765 4.33366" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </a>
                </li>
                <li class="text-sm text-gray-800 dark:text-white/90">{{ $title }}</li>
            </ol>
        </nav>
    </div>

    <!-- Content Start -->
    <div>
        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="flex flex-col justify-between gap-5 border-b border-gray-200 px-5 py-4 sm:flex-row sm:items-center dark:border-gray-800">
                <div>
                    <div class="relative flex-1 sm:flex-auto">
                        <span class="absolute top-1/2 left-4 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                            <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.04199 9.37363C3.04199 5.87693 5.87735 3.04199 9.37533 3.04199C12.8733 3.04199 15.7087 5.87693 15.7087 9.37363C15.7087 12.8703 12.8733 15.7053 9.37533 15.7053C5.87735 15.7053 3.04199 12.8703 3.04199 9.37363ZM9.37533 1.54199C5.04926 1.54199 1.54199 5.04817 1.54199 9.37363C1.54199 13.6991 5.04926 17.2053 9.37533 17.2053C11.2676 17.2053 13.0032 16.5344 14.3572 15.4176L17.1773 18.238C17.4702 18.5309 17.945 18.5309 18.2379 18.238C18.5308 17.9451 18.5309 17.4703 18.238 17.1773L15.4182 14.3573C16.5367 13.0033 17.2087 11.2669 17.2087 9.37363C17.2087 5.04817 13.7014 1.54199 9.37533 1.54199Z" fill=""></path>
                            </svg>
                        </span>
                        <input type="text" placeholder="Search..." class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent py-2.5 pr-4 pl-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden sm:w-[300px] sm:min-w-[300px] dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                    </div>
                </div>
                <div class="flex gap-3">
                    <button class="shadow-theme-xs inline-flex items-center justify-center gap-2 rounded-lg bg-white px-4 py-3 text-sm font-medium text-gray-700 ring-1 ring-gray-300 transition hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700 dark:hover:bg-white/[0.03]">
                        Import
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M16.667 13.3333V15.4166C16.667 16.1069 16.1074 16.6666 15.417 16.6666H4.58295C3.89259 16.6666 3.33295 16.1069 3.33295 15.4166V13.3333M10.0013 13.3333L10.0013 3.33325M6.14547 9.47942L9.99951 13.331L13.8538 9.47942" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                    <a href="{{ url('/kelas/create') }}" class="bg-brand-500 shadow-theme-xs hover:bg-brand-600 inline-flex items-center justify-center gap-2 rounded-lg px-4 py-3 text-sm font-medium text-white transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M5 10.0002H15.0006M10.0002 5V15.0006" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        Tambah Kelas
                    </a>
                </div>
            </div>
            <!-- Table -->
            <div class="custom-scrollbar overflow-x-auto">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="border-b border-gray-200 dark:divide-gray-800 dark:border-gray-800">
                            <th class="w-14 px-5 py-4 text-left">
                            </th>
                            <th class="px-5 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                Kode Kelas
                            </th>
                            <th class="px-5 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                Jenjang
                            </th>
                            <th class="px-5 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                Kelas
                            </th>
                            <th class="px-5 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                Jadwal
                            </th>
                            <th class="px-5 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-x divide-y divide-gray-200 dark:divide-gray-800">
                        @forelse ($classes as $class)
                            <tr class="transition hover:bg-gray-50 dark:hover:bg-gray-900">
                                <td class="w-14 px-5 py-4 whitespace-nowrap">
                                </td>
                                <td class="px-5 py-4 whitespace-nowrap">
                                    <p class="text-sm font-medium text-gray-700 dark:text-gray-400">{{ $class['kode_kelas'] }}</p>
                                </td>
                                <td class="px-5 py-4 whitespace-nowrap">
                                    {{-- Pewarnaan Kondisional untuk Jenjang --}}
                                    @if ($class['jenjang'] == 'SD')
                                        <span class="text-theme-xs rounded-full px-2 py-0.5 font-medium bg-red-50 text-red-700 dark:bg-red-500/15 dark:text-red-500">{{ $class['jenjang'] }}</span>
                                    @elseif ($class['jenjang'] == 'SMP')
                                        <span class="text-theme-xs rounded-full px-2 py-0.5 font-medium bg-blue-light-50 text-blue-light-500 dark:bg-blue-light-500/15 dark:text-blue-light-500">{{ $class['jenjang'] }}</span>
                                    @elseif ($class['jenjang'] == 'SMA')
                                        <span class="text-theme-xs rounded-full px-2 py-0.5 font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">{{ $class['jenjang'] }}</span>
                                    @endif
                                </td>
                                <td class="px-5 py-4 whitespace-nowrap">
                                    <p class="text-sm text-gray-700 dark:text-gray-400">{{ $class['kelas'] }}</p>
                                </td>
                                <td class="px-5 py-4 whitespace-nowrap">
                                    {{-- Pewarnaan Kondisional untuk Jadwal --}}
                                    @if ($class['jadwal'] == 'Pagi')
                                        <span class="text-theme-xs rounded-full px-2 py-0.5 font-medium bg-success-50 text-success-700 dark:bg-success-500/15 dark:text-success-500">{{ $class['jadwal'] }}</span>
                                    @elseif ($class['jadwal'] == 'Sore')
                                        <span class="text-theme-xs rounded-full px-2 py-0.5 font-medium bg-warning-50 text-warning-700 dark:bg-warning-500/15 dark:text-warning-500">{{ $class['jadwal'] }}</span>
                                    @endif
                                </td>
                                <td class="px-5 py-4 whitespace-nowrap">
                                    <div x-data="{ open: false }" class="relative flex justify-start">
                                        <button @click="open = !open" class="text-gray-500 dark:text-gray-400">
                                            <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.99902 10.245C6.96552 10.245 7.74902 11.0285 7.74902 11.995V12.005C7.74902 12.9715 6.96552 13.755 5.99902 13.755C5.03253 13.755 4.24902 12.9715 4.24902 12.005V11.995C4.24902 11.0285 5.03253 10.245 5.99902 10.245ZM17.999 10.245C18.9655 10.245 19.749 11.0285 19.749 11.995V12.005C19.749 12.9715 18.9655 13.755 17.999 13.755C17.0325 13.755 16.249 12.9715 16.249 12.005V11.995C16.249 11.0285 17.0325 10.245 17.999 10.245ZM13.749 11.995C13.749 11.0285 12.9655 10.245 11.999 10.245C11.0325 10.245 10.249 11.0285 10.249 11.995V12.005C10.249 12.9715 11.0325 13.755 11.999 13.755C12.9655 13.755 13.749 12.9715 13.749 12.005V11.995Z" fill=""></path>
                                            </svg>
                                        </button>
                                        <div x-show="open" @click.outside="open = false" class="shadow-theme-lg dark:bg-gray-dark absolute left-0 top-full z-10 mt-2 w-40 space-y-1 rounded-2xl border border-gray-200 bg-white p-2 dark:border-gray-800" style="display: none;">
                                            <button class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                                Edit Kelas
                                            </button>
                                            <button class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                                Hapus Kelas
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-5 py-4 text-center text-gray-500 dark:text-gray-400">
                                    Tidak ada data kelas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Content End -->
</div>
@endsection


