@extends('layouts.main')

@section('content')
    <div class="space-y-6">
        @include('components.alerts')
        @include('components.breadcrumb')

        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div
                class="flex flex-col justify-between gap-5 border-b border-gray-200 px-5 py-4 sm:flex-row sm:items-center dark:border-gray-800">
                <div class="flex flex-wrap items-end justify-between gap-3">
                    <form action="/tutor/kelas" method="GET" class="flex items-center gap-2">
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
                                            <a href="/tutor/kelas/{{ $item['id'] }}"
                                                class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                                Lihat Detail Kelas
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="p-5 text-center text-gray-500 dark:text-gray-400">
                                Belum ada tutor.
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
