@php
    use Carbon\Carbon;
@endphp

@extends('layouts.main')

@section('content')
    @include('components.alerts')
    <div class="mt-5"></div>
    @include('components.breadcrumb')

    <form action="/admin/pertemuan/{{ $pertemuan->id }}" method="POST">
    @csrf
        <div class="space-y-6">
            <div class="mt-6 overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="flex flex-col justify-between gap-5 border-b border-gray-200 px-5 py-4 sm:flex-row sm:items-center dark:border-gray-800">
                    <div class="flex flex-wrap items-end justify-between gap-3">
                        <h2 class="text-lg font-medium text-gray-800 dark:text-white">
                            {{ $pertemuan->kelas->name }}
                        </h2>
                        <h2 class="text-lg font-medium text-gray-800 dark:text-white">
                            -
                        </h2>
                        <h2 class="text-lg font-medium text-gray-800 dark:text-white">
                            {{ $pertemuan->name }}
                        </h2>
                        <h2 class="text-lg font-medium text-gray-800 dark:text-white">
                            ({{ Carbon::parse($pertemuan->date)->translatedFormat('D, d M Y') }})
                        </h2>
                    </div>
                    <div class="flex gap-3">
                        <input type="file" id="importFile" class="hidden" accept=".csv,.xlsx,.xls" />
                        <button onclick="document.getElementById('importFile').click()"
                            class="shadow-theme-xs inline-flex items-center justify-center gap-2 rounded-lg bg-white px-4 py-3 text-sm font-medium text-gray-700 ring-1 ring-gray-300 transition hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700 dark:hover:bg-white/[0.03]">
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
                            @foreach ($siswa as $item)
                                <tr class="transition hover:bg-gray-50 dark:hover:bg-gray-900">
                                    <td class="w-14 px-5 py-4 whitespace-nowrap">
                                    </td>
                                    <td class="p-4 whitespace-nowrap">
                                        <span class="text-sm font-medium text-gray-700 dark:text-gray-400">
                                            {{ $item->name }}
                                        </span>
                                    </td>
                                    <td class="bg-success-50 p-4 text-center whitespace-nowrap dark:bg-success-500/10">
                                        <input {{ isset($absensi[$item->id]) && $absensi[$item->id]->attendance == 'H' ? 'checked' : '' }} type="radio" name="attendance[{{ $item->id }}]" value="H" class="h-4 w-4 rounded-full border-gray-300 text-success-600 focus:ring-success-500">
                                    </td>
                                    <td class="bg-warning-50 p-4 text-center whitespace-nowrap dark:bg-warning-500/10">
                                        <input {{ isset($absensi[$item->id]) && $absensi[$item->id]->attendance == 'S' ? 'checked' : '' }} type="radio" name="attendance[{{ $item->id }}]" value="S" class="h-4 w-4 rounded-full border-gray-300 text-warning-600 focus:ring-warning-500">
                                    </td>
                                    <td class="bg-blue-light-50 p-4 text-center whitespace-nowrap dark:bg-blue-500/10">
                                        <input {{ isset($absensi[$item->id]) && $absensi[$item->id]->attendance == 'I' ? 'checked' : '' }} type="radio" name="attendance[{{ $item->id }}]" value="I" class="h-4 w-4 rounded-full border-gray-300 text-blue-light-600 focus:ring-blue-500">
                                    </td>
                                    <td class="bg-red-50 p-4 text-center whitespace-nowrap dark:bg-red-500/10">
                                        <input {{ isset($absensi[$item->id]) && $absensi[$item->id]->attendance == 'A' ? 'checked' : '' }} type="radio" name="attendance[{{ $item->id }}]" value="A" class="h-4 w-4 rounded-full border-gray-300 text-red-600 focus:ring-red-500">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">
                <a href="/admin/pertemuan"
                    class="shadow-theme-xs inline-flex items-center justify-center gap-2 rounded-lg bg-white px-4 py-3 text-sm font-medium text-gray-700 ring-1 ring-gray-300 transition hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700 dark:hover:bg-white/[0.03]">
                    Batal
                </a>
                <button type="submit"
                    class="bg-brand-500 shadow-theme-xs hover:bg-brand-600 inline-flex items-center justify-center gap-2 rounded-lg px-4 py-3 text-sm font-medium text-white transition">
                    Simpan
                </button>
            </div>
        </div>
    </form>
@endsection

