@extends('layouts.main')

@section('content')
    @include('components.alerts')
    <div class="mt-5"></div>
    @include('components.breadcrumb')

    <div class="space-y-6">
        <div
            class="mt-6 overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-800">
                <form action="/tutor/bulan" method="GET">
                    <div class="grid grid-cols-1 gap-5 lg:grid-cols-12 lg:items-end">
                        <div class="lg:col-span-3">
                            <div x-data="{ isOptionSelected: {{ request('tahun') ? 'true' : 'false' }} }" class="relative z-20 bg-transparent">
                                <select
                                    name="tahun"
                                    class="h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 shadow-theme-xs focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800"
                                    :class="isOptionSelected && 'text-gray-800 dark:text-white/90'"
                                    @change="isOptionSelected = true">
                                    <option value="" selected>Pilih Tahun</option>
                                    <option value="2025" {{ request('tahun') == 2025 ? 'selected' : '' }}>2025</option>
                                    <option value="2024" {{ request('tahun') == 2024 ? 'selected' : '' }}>2024</option>
                                </select>
                                <span class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-700 dark:text-gray-400">
                                    <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="lg:col-span-3">
                            <div x-data="{ isOptionSelected: {{ request('bulan') ? 'true' : 'false' }} }" class="relative z-20 bg-transparent">
                                <select
                                    name="bulan"
                                    class="h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 shadow-theme-xs focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800"
                                    :class="isOptionSelected && 'text-gray-800 dark:text-white/90'"
                                    @change="isOptionSelected = true">
                                    <option value="" selected>Pilih Bulan</option>
                                    <option value="1"  {{ request('bulan') == 1 ? 'selected' : '' }}>Januari</option>
                                    <option value="2"  {{ request('bulan') == 2 ? 'selected' : '' }}>Februari</option>
                                    <option value="3"  {{ request('bulan') == 3 ? 'selected' : '' }}>Maret</option>
                                    <option value="4"  {{ request('bulan') == 4 ? 'selected' : '' }}>April</option>
                                    <option value="5"  {{ request('bulan') == 5 ? 'selected' : '' }}>Mei</option>
                                    <option value="6"  {{ request('bulan') == 6 ? 'selected' : '' }}>Juni</option>
                                    <option value="7"  {{ request('bulan') == 7 ? 'selected' : '' }}>Juli</option>
                                    <option value="8"  {{ request('bulan') == 8 ? 'selected' : '' }}>Agustus</option>
                                    <option value="9"  {{ request('bulan') == 9 ? 'selected' : '' }}>September</option>
                                    <option value="10" {{ request('bulan') == 10 ? 'selected' : '' }}>Oktober</option>
                                    <option value="11" {{ request('bulan') == 11 ? 'selected' : '' }}>November</option>
                                    <option value="12" {{ request('bulan') == 12 ? 'selected' : '' }}>Desember</option>
                                </select>
                                <span class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-700 dark:text-gray-400">
                                    <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="lg:col-span-3">
                            <div x-data="{ isOptionSelected: {{ request('kelas') ? 'true' : 'false' }} }" class="relative z-20 bg-transparent">
                                <select
                                    name="kelas"
                                    class="h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 shadow-theme-xs focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800"
                                    :class="isOptionSelected && 'text-gray-800 dark:text-white/90'"
                                    @change="isOptionSelected = true">
                                    <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400" selected>
                                        Pilih Kelas
                                    </option>
                                    @foreach ($kelas as $item)
                                        <option value="{{ $item->id }}"
                                            {{ request('kelas') == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-700 dark:text-gray-400">
                                    <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    <div class="hidden lg:block lg:col-span-1"></div>

                    <div class="lg:col-span-2">
                        <button class="flex h-11 w-full items-center justify-center gap-2 rounded-lg bg-brand-500 px-4 text-sm font-medium text-white transition hover:bg-brand-600 focus:outline-none focus:ring-2 focus:ring-brand-500/50 dark:bg-brand-500 dark:hover:bg-brand-600">
                            <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.16667 3.33333C5.94502 3.33333 3.33334 5.94502 3.33334 9.16667C3.33334 12.3883 5.94502 15 9.16667 15C12.3883 15 15 12.3883 15 9.16667C15 5.94502 12.3883 3.33333 9.16667 3.33333ZM1.66667 9.16667C1.66667 5.02454 5.02454 1.66667 9.16667 1.66667C13.3088 1.66667 16.6667 5.02454 16.6667 9.16667C16.6667 13.3088 13.3088 16.6667 9.16667 16.6667C5.02454 16.6667 1.66667 13.3088 1.66667 9.16667Z" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.2857 13.2857C13.6112 12.9603 14.1388 12.9603 14.4643 13.2857L18.0893 16.9107C18.4147 17.2362 18.4147 17.7638 18.0893 18.0893C17.7638 18.4147 17.2362 18.4147 16.9107 18.0893L13.2857 14.4643C12.9603 14.1388 12.9603 13.6112 13.2857 13.2857Z" />
                            </svg>
                            Cari
                        </button>
                    </div>
                </form>
                {{-- <form action="/tutor/bulan" method="GET">
                    <div class="grid grid-cols-1 gap-5 lg:grid-cols-12 lg:items-end">
                        <div class="lg:col-span-2">
                            <div x-data="{ isOptionSelected: {{ request('tahun') ? 'true' : 'false' }} }" class="relative z-20 bg-transparent">
                                <select name="tahun"
                                    class="h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 shadow-theme-xs focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800"
                                    :class="isOptionSelected && 'text-gray-800 dark:text-white/90'"
                                    @change="isOptionSelected = true">
                                    <option value="" selected>Pilih Tahun</option>
                                    <option value="2025" {{ request('tahun') == 2025 ? 'selected' : '' }}>2025</option>
                                    <option value="2024" {{ request('tahun') == 2024 ? 'selected' : '' }}>2024</option>
                                </select>
                                <span
                                    class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-700 dark:text-gray-400">
                                    <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke=""
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="lg:col-span-2">
                            <div x-data="{ isOptionSelected: {{ request('bulan') ? 'true' : 'false' }} }" class="relative z-20 bg-transparent">
                                <select name="bulan"
                                    class="h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 shadow-theme-xs focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800"
                                    :class="isOptionSelected && 'text-gray-800 dark:text-white/90'"
                                    @change="isOptionSelected = true">
                                    <option value="" selected>Pilih Bulan</option>
                                    <option value="1" {{ request('bulan') == 1 ? 'selected' : '' }}>Januari</option>
                                    <option value="2" {{ request('bulan') == 2 ? 'selected' : '' }}>Februari</option>
                                    <option value="3" {{ request('bulan') == 3 ? 'selected' : '' }}>Maret</option>
                                    <option value="4" {{ request('bulan') == 4 ? 'selected' : '' }}>April</option>
                                    <option value="5" {{ request('bulan') == 5 ? 'selected' : '' }}>Mei</option>
                                    <option value="6" {{ request('bulan') == 6 ? 'selected' : '' }}>Juni</option>
                                    <option value="7" {{ request('bulan') == 7 ? 'selected' : '' }}>Juli</option>
                                    <option value="8" {{ request('bulan') == 8 ? 'selected' : '' }}>Agustus</option>
                                    <option value="9" {{ request('bulan') == 9 ? 'selected' : '' }}>September</option>
                                    <option value="10" {{ request('bulan') == 10 ? 'selected' : '' }}>Oktober</option>
                                    <option value="11" {{ request('bulan') == 11 ? 'selected' : '' }}>November</option>
                                    <option value="12" {{ request('bulan') == 12 ? 'selected' : '' }}>Desember</option>
                                </select>
                                <span
                                    class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-700 dark:text-gray-400">
                                    <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke=""
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="lg:col-span-2">
                            <div x-data="{ isOptionSelected: {{ request('kelas') ? 'true' : 'false' }} }" class="relative z-20 bg-transparent">
                                <select name="kelas"
                                    class="h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 shadow-theme-xs focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800"
                                    :class="isOptionSelected && 'text-gray-800 dark:text-white/90'"
                                    @change="isOptionSelected = true">
                                    <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400"
                                        selected>
                                        Pilih Kelas
                                    </option>
                                    @foreach ($kelas as $item)
                                        <option value="{{ $item->id }}"
                                            {{ request('kelas') == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span
                                    class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-700 dark:text-gray-400">
                                    <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke=""
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="hidden lg:block lg:col-span-2"></div>

                        <div class="lg:col-span-2">
                            <button
                                class="flex h-11 w-full items-center justify-center gap-2 rounded-lg bg-brand-500 px-4 text-sm font-medium text-white transition hover:bg-brand-600 focus:outline-none focus:ring-2 focus:ring-brand-500/50 dark:bg-brand-500 dark:hover:bg-brand-600">
                                <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9.16667 3.33333C5.94502 3.33333 3.33334 5.94502 3.33334 9.16667C3.33334 12.3883 5.94502 15 9.16667 15C12.3883 15 15 12.3883 15 9.16667C15 5.94502 12.3883 3.33333 9.16667 3.33333ZM1.66667 9.16667C1.66667 5.02454 5.02454 1.66667 9.16667 1.66667C13.3088 1.66667 16.6667 5.02454 16.6667 9.16667C16.6667 13.3088 13.3088 16.6667 9.16667 16.6667C5.02454 16.6667 1.66667 13.3088 1.66667 9.16667Z" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M13.2857 13.2857C13.6112 12.9603 14.1388 12.9603 14.4643 13.2857L18.0893 16.9107C18.4147 17.2362 18.4147 17.7638 18.0893 18.0893C17.7638 18.4147 17.2362 18.4147 16.9107 18.0893L13.2857 14.4643C12.9603 14.1388 12.9603 13.6112 13.2857 13.2857Z" />
                                </svg>
                                Cari
                            </button>
                        </div>
                </form>

                <div class="lg:col-span-2">
                    <button onclick="document.getElementById('importFile').click()"
                        class="shadow-theme-xs flex h-11 w-full items-center justify-center gap-2 rounded-lg bg-white px-4 py-3 text-sm font-medium text-gray-700 ring-1 ring-gray-300 transition hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700 dark:hover:bg-white/[0.03]">
                        Export
                        <svg width="20" height="20" viewBox="0 0 25 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.4239 3.25C12.2079 3.25 12.0132 3.34131 11.8763 3.48744L7.26675 8.0941C6.97376 8.3869 6.97361 8.86177 7.26641 9.15476C7.55921 9.44775 8.03408 9.4479 8.32707 9.1551L11.6739 5.81043L11.6739 16C11.6739 16.4142 12.0096 16.75 12.4239 16.75C12.8381 16.75 13.1739 16.4142 13.1739 16L13.1739 5.81455L16.5168 9.15511C16.8098 9.4479 17.2846 9.44774 17.5774 9.15474C17.8702 8.86175 17.87 8.38687 17.5771 8.09408L13.0021 3.52236C12.8646 3.356 12.6566 3.25 12.4239 3.25Z"
                                fill="#323544" />
                            <path
                                d="M5.17188 16C5.17188 15.5858 4.83609 15.25 4.42188 15.25C4.00766 15.25 3.67188 15.5858 3.67188 16V18.5C3.67188 19.7426 4.67923 20.75 5.92188 20.75H18.9227C20.1654 20.75 21.1727 19.7426 21.1727 18.5V16C21.1727 15.5858 20.837 15.25 20.4227 15.25C20.0085 15.25 19.6727 15.5858 19.6727 16V18.5C19.6727 18.9142 19.337 19.25 18.9227 19.25H5.92188C5.50766 19.25 5.17188 18.9142 5.17188 18.5V16Z"
                                fill="#323544" />
                        </svg>
                    </button>
                </div> --}}

            </div>
        </div>

        <form action="/tutor/bulan" method="POST">
            @csrf
            <div class="custom-scrollbar overflow-x-auto">
                <table class="w-full table-auto">
                    @if ($pertemuan != null)
                        <thead>
                            <tr class="border-b border-gray-200 dark:border-gray-800 dark:divide-gray-800">
                                <th class="w-14 px-5 py-4 text-left">
                                </th>
                                <th
                                    class="w-64 p-4 text-left text-xs font-medium whitespace-nowrap text-gray-500 dark:text-gray-400">
                                    Nama Siswa
                                </th>
                                <th class="w-14 px-5 py-4 text-left">
                                </th>
                                @foreach ($pertemuan as $item)
                                    @if ($item->date <= now()->toDateString())
                                    <th
                                        class="p-4 text-center text-xs font-medium whitespace-nowrap text-gray-500 dark:text-gray-400">
                                        {{ $item->name }}
                                    </th>
                                    @endif
                                @endforeach
                            </tr>
                        </thead>
                    @endif
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                        @forelse ($siswa as $item)
                            <tr class="transition hover:bg-gray-50 dark:hover:bg-gray-900">
                                <td class="w-14 px-5 py-4 whitespace-nowrap">
                                </td>
                                <td class="p-4 whitespace-nowrap">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-400">
                                        {{ $item->name }}
                                    </span>
                                </td>
                                <td class="w-14 px-5 py-4 whitespace-nowrap">
                                </td>
                                @foreach ($pertemuan as $p)
                                    @if ($p->date <= now()->toDateString())
                                    <td x-data="{ status: '{{ $absensi[$item->id][$p->id] ?? '-' }}' }" class="p-4 whitespace-nowrap">
                                        <div class="relative z-10 mx-auto w-20 bg-transparent">
                                            <select x-model="status"
                                                name="attendance[{{ $item->id }}][{{ $p->id }}]"
                                                class="h-9 w-full appearance-none rounded-lg border bg-none px-3 py-1.5 text-center text-sm font-semibold focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 dark:bg-gray-900 dark:placeholder:text-white/30"
                                                :class="{
                                                    'border-gray-300 dark:border-gray-700': status === '',
                                                    'bg-success-50 text-success-700 border-success-200 dark:bg-success-500/10 dark:text-success-400 dark:border-success-500/30': status === 'H',
                                                    'bg-warning-50 text-warning-700 border-warning-200 dark:bg-warning-500/10 dark:text-warning-400 dark:border-warning-500/30': status === 'S',
                                                    'bg-blue-light-50 text-blue-light-500 border-blue-light-200 dark:bg-blue-500/10 dark:text-blue-light-500 dark:border-blue-500/30': status === 'I',
                                                    'bg-red-50 text-red-700 border-red-200 dark:bg-red-500/10 dark:text-red-400 dark:border-red-500/30': status === 'A'
                                                }">
                                                <option value="">-</option>
                                                <option value="H">H</option>
                                                <option value="S">S</option>
                                                <option value="I">I</option>
                                                <option value="A">A</option>
                                            </select>
                                            <span
                                                class="pointer-events-none absolute top-1/2 right-2.5 z-20 -translate-y-1/2 text-gray-700 dark:text-gray-400">
                                                <svg class="stroke-current" width="16" height="16"
                                                    viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                            </span>
                                        </div>
                                    </td>
                                    @endif
                                @endforeach
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="p-5 text-center text-gray-500 dark:text-gray-400">
                                    Pilih tahun, bulan, dan kelas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
    </div>
    @if ($siswa != null)
    <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">
        <button type="submit"
            class="bg-brand-500 shadow-theme-xs hover:bg-brand-600 inline-flex items-center justify-center gap-2 rounded-lg px-4 py-3 text-sm font-medium text-white transition">
            Simpan
        </button>
    </div>
    @endif
    </div>
    </form>
@endsection
