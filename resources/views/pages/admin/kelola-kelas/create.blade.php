@extends('layouts.main')

@section('content')

@include('components.alerts')
@include('components.breadcrumb')

<form action="/admin/kelola-kelas" method="POST">
    @csrf
    <div class="space-y-6">
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03] mt-6">
            <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-800">
                <h2 class="text-lg font-medium text-gray-800 dark:text-white">
                    Form Tambah Kelas
                </h2>
            </div>
            <div class="p-4 sm:p-6 dark:border-gray-800">
                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                    <div class="col-span-full">
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-3">
                            <div>
                                <label for="weight" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Jenjang</label>
                                <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                                    <select class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" :class="isOptionSelected &amp;&amp; 'text-gray-800 dark:text-white/90'" @change="isOptionSelected = true">
                                        <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            Pilih Jenjang
                                        </option>
                                        <option value="SD" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            SD
                                        </option>
                                        <option value="SMP" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            SMP
                                        </option>
                                        <option value="SMA" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            SMA
                                        </option>
                                    </select>
                                    <span class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-700 dark:text-gray-400">
                                        <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div>
                                <label for="weight" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Kelas</label>
                                <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                                    <select class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" :class="isOptionSelected &amp;&amp; 'text-gray-800 dark:text-white/90'" @change="isOptionSelected = true">
                                        <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            Pilih Kelas
                                        </option>
                                        <option value="1" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            1
                                        </option>
                                        <option value="2" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            2
                                        </option>
                                        <option value="3" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            3
                                        </option>
                                        <option value="4" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            4
                                        </option>
                                        <option value="5" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            5
                                        </option>
                                        <option value="6" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            6
                                        </option>
                                        <option value="7" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            7
                                        </option>
                                        <option value="8" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            8
                                        </option>
                                        <option value="9" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            9
                                        </option>
                                        <option value="10" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            10
                                        </option>
                                        <option value="11" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            11
                                        </option>
                                        <option value="12" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            12
                                        </option>
                                    </select>
                                        <span class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-700 dark:text-gray-400">
                                        <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div>
                                <label for="weight" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Jadwal</label>
                                <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                                    <select class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" :class="isOptionSelected &amp;&amp; 'text-gray-800 dark:text-white/90'" @change="isOptionSelected = true">
                                        <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            Pilih Jadwal
                                        </option>
                                        <option value="Pagi" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            Pagi
                                        </option>
                                        <option value="Sore" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            Sore
                                        </option>
                                    </select>
                                    <span class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-700 dark:text-gray-400">
                                        <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">
            <a href="/admin/kelola-kelas" class="shadow-theme-xs inline-flex items-center justify-center gap-2 rounded-lg bg-white px-4 py-3 text-sm font-medium text-gray-700 ring-1 ring-gray-300 transition hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700 dark:hover:bg-white/[0.03]">
            Batal
            </a>
            <button type="submit" class="bg-brand-500 shadow-theme-xs hover:bg-brand-600 inline-flex items-center justify-center gap-2 rounded-lg px-4 py-3 text-sm font-medium text-white transition">
            Simpan
            </button>
        </div>
    </div>
</form>
@endsection
