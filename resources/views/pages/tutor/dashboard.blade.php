@extends('layouts.main')

@section('content')
<div class="space-y-6">
    {{-- Breadcrumb --}}
    @include('components.alerts')
    @include('components.breadcrumb')

    {{-- Kartu Statistik --}}
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <article class="flex items-center gap-5 rounded-2xl border border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-white/3">
            <div class="inline-flex h-16 w-16 items-center justify-center rounded-xl bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-white/90">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.75 3.25C12.75 2.83579 12.4142 2.5 12 2.5C11.5858 2.5 11.25 2.83579 11.25 3.25V4.5H4.75C3.50736 4.5 2.5 5.50736 2.5 6.75V15C2.5 16.2426 3.50736 17.25 4.75 17.25H7.90742L6.79074 20.507C6.6564 20.8988 6.86514 21.3253 7.25696 21.4597C7.64878 21.594 8.07532 21.3853 8.20966 20.9934L9.49313 17.25H11.25V21.25C11.25 21.6642 11.5858 22 12 22C12.4142 22 12.75 21.6642 12.75 21.25V17.25H14.5073L15.7907 20.9934C15.9251 21.3853 16.3516 21.594 16.7434 21.4597C17.1353 21.3253 17.344 20.8988 17.2097 20.507L16.093 17.25H19.25C20.4926 17.25 21.5 16.2426 21.5 15V6.75C21.5 5.50736 20.4926 4.5 19.25 4.5H12.75V3.25ZM19.25 15.75C19.6642 15.75 20 15.4142 20 15V6.75C20 6.33579 19.6642 6 19.25 6H4.75C4.33579 6 4 6.33579 4 6.75V15C4 15.4142 4.33579 15.75 4.75 15.75H19.25Z" fill="#343C54"/>
                </svg>
            </div>
            <div>
                <h3 class="text-2xl font-semibold text-gray-800 dark:text-white/90">{{ $total_kelas }}</h3>
                <p class="flex items-center gap-3 text-gray-500 dark:text-gray-400">Total Kelas Saya</p>
            </div>
        </article>
        <article class="flex items-center gap-5 rounded-2xl border border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-white/3">
            <div class="inline-flex h-16 w-16 items-center justify-center rounded-xl bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-white/90">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.75 2C5.50736 2 4.5 3.00736 4.5 4.25V6.25H3.25C2.83579 6.25 2.5 6.58579 2.5 7C2.5 7.41421 2.83579 7.75 3.25 7.75H4.5V11.25H3.25C2.83579 11.25 2.5 11.5858 2.5 12C2.5 12.4142 2.83579 12.75 3.25 12.75H4.5V16.25H3.25C2.83579 16.25 2.5 16.5858 2.5 17C2.5 17.4142 2.83579 17.75 3.25 17.75H4.5V19.75C4.5 20.9926 5.50736 22 6.75 22H17.25C18.4926 22 19.5 20.9926 19.5 19.75V4.25C19.5 3.00736 18.4926 2 17.25 2H6.75ZM6 17.75V19.75C6 20.1642 6.33579 20.5 6.75 20.5H17.25C17.6642 20.5 18 20.1642 18 19.75V4.25C18 3.83579 17.6642 3.5 17.25 3.5H6.75C6.33579 3.5 6 3.83579 6 4.25V6.25H7.25C7.66421 6.25 8 6.58579 8 7C8 7.41421 7.66421 7.75 7.25 7.75H6V11.25H7.25C7.66421 11.25 8 11.5858 8 12C8 12.4142 7.66421 12.75 7.25 12.75H6V16.25H7.25C7.66421 16.25 8 16.5858 8 17C8 17.4142 7.66421 17.75 7.25 17.75H6Z" fill="#323544"/>
                </svg>
            </div>
            <div>
                <h3 class="text-2xl font-semibold text-gray-800 dark:text-white/90">{{ $total_siswa }}</h3>
                <p class="flex items-center gap-3 text-gray-500 dark:text-gray-400">Total Siswa Saya</p>
            </div>
        </article>
        <article class="flex items-center gap-5 rounded-2xl border border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-white/3">
            <div class="inline-flex h-16 w-16 items-center justify-center rounded-xl bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-white/90">
                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.9104 6.27879C2.71011 6.60041 1.99779 7.83416 2.31941 9.03446L4.75231 18.1016V18.4998C4.75231 19.7424 5.75967 20.7498 7.00231 20.7498H20.0023C21.2449 20.7498 22.2523 19.7424 22.2523 18.4998V9.82408C22.2523 8.59588 21.2682 7.59753 20.0455 7.57448L19.2231 4.50513C18.9015 3.30483 17.6677 2.59252 16.4674 2.91414L3.9104 6.27879ZM20.7523 10.8172V9.82408C20.7523 9.40986 20.4165 9.07408 20.0023 9.07408H7.00231C6.58809 9.07408 6.25231 9.40986 6.25231 9.82408V10.8172H20.7523ZM4.75231 12.3186V9.82408C4.75231 8.58143 5.75967 7.57408 7.00231 7.57408H18.4925L17.7742 4.89336C17.667 4.49326 17.2558 4.25582 16.8557 4.36303L4.29863 7.72768C3.89853 7.83488 3.6611 8.24613 3.7683 8.64623L4.75231 12.3186ZM6.25231 13.6145H20.7523V18.4998C20.7523 18.914 20.4165 19.2498 20.0023 19.2498H7.00231C6.5881 19.2498 6.25231 18.914 6.25231 18.4998V13.6145Z" fill="#323544"/>
                </svg>
            </div>
            <div>
                <h3 class="text-2xl font-semibold text-gray-800 dark:text-white/90">Rp. {{ number_format($total_tutor['fee'], 0, ',', '.') }}</h3>
                <p class="flex items-center gap-3 text-gray-500 dark:text-gray-400">Pendapatan Bulan Ini</p>
            </div>
        </article>

    </div>

    <div class="grid grid-cols-1">
        <div class="col-span-12">
            <div class="rounded-2xl border border-gray-200 bg-white pt-4 dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="mb-4 flex flex-col gap-2 px-5 sm:flex-row sm:items-center sm:justify-between sm:px-6">
                    <div>
                        <h3 id="total-fee" class="text-lg font-semibold text-gray-800 dark:text-white/90">
                            Detail Pendapatan
                        </h3>
                    </div>
                </div>

                <div class="custom-scrollbar max-w-full overflow-x-auto overflow-y-visible px-5 sm:px-6">
                    <table class="min-w-full">
                        <thead class="border-y border-gray-100 py-3 dark:border-gray-800">
                            <tr>
                                <th class="w-14 px-5 py-4 text-left">
                                </th>
                                <th class="py-3 pr-5 font-normal whitespace-nowrap sm:pr-6">
                                    <div class="flex items-center">
                                        <p class="text-theme-sm text-gray-500 dark:text-gray-400">Kelas</p>
                                    </div>
                                </th>
                                <th class="px-5 py-3 font-normal whitespace-nowrap sm:px-6">
                                    <div class="flex items-center">
                                        <p class="text-theme-sm text-gray-500 dark:text-gray-400">Jumlah Hadir (x50rb)</p>
                                    </div>
                                </th>
                                <th class="px-5 py-3 font-normal whitespace-nowrap sm:px-6">
                                    <div class="flex items-center">
                                        <p class="text-theme-sm text-gray-500 dark:text-gray-400">Jumlah Sakit (x25rb)</p>
                                    </div>
                                </th>
                                <th class="px-5 py-3 font-normal whitespace-nowrap sm:px-6">
                                    <div class="flex items-center">
                                        <p class="text-theme-sm text-gray-500 dark:text-gray-400">Jumlah Izin (x25rb)</p>
                                    </div>
                                </th>
                                <th class="px-5 py-3 font-normal whitespace-nowrap sm:px-6">
                                    <div class="flex items-center">
                                        <p class="text-theme-sm text-gray-500 dark:text-gray-400">Jumlah Alpa (x0)</p>
                                    </div>
                                </th>
                                <th class="py-3 pr-5 font-normal whitespace-nowrap sm:pr-6">
                                    <div class="flex items-center">
                                        <p class="text-theme-sm text-gray-500 dark:text-gray-400">Total Fee</p>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                            @forelse ($kelas as $item)
                            <tr>
                                <td class="w-14 px-5 py-4 whitespace-nowrap">
                                </td>
                                <td class="py-3 pr-5 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <span class="text-sm font-medium text-gray-700 dark:text-gray-400">{{ $item->name }}</span>
                                    </div>
                                </td>
                                <td class="px-5 py-3 whitespace-nowrap sm:px-6">
                                    <div class="flex items-center">
                                        <p class="bg-success-50 text-theme-xs text-success-600 dark:bg-success-500/15 dark:text-success-500 rounded-full px-2 py-0.5 font-medium">
                                            {{ $item->hadir }} Siswa
                                        </p>
                                    </div>
                                </td>
                                <td class="px-5 py-3 whitespace-nowrap sm:px-6">
                                    <div class="flex items-center">
                                        <p class="bg-warning-50 text-theme-xs text-warning-600 dark:bg-success-500/15 dark:text-success-500 rounded-full px-2 py-0.5 font-medium">
                                            {{ $item->sakit }} Siswa
                                        </p>
                                    </div>
                                </td>
                                <td class="px-5 py-3 whitespace-nowrap sm:px-6">
                                    <div class="flex items-center">
                                        <p class="bg-blue-light-50 text-theme-xs text-blue-light-500 dark:bg-success-500/15 dark:text-success-500 rounded-full px-2 py-0.5 font-medium">
                                            {{ $item->izin }} Siswa
                                        </p>
                                    </div>
                                </td>
                                <td class="px-5 py-3 whitespace-nowrap sm:px-6">
                                    <div class="flex items-center">
                                        <p class="bg-red-50 text-theme-xs text-red-600 dark:bg-success-500/15 dark:text-success-500 rounded-full px-2 py-0.5 font-medium">
                                            {{ $item->alpa }} Siswa
                                        </p>
                                    </div>
                                </td>
                                <td class="py-3 pr-5 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <span class="text-sm font-medium text-gray-700 dark:text-gray-400">
                                            Rp. {{ number_format($item->fee, 0, ',', '.') }}
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="p-5 text-center text-gray-500 dark:text-gray-400">
                                    Belum memiliki kelas.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>

          var options = {
          series: [{
          name: 'Alpa',
          data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
        }, {
          name: 'Hadir',
          data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
        }, {
          name: 'Izin',
          data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
        }],
          chart: {
          type: 'bar',
        },
        dataLabels: {
          enabled: false
        },
        xaxis: {
          categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return "$ " + val + " thousands"
            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
</script>
@endpush

