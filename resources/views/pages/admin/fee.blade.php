@extends('layouts.main')

@section('content')
    {{-- Data Dummy untuk Tutor dan Absensi Chart --}}
    @php
        $tutors = [];
        $statuses = ['Sudah Dibayar', 'Belum Dibayar'];

        // Variabel untuk chart
        $totalHadir = 0;
        $totalAlpa = 0;
        $totalSakit = 0;
        $totalIzin = 0;

        for ($i = 1; $i <= 10; $i++) {
            $hadir = rand(15, 25);
            $alpa = rand(0, 5);
            $sakit = rand(0, 3);
            $izin = rand(0, 2);

            $tutors[] = (object) [
                'nama' => 'Tutor ' . chr(64 + $i),
                'avatar' => 'http://127.0.0.1:8000/images/admin.jpg',
                'total_fee' => rand(5, 350) * 10000,
                'status_pembayaran' => $statuses[array_rand($statuses)],
                'hadir' => $hadir,
                'alpa' => $alpa,
                'sakit' => $sakit,
                'izin' => $izin,
            ];

            // Akumulasi total untuk chart
            $totalHadir += $hadir;
            $totalAlpa += $alpa;
            $totalSakit += $sakit;
            $totalIzin += $izin;
        }

        // Siapkan data untuk di-pass ke JavaScript
        $chartSeries = [$totalHadir, $totalAlpa, $totalSakit, $totalIzin];
        $chartLabels = ['Hadir', 'Alpa', 'Sakit', 'Izin'];

        // Urutkan tutor berdasarkan fee tertinggi untuk daftar "5 Tutor Teratas"
        $topTutors = $tutors;
        usort($topTutors, function ($a, $b) {
            return $b->total_fee <=> $a->total_fee;
        });
        $topTutors = array_slice($topTutors, 0, 5);

    @endphp

    <div class="space-y-6">
        {{-- Breadcrumb --}}
        @include('components.alerts')
        @include('components.breadcrumb')

        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 xl:col-span-5">
                <div
                    class="rounded-2xl border border-gray-200 bg-white p-5 sm:p-6 dark:border-gray-800 dark:bg-white/[0.03]">
                    <div class="mb-9 flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                            Persentase Fee Tutor
                        </h3>
                        <div x-data="{ openDropDown: false }" class="relative">
                            <button @click="openDropDown = !openDropDown"
                                :class="openDropDown ? 'text-gray-700 dark:text-white' :
                                    'text-gray-400 hover:text-gray-700 dark:hover:text-white'">
                                <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M10.2441 6C10.2441 5.0335 11.0276 4.25 11.9941 4.25H12.0041C12.9706 4.25 13.7541 5.0335 13.7541 6C13.7541 6.9665 12.9706 7.75 12.0041 7.75H11.9941C11.0276 7.75 10.2441 6.9665 10.2441 6ZM10.2441 18C10.2441 17.0335 11.0276 16.25 11.9941 16.25H12.0041C12.9706 16.25 13.7541 17.0335 13.7541 18C13.7541 18.9665 12.9706 19.75 12.0041 19.75H11.9941C11.0276 19.75 10.2441 18.9665 10.2441 18ZM11.9941 10.25C11.0276 10.25 10.2441 11.0335 10.2441 12C10.2441 12.9665 11.0276 13.75 11.9941 13.75H12.0041C12.9706 13.75 13.7541 12.9665 13.7541 12C13.7541 11.0335 12.9706 10.25 12.0041 10.25H11.9941Z"
                                        fill=""></path>
                                </svg>
                            </button>
                            <div x-show="openDropDown" @click.outside="openDropDown = false"
                                class="absolute right-0 z-40 w-40 space-y-1 bg-white border border-gray-200 shadow-theme-lg dark:bg-gray-dark top-full rounded-2xl dark:border-gray-800">
                                <button
                                    class="flex w-full px-3 py-2 font-medium text-left text-gray-500 rounded-lg text-theme-xs hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                    View More
                                </button>
                                <button
                                    class="flex w-full px-3 py-2 font-medium text-left text-gray-500 rounded-lg text-theme-xs hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        {{-- Chart akan dirender di sini oleh JavaScript --}}
                        <div id="chartSeven" class="flex justify-center mx-auto chartDarkStyle"></div>
                    </div>
                </div>
                {{-- 5 Tutor Teratas --}}
                <div
                    class="rounded-2xl border border-gray-200 bg-white p-5 sm:p-6 dark:border-gray-800 dark:bg-white/[0.03] mt-6">
                    <h3 class="mb-4 text-lg font-semibold text-gray-800 dark:text-white/90">
                        5 Tutor Fee Teratas
                    </h3>
                    <div class="space-y-3">
                        @foreach ($topTutors as $tutor)
                            <div
                                class="flex items-center justify-between pb-2 @if (!$loop->last) border-b border-gray-100 dark:border-gray-800 @endif">
                                <div class="flex items-center gap-3">
                                    <img src="{{ $tutor->avatar }}" alt="avatar"
                                        class="object-cover w-8 h-8 rounded-full">
                                    <p class="font-medium text-gray-700 text-theme-sm dark:text-gray-400">
                                        {{ $tutor->nama }}</p>
                                </div>
                                <p class="font-semibold text-gray-800 text-theme-sm dark:text-white/90">
                                    Rp {{ number_format($tutor->total_fee, 0, ',', '.') }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-span-12 xl:col-span-7">
                <div class="rounded-2xl border border-gray-200 bg-white pt-4 dark:border-gray-800 dark:bg-white/[0.03]">
                    <div class="mb-4 flex flex-col gap-2 px-5 sm:flex-row sm:items-center sm:justify-between sm:px-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                                Total Fee Tutor
                            </h3>
                        </div>
                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                            <form>
                                <div class="relative">
                                    <span class="pointer-events-none absolute top-1/2 left-4 -translate-y-1/2">
                                        <svg class="fill-gray-500 dark:fill-gray-400" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M3.04199 9.37381C3.04199 5.87712 5.87735 3.04218 9.37533 3.04218C12.8733 3.04218 15.7087 5.87712 15.7087 9.37381C15.7087 12.8705 12.8733 15.7055 9.37533 15.7055C5.87735 15.7055 3.04199 12.8705 3.04199 9.37381ZM9.37533 1.54218C5.04926 1.54218 1.54199 5.04835 1.54199 9.37381C1.54199 13.6993 5.04926 17.2055 9.37533 17.2055C11.2676 17.2055 13.0032 16.5346 14.3572 15.4178L17.1773 18.2381C17.4702 18.531 17.945 18.5311 18.2379 18.2382C18.5308 17.9453 18.5309 17.4704 18.238 17.1775L15.4182 14.3575C16.5367 13.0035 17.2087 11.2671 17.2087 9.37381C17.2087 5.04835 13.7014 1.54218 9.37533 1.54218Z"
                                                fill=""></path>
                                        </svg>
                                    </span>
                                    <input type="text" placeholder="Search..."
                                        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-[42px] w-full rounded-lg border border-gray-300 bg-transparent py-2.5 pr-4 pl-[42px] text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden xl:w-[300px] dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="custom-scrollbar max-w-full overflow-x-auto overflow-y-visible px-5 sm:px-6">
                        <table class="min-w-full">
                            <thead class="border-y border-gray-100 py-3 dark:border-gray-800">
                                <tr>
                                    <th class="py-3 pr-5 font-normal whitespace-nowrap sm:pr-6">
                                        <div class="flex items-center">
                                            <p class="text-theme-sm text-gray-500 dark:text-gray-400">Nama Tutor</p>
                                        </div>
                                    </th>
                                    <th class="px-5 py-3 font-normal whitespace-nowrap sm:px-6">
                                        <div class="flex items-center">
                                            <p class="text-theme-sm text-gray-500 dark:text-gray-400">Total Fee</p>
                                        </div>
                                    </th>
                                    <th class="px-5 py-3 font-normal whitespace-nowrap sm:px-6">
                                        <div class="flex items-center">
                                            <p class="text-theme-sm text-gray-500 dark:text-gray-400">Status Pembayaran
                                            </p>
                                        </div>
                                    </th>
                                    <th class="px-5 py-3 font-normal whitespace-nowrap sm:px-6">
                                        <div class="flex items-center">
                                            <p class="text-theme-sm text-gray-500 dark:text-gray-400">Aksi</p>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 dark:divide-gray-800">

                                {{-- Loop data tutor --}}
                                @foreach ($tutors as $tutor)
                                    <tr>
                                        <td class="py-3 pr-5 whitespace-nowrap sm:pr-6">
                                            <div class="col-span-3 flex items-center">
                                                <div class="flex items-center gap-3">
                                                    <div class="h-8 w-8">
                                                        <img src="{{ $tutor->avatar }}" alt="brand"
                                                            class="h-8 w-8 rounded-full object-cover">
                                                    </div>
                                                    <div>
                                                        <span
                                                            class="text-theme-sm block font-medium text-gray-700 dark:text-gray-400">
                                                            {{ $tutor->nama }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-3 whitespace-nowrap sm:px-6">
                                            <div class="flex items-center">
                                                <p class="text-theme-sm text-gray-700 dark:text-gray-400">
                                                    Rp {{ number_format($tutor->total_fee, 0, ',', '.') }}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="px-5 py-3 whitespace-nowrap sm:px-6">
                                            <div class="flex items-center">
                                                @if ($tutor->status_pembayaran == 'Sudah Dibayar')
                                                    <p
                                                        class="bg-success-50 text-theme-xs text-success-600 dark:bg-success-500/15 dark:text-success-500 rounded-full px-2 py-0.5 font-medium">
                                                        {{ $tutor->status_pembayaran }}
                                                    </p>
                                                @else
                                                    <p
                                                        class="bg-warning-50 text-theme-xs text-warning-600 dark:bg-warning-500/15 dark:text-warning-400 rounded-full px-2 py-0.5 font-medium">
                                                        {{ $tutor->status_pembayaran }}
                                                    </p>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-5 py-3 whitespace-nowrap sm:px-6">
                                            <div class="flex items-center justify-start">
                                                <div x-data="{ open: false }" class="relative">
                                                    <button @click="open = !open"
                                                        class="text-gray-500 dark:text-gray-400">
                                                        <svg class="fill-current" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M5.99902 10.245C6.96552 10.245 7.74902 11.0285 7.74902 11.995V12.005C7.74902 12.9715 6.96552 13.755 5.99902 13.755C5.03253 13.755 4.24902 12.9715 4.24902 12.005V11.995C4.24902 11.0285 5.03253 10.245 5.99902 10.245ZM17.999 10.245C18.9655 10.245 19.749 11.0285 19.749 11.995V12.005C19.749 12.9715 18.9655 13.755 17.999 13.755C17.0325 13.755 16.249 12.9715 16.249 12.005V11.995C16.249 11.0285 17.0325 10.245 17.999 10.245ZM13.749 11.995C13.749 11.0285 12.9655 10.245 11.999 10.245C11.0325 10.245 10.249 11.0285 10.249 11.995V12.005C10.249 12.9715 11.0325 13.755 11.999 13.755C12.9655 13.755 13.749 12.9715 13.749 12.005V11.995Z"
                                                                fill=""></path>
                                                        </svg>
                                                    </button>
                                                    <div x-show="open" @click.outside="open = false"
                                                        class="shadow-theme-lg dark:bg-gray-dark absolute right-0 top-full z-10 mt-2 w-40 space-y-1 rounded-2xl border border-gray-200 bg-white p-2 dark:border-gray-800"
                                                        style="display: none;">
                                                        <button
                                                            class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                                            Ubah Status
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="border-t border-gray-200 px-6 py-4 dark:border-gray-800">
                        <div class="flex items-center justify-between">
                            <button class="text-theme-sm shadow-theme-xs flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-2 py-2 font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 sm:px-3.5 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                                <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.58301 9.99868C2.58272 10.1909 2.65588 10.3833 2.80249 10.53L7.79915 15.5301C8.09194 15.8231 8.56682 15.8233 8.85981 15.5305C9.15281 15.2377 9.15297 14.7629 8.86018 14.4699L5.14009 10.7472L16.6675 10.7472C17.0817 10.7472 17.4175 10.4114 17.4175 9.99715C17.4175 9.58294 17.0817 9.24715 16.6675 9.24715L5.14554 9.24715L8.86017 5.53016C9.15297 5.23717 9.15282 4.7623 8.85983 4.4695C8.56684 4.1767 8.09197 4.17685 7.79917 4.46984L2.84167 9.43049C2.68321 9.568 2.58301 9.77087 2.58301 9.99715C2.58301 9.99766 2.58301 9.99817 2.58301 9.99868Z" fill=""></path>
                                </svg>
                                <span class="hidden sm:inline"> Previous </span>
                            </button>
                            <span class="block text-sm font-medium text-gray-700 sm:hidden dark:text-gray-400">
                                Page 1 of 10
                            </span>
                            <ul class="hidden items-center gap-0.5 sm:flex">
                                <li>
                                    <a href="#" class="bg-brand-500/[0.08] text-theme-sm text-brand-500 hover:bg-brand-500/[0.08] hover:text-brand-500 dark:text-brand-500 dark:hover:text-brand-500 flex h-10 w-10 items-center justify-center rounded-lg font-medium">
                                        1
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-theme-sm hover:bg-brand-500/[0.08] hover:text-brand-500 dark:hover:text-brand-500 flex h-10 w-10 items-center justify-center rounded-lg font-medium text-gray-700 dark:text-gray-400">
                                        2
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-theme-sm hover:bg-brand-500/[0.08] hover:text-brand-500 dark:hover:text-brand-500 flex h-10 w-10 items-center justify-center rounded-lg font-medium text-gray-700 dark:text-gray-400">
                                        3
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-theme-sm hover:bg-brand-500/[0.08] hover:text-brand-500 dark:hover:text-brand-500 flex h-10 w-10 items-center justify-center rounded-lg font-medium text-gray-700 dark:text-gray-400">
                                        ...
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-theme-sm hover:bg-brand-500/[0.08] hover:text-brand-500 dark:hover:text-brand-500 flex h-10 w-10 items-center justify-center rounded-lg font-medium text-gray-700 dark:text-gray-400">
                                        8
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-theme-sm hover:bg-brand-500/[0.08] hover:text-brand-500 dark:hover:text-brand-500 flex h-10 w-10 items-center justify-center rounded-lg font-medium text-gray-700 dark:text-gray-400">
                                        9
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-theme-sm hover:bg-brand-500/[0.08] hover:text-brand-500 dark:hover:text-brand-500 flex h-10 w-10 items-center justify-center rounded-lg font-medium text-gray-700 dark:text-gray-400">
                                        10
                                    </a>
                                </li>
                            </ul>
                            <button class="text-theme-sm shadow-theme-xs flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-2 py-2 font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 sm:px-3.5 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                                <span class="hidden sm:inline"> Next </span>
                                <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17.4175 9.9986C17.4178 10.1909 17.3446 10.3832 17.198 10.53L12.2013 15.5301C11.9085 15.8231 11.4337 15.8233 11.1407 15.5305C10.8477 15.2377 10.8475 14.7629 11.1403 14.4699L14.8604 10.7472L3.33301 10.7472C2.91879 10.7472 2.58301 10.4114 2.58301 9.99715C2.58301 9.58294 2.91879 9.24715 3.33301 9.24715L14.8549 9.24715L11.1403 5.53016C10.8475 5.23717 10.8477 4.7623 11.1407 4.4695C11.4336 4.1767 11.9085 4.17685 12.2013 4.46984L17.1588 9.43049C17.3173 9.568 17.4175 9.77087 17.4175 9.99715C17.4175 9.99763 17.4175 9.99812 17.4175 9.9986Z" fill=""></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var options = {
                series: {!! json_encode($chartSeries) !!},
                chart: {
                    type: 'donut',
                    width: 380,
                },
                labels: {!! json_encode($chartLabels) !!},
                colors: ['#22c55e', '#f97316', '#ef4444', '#3b82f6'], // Hijau, Oranye, Merah, Biru
                legend: {
                    position: 'bottom',
                    horizontalAlign: 'center',
                    markers: {
                        radius: 12,
                    },
                    itemMargin: {
                        horizontal: 12,
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '75%',
                            labels: {
                                show: true,
                                total: {
                                    show: true,
                                    label: 'Total Sesi',
                                    formatter: function(w) {
                                        return w.globals.seriesTotals.reduce((a, b) => {
                                            return a + b
                                        }, 0)
                                    }
                                }
                            }
                        }
                    }
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: '100%'
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var chart = new ApexCharts(document.querySelector("#chartSeven"), options);
            chart.render();
        });
    </script>
@endpush
