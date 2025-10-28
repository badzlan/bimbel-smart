@extends('layouts.main')

@section('content')
    <div class="space-y-6">
        @include('components.alerts')
        @include('components.breadcrumb')

        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div
                class="flex flex-col justify-between gap-5 border-b border-gray-200 px-5 py-4 sm:flex-row sm:items-center dark:border-gray-800">
                <div class="flex flex-wrap items-end justify-between gap-3">
                    <form action="/admin/kelas" method="GET" class="flex items-center gap-2">
                        <div class="relative">
                            <span class="absolute top-1/2 left-4 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                                <svg width="20" height="20" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 11.998C2 6.89029 6.14154 2.75 11.25 2.75C16.3585 2.75 20.5 6.89029 20.5 11.998C20.5 14.2826 19.6714 16.3737 18.2983 17.9873L21.7791 21.4685C22.072 21.7614 22.072 22.2363 21.7791 22.5292C21.4862 22.822 21.0113 22.822 20.7184 22.5291L17.2372 19.0476C15.6237 20.4187 13.5334 21.2459 11.25 21.2459C6.14154 21.2459 2 17.1056 2 11.998ZM11.25 4.25C6.96962 4.25 3.5 7.71905 3.5 11.998C3.5 16.2769 6.96962 19.7459 11.25 19.7459C15.5304 19.7459 19 16.2769 19 11.998C19 7.71905 15.5304 4.25 11.25 4.25Z"
                                        fill="#323544" />
                                    <path opacity="0.4"
                                        d="M11.25 5.74902C10.8358 5.74902 10.5 6.08481 10.5 6.49902C10.5 6.91324 10.8358 7.24902 11.25 7.24902C13.8742 7.24902 16.0013 9.37584 16.0013 11.999C16.0013 12.4132 16.3371 12.749 16.7513 12.749C17.1655 12.749 17.5013 12.4132 17.5013 11.999C17.5013 8.54707 14.7023 5.74902 11.25 5.74902Z"
                                        fill="#323544" />
                                </svg>
                            </span>
                            <input type="text" placeholder="Search..." name="search" value="{{ request('search') }}"
                                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-[250px] rounded-lg border border-gray-300 bg-transparent py-2.5 pr-4 pl-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                        </div>

                        <button
                            class="bg-brand-500 shadow-theme-xs hover:bg-brand-600 inline-flex items-center justify-center gap-2 rounded-lg px-4 py-3 text-sm font-medium text-white transition"
                            type="submit">
                            Cari
                        </button>
                    </form>
                </div>
                <div class="flex gap-3">
                    <input type="file" id="importFile" class="hidden" accept=".csv,.xlsx,.xls" />
                    <button onclick="document.getElementById('importFile').click()"
                        class="shadow-theme-xs inline-flex items-center justify-center gap-2 rounded-lg bg-white px-4 py-3 text-sm font-medium text-gray-700 ring-1 ring-gray-300 transition hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700 dark:hover:bg-white/[0.03]">
                        Import
                        <svg width="20" height="20" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.4239 16.75C12.2079 16.75 12.0132 16.6587 11.8763 16.5126L7.26675 11.9059C6.97376 11.6131 6.97361 11.1382 7.26641 10.8452C7.55921 10.5523 8.03408 10.5521 8.32707 10.8449L11.6739 14.1896L11.6739 4C11.6739 3.58579 12.0096 3.25 12.4239 3.25C12.8381 3.25 13.1739 3.58579 13.1739 4L13.1739 14.1854L16.5168 10.8449C16.8098 10.5521 17.2846 10.5523 17.5774 10.8453C17.8702 11.1383 17.87 11.6131 17.5771 11.9059L13.0021 16.4776C12.8646 16.644 12.6566 16.75 12.4239 16.75Z" fill="#323544"/>
                            <path d="M5.17188 16C5.17188 15.5858 4.83609 15.25 4.42188 15.25C4.00766 15.25 3.67188 15.5858 3.67188 16V18.5C3.67188 19.7426 4.67923 20.75 5.92188 20.75H18.9227C20.1654 20.75 21.1727 19.7426 21.1727 18.5V16C21.1727 15.5858 20.837 15.25 20.4227 15.25C20.0085 15.25 19.6727 15.5858 19.6727 16V18.5C19.6727 18.9142 19.337 19.25 18.9227 19.25H5.92188C5.50766 19.25 5.17188 18.9142 5.17188 18.5V16Z" fill="#323544"/>
                        </svg>
                    </button>
                    <button
                        class="shadow-theme-xs inline-flex items-center justify-center gap-2 rounded-lg bg-white px-4 py-3 text-sm font-medium text-gray-700 ring-1 ring-gray-300 transition hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700 dark:hover:bg-white/[0.03]">
                        Export
                        <svg width="20" height="20" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.4239 3.25C12.2079 3.25 12.0132 3.34131 11.8763 3.48744L7.26675 8.0941C6.97376 8.3869 6.97361 8.86177 7.26641 9.15476C7.55921 9.44775 8.03408 9.4479 8.32707 9.1551L11.6739 5.81043L11.6739 16C11.6739 16.4142 12.0096 16.75 12.4239 16.75C12.8381 16.75 13.1739 16.4142 13.1739 16L13.1739 5.81455L16.5168 9.15511C16.8098 9.4479 17.2846 9.44774 17.5774 9.15474C17.8702 8.86175 17.87 8.38687 17.5771 8.09408L13.0021 3.52236C12.8646 3.356 12.6566 3.25 12.4239 3.25Z" fill="#323544"/>
                            <path d="M5.17188 16C5.17188 15.5858 4.83609 15.25 4.42188 15.25C4.00766 15.25 3.67188 15.5858 3.67188 16V18.5C3.67188 19.7426 4.67923 20.75 5.92188 20.75H18.9227C20.1654 20.75 21.1727 19.7426 21.1727 18.5V16C21.1727 15.5858 20.837 15.25 20.4227 15.25C20.0085 15.25 19.6727 15.5858 19.6727 16V18.5C19.6727 18.9142 19.337 19.25 18.9227 19.25H5.92188C5.50766 19.25 5.17188 18.9142 5.17188 18.5V16Z" fill="#323544"/>
                        </svg>
                    </button>
                    <a href="/admin/kelas/create"
                        class="bg-brand-500 shadow-theme-xs hover:bg-brand-600 inline-flex items-center justify-center gap-2 rounded-lg px-4 py-3 text-sm font-medium text-white transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path d="M5 10.0002H15.0006M10.0002 5V15.0006" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        Tambah Kelas Baru
                    </a>
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
                                    Nama Kelas
                                </div>
                            </th>
                            <th
                                class="cursor-pointer px-5 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                <div class="flex items-center gap-1">
                                    Nama Tutor
                                </div>
                            </th>
                            <th
                                class="cursor-pointer px-5 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                <div class="flex items-center gap-1">
                                    Total Siswa
                                </div>
                            </th>
                            <th class="px-5 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                        @forelse ($kelas as $item)
                            <tr class="transition hover:bg-gray-50 dark:hover:bg-gray-900">
                                <td class="w-14 px-5 py-4 whitespace-nowrap">
                                </td>
                                <td class="px-5 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <span class="text-sm font-medium text-gray-700 dark:text-gray-400">{{ $item->name }}</span>
                                    </div>
                                </td>
                                <td class="px-5 py-4 whitespace-nowrap">
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $item->tutor->name }} {{ $item->tutor->degree }}</p>
                                </td>
                                <td class="px-5 py-4 whitespace-nowrap">
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $item->siswa_count }} Siswa</p>
                                </td>
                                <td class="px-5 py-4 whitespace-nowrap">
                                    <div x-data="{ open: false }" class="relative flex justify-start">
                                        <button @click="open = !open" class="text-gray-500 dark:text-gray-400">
                                            <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.99902 10.245C6.96552 10.245 7.74902 11.0285 7.74902 11.995V12.005C7.74902 12.9715 6.96552 13.755 5.99902 13.755C5.03253 13.755 4.24902 12.9715 4.24902 12.005V11.995C4.24902 11.0285 5.03253 10.245 5.99902 10.245ZM17.999 10.245C18.9655 10.245 19.749 11.0285 19.749 11.995V12.005C19.749 12.9715 18.9655 13.755 17.999 13.755C17.0325 13.755 16.249 12.9715 16.249 12.005V11.995C16.249 11.0285 17.0325 10.245 17.999 10.245ZM13.749 11.995C13.749 11.0285 12.9655 10.245 11.999 10.245C11.0325 10.245 10.249 11.0285 10.249 11.995V12.005C10.249 12.9715 11.0325 13.755 11.999 13.755C12.9655 13.755 13.749 12.9715 13.749 12.005V11.995Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </button>
                                        <div x-show="open" @click.outside="open = false"
                                            class="shadow-theme-lg absolute right-0 z-10 mt-8 w-40 space-y-1 rounded-lg border border-gray-200 bg-white p-2 dark:border-gray-800 dark:bg-gray-900"
                                            style="display: none;">
                                            <a href="/admin/kelas/{{ $item['id'] }}/edit"
                                                class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.75 20.5V22H6.75C5.50736 22 4.5 20.9926 4.5 19.75V9.62105C4.5 9.02455 4.73686 8.45247 5.15851 8.03055L10.5262 2.65951C10.9482 2.23725 11.5207 2 12.1177 2H17.25C18.4926 2 19.5 3.00736 19.5 4.25V9.75H18V4.25C18 3.83579 17.6642 3.5 17.25 3.5H12.248L12.2509 7.4984C12.2518 8.74166 11.2442 9.75 10.0009 9.75H6V19.75C6 20.1642 6.33579 20.5 6.75 20.5H9.75ZM10.7488 4.55876L7.05986 8.25H10.0009C10.4153 8.25 10.7512 7.91389 10.7509 7.49947L10.7488 4.55876Z" fill="#323544"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.2988 12.3389C19.6153 11.6555 18.5073 11.6555 17.8239 12.3389L12.6657 17.4971C12.3028 17.86 12.0749 18.3359 12.0197 18.8461L11.8307 20.593C11.8063 20.8188 11.8854 21.0434 12.046 21.204C12.2066 21.3646 12.4312 21.4437 12.657 21.4193L14.4039 21.2303C14.9141 21.1751 15.39 20.9472 15.7529 20.5843L20.9111 15.4261C21.5945 14.7427 21.5945 13.6347 20.9111 12.9512L20.2988 12.3389ZM18.0219 14.2622L18.9878 15.2281L14.6922 19.5237C14.5713 19.6446 14.4126 19.7206 14.2426 19.739L13.4222 19.8278L13.511 19.0074C13.5294 18.8374 13.6054 18.6787 13.7263 18.5578L18.0219 14.2622Z" fill="#323544"/>
                                                </svg>
                                                Edit Kelas
                                            </a>
                                            <form onsubmit="return confirm('Apakah yakin menghapus kelas?');" action="/admin/kelas/{{ $item->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-600 dark:hover:bg-gray-500/10 dark:hover:text-gray-400">
                                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M14.7223 12.7585C14.7426 12.3448 14.4237 11.9929 14.01 11.9726C13.5963 11.9522 13.2444 12.2711 13.2241 12.6848L12.9999 17.2415C12.9796 17.6552 13.2985 18.0071 13.7122 18.0274C14.1259 18.0478 14.4778 17.7289 14.4981 17.3152L14.7223 12.7585Z" fill="#323544"/>
                                                        <path d="M9.98802 11.9726C9.5743 11.9929 9.25542 12.3448 9.27577 12.7585L9.49993 17.3152C9.52028 17.7289 9.87216 18.0478 10.2859 18.0274C10.6996 18.0071 11.0185 17.6552 10.9981 17.2415L10.774 12.6848C10.7536 12.2711 10.4017 11.9522 9.98802 11.9726Z" fill="#323544"/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.249 2C9.00638 2 7.99902 3.00736 7.99902 4.25V5H5.5C4.25736 5 3.25 6.00736 3.25 7.25C3.25 8.28958 3.95503 9.16449 4.91303 9.42267L5.54076 19.8848C5.61205 21.0729 6.59642 22 7.78672 22H16.2113C17.4016 22 18.386 21.0729 18.4573 19.8848L19.085 9.42267C20.043 9.16449 20.748 8.28958 20.748 7.25C20.748 6.00736 19.7407 5 18.498 5H15.999V4.25C15.999 3.00736 14.9917 2 13.749 2H10.249ZM14.499 5V4.25C14.499 3.83579 14.1632 3.5 13.749 3.5H10.249C9.83481 3.5 9.49902 3.83579 9.49902 4.25V5H14.499ZM5.5 6.5C5.08579 6.5 4.75 6.83579 4.75 7.25C4.75 7.66421 5.08579 8 5.5 8H18.498C18.9123 8 19.248 7.66421 19.248 7.25C19.248 6.83579 18.9123 6.5 18.498 6.5H5.5ZM6.42037 9.5H17.5777L16.96 19.7949C16.9362 20.191 16.6081 20.5 16.2113 20.5H7.78672C7.38995 20.5 7.06183 20.191 7.03807 19.7949L6.42037 9.5Z" fill="#323544"/>
                                                    </svg>
                                                    Hapus Kelas
                                                </butt>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="p-5 text-center text-gray-500 dark:text-gray-400">
                                    Belum ada kelas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($kelas->hasPages())
                <div class="border-t border-gray-200 px-6 py-4 dark:border-gray-800">
                    <div class="flex items-center justify-between">
                        @if ($kelas->onFirstPage())
                            <button disabled
                                class="text-theme-sm shadow-theme-xs flex items-center gap-2 rounded-lg border border-gray-300 bg-gray-100 px-2 py-2 font-medium text-gray-400 sm:px-3.5 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-500">
                                <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M2.58301 9.99868C2.58272 10.1909 2.65588 10.3833 2.80249 10.53L7.79915 15.5301C8.09194 15.8231 8.56682 15.8233 8.85981 15.5305C9.15281 15.2377 9.15297 14.7629 8.86018 14.4699L5.14009 10.7472L16.6675 10.7472C17.0817 10.7472 17.4175 10.4114 17.4175 9.99715C17.4175 9.58294 17.0817 9.24715 16.6675 9.24715L5.14554 9.24715L8.86017 5.53016C9.15297 5.23717 9.15282 4.7623 8.85983 4.4695C8.56684 4.1767 8.09197 4.17685 7.79917 4.46984L2.84167 9.43049C2.68321 9.568 2.58301 9.77087 2.58301 9.99715C2.58301 9.99766 2.58301 9.99817 2.58301 9.99868Z"
                                        fill=""></path>
                                </svg>
                                Previous
                            </button>
                        @else
                            <a href="{{ $kelas->previousPageUrl() }}"
                                class="text-theme-sm shadow-theme-xs flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-2 py-2 font-medium text-gray-700 hover:bg-gray-50 sm:px-3.5 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03]">
                                <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M2.58301 9.99868C2.58272 10.1909 2.65588 10.3833 2.80249 10.53L7.79915 15.5301C8.09194 15.8231 8.56682 15.8233 8.85981 15.5305C9.15281 15.2377 9.15297 14.7629 8.86018 14.4699L5.14009 10.7472L16.6675 10.7472C17.0817 10.7472 17.4175 10.4114 17.4175 9.99715C17.4175 9.58294 17.0817 9.24715 16.6675 9.24715L5.14554 9.24715L8.86017 5.53016C9.15297 5.23717 9.15282 4.7623 8.85983 4.4695C8.56684 4.1767 8.09197 4.17685 7.79917 4.46984L2.84167 9.43049C2.68321 9.568 2.58301 9.77087 2.58301 9.99715C2.58301 9.99766 2.58301 9.99817 2.58301 9.99868Z"
                                        fill=""></path>
                                </svg>
                                Previous
                            </a>
                        @endif

                        <ul class="hidden items-center gap-0.5 sm:flex">
                            @foreach ($kelas->getUrlRange(1, $kelas->lastPage()) as $page => $url)
                                @if ($page == $kelas->currentPage())
                                    <li>
                                        <span
                                            class="bg-brand-500/[0.08] text-theme-sm text-brand-500 dark:text-brand-500 flex h-10 w-10 items-center justify-center rounded-lg font-medium">
                                            {{ $page }}
                                        </span>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ $url }}"
                                            class="text-theme-sm hover:bg-brand-500/[0.08] hover:text-brand-500 flex h-10 w-10 items-center justify-center rounded-lg font-medium text-gray-700 dark:text-gray-400">
                                            {{ $page }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>

                        @if ($kelas->hasMorePages())
                            <a href="{{ $kelas->nextPageUrl() }}"
                                class="text-theme-sm shadow-theme-xs flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-2 py-2 font-medium text-gray-700 hover:bg-gray-50 sm:px-3.5 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03]">
                                Next
                                <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M17.4175 9.9986C17.4178 10.1909 17.3446 10.3832 17.198 10.53L12.2013 15.5301C11.9085 15.8231 11.4337 15.8233 11.1407 15.5305C10.8477 15.2377 10.8475 14.7629 11.1403 14.4699L14.8604 10.7472L3.33301 10.7472C2.91879 10.7472 2.58301 10.4114 2.58301 9.99715C2.58301 9.58294 2.91879 9.24715 3.33301 9.24715L14.8549 9.24715L11.1403 5.53016C10.8475 5.23717 10.8477 4.7623 11.1407 4.4695C11.4336 4.1767 11.9085 4.17685 12.2013 4.46984L17.1588 9.43049C17.3173 9.568 17.4175 9.77087 17.4175 9.99715C17.4175 9.99763 17.4175 9.99812 17.4175 9.9986Z"
                                        fill=""></path>
                                </svg>
                            </a>
                        @else
                            <button disabled
                                class="text-theme-sm shadow-theme-xs flex items-center gap-2 rounded-lg border border-gray-300 bg-gray-100 px-2 py-2 font-medium text-gray-400 sm:px-3.5 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-500">
                                Next
                                <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M17.4175 9.9986C17.4178 10.1909 17.3446 10.3832 17.198 10.53L12.2013 15.5301C11.9085 15.8231 11.4337 15.8233 11.1407 15.5305C10.8477 15.2377 10.8475 14.7629 11.1403 14.4699L14.8604 10.7472L3.33301 10.7472C2.91879 10.7472 2.58301 10.4114 2.58301 9.99715C2.58301 9.58294 2.91879 9.24715 3.33301 9.24715L14.8549 9.24715L11.1403 5.53016C10.8475 5.23717 10.8477 4.7623 11.1407 4.4695C11.4336 4.1767 11.9085 4.17685 12.2013 4.46984L17.1588 9.43049C17.3173 9.568 17.4175 9.77087 17.4175 9.99715C17.4175 9.99763 17.4175 9.99812 17.4175 9.9986Z"
                                        fill=""></path>
                                </svg>
                            </button>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
