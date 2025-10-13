@php
    $siswa = [
        [
            'id' => 1,
            'nama_siswa' => 'Badzlan Nur',
            'kelas' => 'Kelas 9A',
            'asal_sekolah' => 'SMPN 1 Bogor',
            'tanggal_masuk' => '12 Oktober 2025',
        ],
        [
            'id' => 2,
            'nama_siswa' => 'Budi Santoso',
            'kelas' => 'Kelas 11 IPA 2',
            'asal_sekolah' => 'SMAN 3 Jakarta',
            'tanggal_masuk' => '15 Juli 2024',
        ],
        [
            'id' => 3,
            'nama_siswa' => 'Citra Lestari',
            'kelas' => 'Kelas 6B',
            'asal_sekolah' => 'SDN 5 Pagi',
            'tanggal_masuk' => '20 Agustus 2025',
        ],
        [
            'id' => 4,
            'nama_siswa' => 'Dewi Anggraini',
            'kelas' => 'Kelas 8C',
            'asal_sekolah' => 'SMP Tunas Bangsa',
            'tanggal_masuk' => '01 September 2024',
        ],
        [
            'id' => 5,
            'nama_siswa' => 'Eko Prasetyo',
            'kelas' => 'Kelas 12 IPS 1',
            'asal_sekolah' => 'SMA Harapan Kita',
            'tanggal_masuk' => '10 Juli 2023',
        ],
    ];
@endphp

@extends('layouts.main')

@section('content')
    @include('components.alerts')
    @include('components.breadcrumb')

    <div class="mt-6 overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div
            class="grid grid-cols-1 gap-5 border-b border-gray-200 px-5 py-4 sm:flex-row lg:items-center dark:border-gray-800">
            <div class="relative">
                <div class="col-span-full">
                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-3">
                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Tahun
                            </label>
                            <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                                <select
                                    class="h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 shadow-theme-xs focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800"
                                    :class="isOptionSelected && 'text-gray-800 dark:text-white/90'"
                                    @change="isOptionSelected = true">
                                    <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                        Pilih Tahun
                                    </option>
                                    <option value="2025" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400"
                                        selected>
                                        2025
                                    </option>
                                    <option value="2024" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                        2024
                                    </option>
                                </select>
                                <span
                                    class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-700 dark:text-gray-400">
                                    <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke=""
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Bulan
                            </label>
                            <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                                <select
                                    class="h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 shadow-theme-xs focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800"
                                    :class="isOptionSelected && 'text-gray-800 dark:text-white/90'"
                                    @change="isOptionSelected = true">
                                    <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                        Pilih Bulan
                                    </option>
                                    <option value="Oktober" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400"
                                        selected>
                                        Oktober
                                    </option>
                                    <option value="September"
                                        class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                        September
                                    </option>
                                </select>
                                <span
                                    class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-700 dark:text-gray-400">
                                    <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke=""
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Kelas
                            </label>
                            <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                                <select
                                    class="h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 shadow-theme-xs focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800"
                                    :class="isOptionSelected && 'text-gray-800 dark:text-white/90'"
                                    @change="isOptionSelected = true">
                                    <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                        Pilih Kelas
                                    </option>
                                    <option value="Kelas 9A" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400"
                                        selected>
                                        Kelas 9A
                                    </option>
                                    <option value="Kelas 6B"
                                        class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                        Kelas 6B
                                    </option>
                                </select>
                                <span
                                    class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-700 dark:text-gray-400">
                                    <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke=""
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="custom-scrollbar overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="border-b border-gray-200 dark:border-gray-800 dark:divide-gray-800">
                        <th class="w-14 px-5 py-4 text-left">
                        </th>
                        <th class="w-64 p-4 text-left text-xs font-medium whitespace-nowrap text-gray-500 dark:text-gray-400">
                            Nama Siswa
                        </th>
                        <th class="bg-success-50 p-4 text-center text-xs font-medium text-success-700 whitespace-nowrap dark:bg-success-500/10 dark:text-success-400">
                            Hadir
                        </th>
                        <th class="bg-warning-50 p-4 text-center text-xs font-medium text-warning-700 whitespace-nowrap dark:bg-warning-500/10 dark:text-warning-400">
                            Sakit
                        </th>
                        <th class="bg-blue-light-50 p-4 text-center text-xs font-medium text-primary-700 whitespace-nowrap dark:bg-blue-500/10 dark:text-blue-400">
                            Izin
                        </th>
                        <th class="bg-red-50 p-4 text-center text-xs font-medium text-red-700 whitespace-nowrap dark:bg-red-500/10 dark:text-red-400">
                            Alpa
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                    @foreach ($siswa as $murid)
                        @php
                            $statuses = ['H', 'S', 'I', 'A'];
                            $randomStatus = $statuses[array_rand($statuses)];
                        @endphp
                        <tr class="transition hover:bg-gray-50 dark:hover:bg-gray-900">
                            <td class="w-14 px-5 py-4 whitespace-nowrap">
                            </td>
                            <td class="p-4 whitespace-nowrap">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-400">
                                    {{ $murid['nama_siswa'] }}
                                </span>
                            </td>
                            <td class="bg-success-50 p-4 text-center whitespace-nowrap dark:bg-success-500/10">
                                <input type="radio" name="attendance[{{ $murid['id'] }}]" value="H"
                                    @if ($randomStatus == 'H') checked @endif
                                    class="h-4 w-4 rounded-full border-gray-300 text-success-600 focus:ring-success-500">
                            </td>
                            <td class="bg-warning-50 p-4 text-center whitespace-nowrap dark:bg-warning-500/10">
                                <input type="radio" name="attendance[{{ $murid['id'] }}]" value="S"
                                    @if ($randomStatus == 'S') checked @endif
                                    class="h-4 w-4 rounded-full border-gray-300 text-warning-600 focus:ring-warning-500">
                            </td>
                            <td class="bg-blue-light-50 p-4 text-center whitespace-nowrap dark:bg-blue-500/10">
                                <input type="radio" name="attendance[{{ $murid['id'] }}]" value="I"
                                    @if ($randomStatus == 'I') checked @endif
                                    class="h-4 w-4 rounded-full border-gray-300 text-blue-light-600 focus:ring-blue-500">
                            </td>
                            <td class="bg-red-50 p-4 text-center whitespace-nowrap dark:bg-red-500/10">
                                <input type="radio" name="attendance[{{ $murid['id'] }}]" value="A"
                                    @if ($randomStatus == 'A') checked @endif
                                    class="h-4 w-4 rounded-full border-gray-300 text-red-600 focus:ring-red-500">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

