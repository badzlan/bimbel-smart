@php
    use Carbon\Carbon;
@endphp
@extends('layouts.main')

@section('content')
    @include('components.alerts')
    <div class="mt-5"></div>
    @include('components.breadcrumb')

    <div class="space-y-6 mt-5">
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03] mt-6">
            <div class="p-4 sm:p-6 dark:border-gray-800">
                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                    <div class="col-span-full">
                        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                            <div>
                                <label for="name"
                                    class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Nama Kelas</label>
                                <input type="text" id="name" name="name"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                    placeholder="Masukkan nama kelas" value="{{ $kelas->name }}" disabled>
                            </div>
                            <div>
                                <label for="name"
                                    class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Nama Tutor</label>
                                <input type="text" id="name" name="name"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                    placeholder="Masukkan nama kelas" value="{{ $kelas->tutor->name }}, {{ $kelas->tutor->degree }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div
                class="flex flex-col justify-between gap-5 border-b border-gray-200 px-5 py-4 sm:flex-row sm:items-center dark:border-gray-800">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                        Siswa yang ada dikelas ini
                    </h3>
                </div>
                <div class="flex gap-3">
                    <div class="relative flex-1 sm:flex-auto">
                        <span class="absolute top-1/2 left-4 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                            <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3.04199 9.37363C3.04199 5.87693 5.87735 3.04199 9.37533 3.04199C12.8733 3.04199 15.7087 5.87693 15.7087 9.37363C15.7087 12.8703 12.8733 15.7053 9.37533 15.7053C5.87735 15.7053 3.04199 12.8703 3.04199 9.37363ZM9.37533 1.54199C5.04926 1.54199 1.54199 5.04817 1.54199 9.37363C1.54199 13.6991 5.04926 17.2053 9.37533 17.2053C11.2676 17.2053 13.0032 16.5344 14.3572 15.4176L17.1773 18.238C17.4702 18.5309 17.945 18.5309 18.2379 18.238C18.5308 17.9451 18.5309 17.4703 18.238 17.1773L15.4182 14.3573C16.5367 13.0033 17.2087 11.2669 17.2087 9.37363C17.2087 5.04817 13.7014 1.54199 9.37533 1.54199Z"
                                    fill=""></path>
                            </svg>
                        </span>
                        <input type="text" placeholder="Search..."
                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent py-2.5 pr-4 pl-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden sm:w-[300px] sm:min-w-[300px] dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                    </div>
                </div>
            </div>
            <div class="custom-scrollbar overflow-x-auto">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="border-b border-gray-200 dark:divide-gray-800 dark:border-gray-800">
                            <th class="w-14 px-5 py-4 text-left">
                            </th>
                            <th
                                class="cursor-pointer px-5 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                <div class="flex items-center gap-1">
                                    Nama Siswa
                                </div>
                            </th>
                            <th
                                class="cursor-pointer px-5 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                <div class="flex items-center gap-1">
                                    Asal Sekolah
                                </div>
                            </th>
                            <th class="px-5 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                Tanggal Masuk
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                        @forelse ($siswa as $item)
                            <tr class="transition hover:bg-gray-50 dark:hover:bg-gray-900">
                                <td class="w-14 px-5 py-4 whitespace-nowrap">
                                </td>
                                <td class="px-5 py-4 whitespace-nowrap">
                                    <span
                                        class="text-sm font-medium text-gray-700 dark:text-gray-400">{{ $item->name }}</span>
                                </td>
                                <td class="px-5 py-4 whitespace-nowrap">
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $item->school }}</p>
                                </td>
                                <td class="px-5 py-4 whitespace-nowrap">
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ Carbon::parse($item->enter_date)->translatedFormat('D, d M Y') }}</p>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="p-5 text-center text-gray-500 dark:text-gray-400">
                                    Tidak ada siswa dikelas ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">
            <a href="/tutor/kelas"
                class="shadow-theme-xs inline-flex items-center justify-center gap-2 rounded-lg bg-white px-4 py-3 text-sm font-medium text-gray-700 ring-1 ring-gray-300 transition hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700 dark:hover:bg-white/[0.03]">
                Kembali
            </a>
        </div>
    </div>
@endsection
