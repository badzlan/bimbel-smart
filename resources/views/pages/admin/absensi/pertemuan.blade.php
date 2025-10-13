@extends('layouts.main')

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
                                    <option value="September" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
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
                                    <option value="Kelas 6B" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
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
            <div class="p-4 space-y-8 border-t border-gray-200 mt-7 dark:border-gray-800 sm:mt-0 xl:p-6">
                <div class="flex flex-col gap-4 swim-lane">

                    @for ($i = 7; $i >= 1; $i--)
                    <!-- task item -->
                    <div
                        class="p-5 bg-white border border-gray-200 task rounded-xl shadow-theme-sm dark:border-gray-800 dark:bg-white/5">
                        <div class="flex flex-col gap-5 xl:flex-row xl:items-center xl:justify-between">
                            <div class="flex items-start w-full gap-4">
                                <span class="text-gray-400">
                                    {{-- <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.5 16C10.5 15.1716 11.1716 14.5 12 14.5C12.8284 14.5 13.5 15.1716 13.5 16V17.5C13.5 18.3284 12.8284 19 12 19C11.1716 19 10.5 18.3284 10.5 17.5V16Z" fill="#323544"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.75 7.25C6.75 4.3505 9.10051 2 12 2C14.8995 2 17.25 4.35051 17.25 7.25V9.125H18.5C19.7426 9.125 20.75 10.1324 20.75 11.375V17.2495C20.75 19.8729 18.6234 21.9995 16 21.9995H8C5.37665 21.9995 3.25 19.8729 3.25 17.2495V11.375C3.25 10.1324 4.25736 9.125 5.5 9.125H6.75V7.25ZM8.25 9.125H15.75V7.25C15.75 5.17893 14.0711 3.5 12 3.5C9.92893 3.5 8.25 5.17893 8.25 7.25V9.125ZM5.5 10.625C5.08579 10.625 4.75 10.9608 4.75 11.375V17.2495C4.75 19.0444 6.20507 20.4995 8 20.4995H16C17.7949 20.4995 19.25 19.0444 19.25 17.2495V11.375C19.25 10.9608 18.9142 10.625 18.5 10.625H5.5Z" fill="#323544"/>
                                    </svg> --}}
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.5 16C10.5 15.1716 11.1716 14.5 12 14.5C12.8284 14.5 13.5 15.1716 13.5 16V17.5C13.5 18.3284 12.8284 19 12 19C11.1716 19 10.5 18.3284 10.5 17.5V16Z" fill="#323544"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C9.10051 2 6.75 4.35051 6.75 7.25V9.125H5.5C4.25736 9.125 3.25 10.1324 3.25 11.375V17.2495C3.25 19.8729 5.37665 21.9995 8 21.9995H16C18.6234 21.9995 20.75 19.8729 20.75 17.2495V11.375C20.75 10.1324 19.7426 9.125 18.5 9.125H8.25V7.25C8.25 5.17893 9.92893 3.5 12 3.5C13.4184 3.5 14.6541 4.28724 15.2919 5.45221C15.4909 5.81553 15.9466 5.9488 16.31 5.74987C16.6733 5.55095 16.8066 5.09516 16.6076 4.73184C15.7172 3.10553 13.9882 2 12 2ZM7.47268 10.625C7.48175 10.6253 7.49085 10.6255 7.5 10.6255C7.50915 10.6255 7.51825 10.6253 7.52732 10.625H18.5C18.9142 10.625 19.25 10.9608 19.25 11.375V17.2495C19.25 19.0444 17.7949 20.4995 16 20.4995H8C6.20507 20.4995 4.75 19.0444 4.75 17.2495V11.375C4.75 10.9608 5.08579 10.625 5.5 10.625H7.47268Z" fill="#323544"/>
                                    </svg>
                                </span>
                                <p class="-mt-0.5 text-base text-gray-800 dark:text-white/90">
                                    Pertemuan {{ $i }}
                                </p>

                            </div>

                            <div
                                class="flex flex-col-reverse items-start justify-end w-full gap-3 xl:flex-row xl:items-center xl:gap-5">

                                <div class="flex items-center justify-between w-full gap-5 xl:w-auto xl:justify-normal">
                                    <div class="flex items-center gap-3">

                                        <span
                                            class="flex items-center gap-1 text-sm text-gray-500 cursor-pointer dark:text-gray-400">
                                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M21.0791 12.519C21.0744 12.7044 21.0013 12.8884 20.8599 13.0299L14.8639 19.0301C14.5711 19.3231 14.0962 19.3233 13.8032 19.0305C13.5103 18.7377 13.5101 18.2629 13.8029 17.9699L18.5233 13.2461L4.32813 13.2461C3.91391 13.2461 3.57813 12.9103 3.57812 12.4961C3.57812 12.0819 3.91391 11.7461 4.32812 11.7461L18.5158 11.7461L13.8029 7.03016C13.5101 6.73718 13.5102 6.2623 13.8032 5.9695C14.0962 5.6767 14.5711 5.67685 14.8639 5.96984L20.813 11.9228C20.976 12.0603 21.0795 12.2661 21.0795 12.4961C21.0795 12.5038 21.0794 12.5114 21.0791 12.519Z" fill="#323544"/>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection
