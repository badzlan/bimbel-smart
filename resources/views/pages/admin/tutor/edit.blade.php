@extends('layouts.main')

@section('content')
    @include('components.alerts')
    <div class="mt-5"></div>
    @include('components.breadcrumb')

    <form action="/admin/tutor/{{ $tutor->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="space-y-6">
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03] mt-6">
                <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-800">
                    <h2 class="text-lg font-medium text-gray-800 dark:text-white">
                        Form Edit Tutor
                    </h2>
                </div>
                <div class="p-4 sm:p-6 dark:border-gray-800">
                    <div class="space-y-5">
                        <div class="flex justify-center mt-3">
                            <div class="h-40 w-40 aspect-square">
                                <img src="{{ $tutor->image }}" id="imagePreview"
                                    class="h-full w-full rounded-full object-cover border border-gray-300 dark:border-gray-700"
                                    onclick="document.getElementById('imageInput').click()" />
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Foto Tutor
                                </label>
                                <input type="file" name="image" id="imageInput" value="{{ $tutor->image }}"
                                    class="focus:border-ring-brand-300 shadow-theme-xs focus:file:ring-brand-300 h-11 w-full overflow-hidden rounded-lg border border-gray-300 bg-transparent text-sm text-gray-500 transition-colors file:mr-5 file:border-collapse file:cursor-pointer file:rounded-l-lg file:border-0 file:border-r file:border-solid file:border-gray-200 file:bg-gray-50 file:py-3 file:pr-3 file:pl-3.5 file:text-sm file:text-gray-700 placeholder:text-gray-400 hover:file:bg-gray-100 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400 dark:text-white/90 dark:file:border-gray-800 dark:file:bg-white/[0.03] dark:file:text-gray-400 dark:placeholder:text-gray-400"
                                    accept="image/*">
                            </div>
                            <div>
                                <label for="nama-tutor"
                                    class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Nama
                                    Tutor<span class="text-error-500">*</span></label>
                                <input type="text" id="nama-tutor" name="name" value="{{ $tutor->name }}"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                    placeholder="Masukkan nama tutor" required>
                            </div>
                            <div>
                                <label for="gelar-tutor"
                                    class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Gelar<span
                                        class="text-error-500">*</span></label>
                                <input type="text" id="gelar-tutor" name="degree" value="{{ $tutor->degree }}"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                    placeholder="Masukkan gelar" required>
                            </div>
                            <div>
                                <label for="email-tutor"
                                    class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Email<span
                                        class="text-error-500">*</span></label>
                                <input type="text" id="email-tutor" name="email" value="{{ $tutor->email }}"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                    placeholder="Masukkan email" required>
                            </div>
                            <div>
                                <label for="telepon-tutor"
                                    class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">No.
                                    Telepon<span class="text-error-500">*</span></label>
                                <input type="text" id="telepon-tutor" name="phone" value="{{ $tutor->phone }}"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                    placeholder="Masukkan nomor telepon" required>
                            </div>
                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Password
                                </label>
                                <div x-data="{ showPassword: false }" class="relative">
                                    <input name="password" :type="showPassword ? 'text' : 'password'"
                                        placeholder="Masukkan password tutor yang baru"
                                        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent py-2.5 pr-11 pl-4 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                        autocomplete="off">
                                    <span @click="showPassword = !showPassword"
                                        class="absolute top-1/2 right-4 z-30 -translate-y-1/2 cursor-pointer text-gray-500 dark:text-gray-400">
                                        <svg x-show="!showPassword" class="fill-current" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M10.0002 13.8619C7.23361 13.8619 4.86803 12.1372 3.92328 9.70241C4.86804 7.26761 7.23361 5.54297 10.0002 5.54297C12.7667 5.54297 15.1323 7.26762 16.0771 9.70243C15.1323 12.1372 12.7667 13.8619 10.0002 13.8619ZM10.0002 4.04297C6.48191 4.04297 3.49489 6.30917 2.4155 9.4593C2.3615 9.61687 2.3615 9.78794 2.41549 9.94552C3.49488 13.0957 6.48191 15.3619 10.0002 15.3619C13.5184 15.3619 16.5055 13.0957 17.5849 9.94555C17.6389 9.78797 17.6389 9.6169 17.5849 9.45932C16.5055 6.30919 13.5184 4.04297 10.0002 4.04297ZM9.99151 7.84413C8.96527 7.84413 8.13333 8.67606 8.13333 9.70231C8.13333 10.7286 8.96527 11.5605 9.99151 11.5605H10.0064C11.0326 11.5605 11.8646 10.7286 11.8646 9.70231C11.8646 8.67606 11.0326 7.84413 10.0064 7.84413H9.99151Z"
                                                fill="#98A2B3"></path>
                                        </svg>
                                        <svg x-show="showPassword" class="fill-current" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M4.63803 3.57709C4.34513 3.2842 3.87026 3.2842 3.57737 3.57709C3.28447 3.86999 3.28447 4.34486 3.57737 4.63775L4.85323 5.91362C3.74609 6.84199 2.89363 8.06395 2.4155 9.45936C2.3615 9.61694 2.3615 9.78801 2.41549 9.94558C3.49488 13.0957 6.48191 15.3619 10.0002 15.3619C11.255 15.3619 12.4422 15.0737 13.4994 14.5598L15.3625 16.4229C15.6554 16.7158 16.1302 16.7158 16.4231 16.4229C16.716 16.13 16.716 15.6551 16.4231 15.3622L4.63803 3.57709ZM12.3608 13.4212L10.4475 11.5079C10.3061 11.5423 10.1584 11.5606 10.0064 11.5606H9.99151C8.96527 11.5606 8.13333 10.7286 8.13333 9.70237C8.13333 9.5461 8.15262 9.39434 8.18895 9.24933L5.91885 6.97923C5.03505 7.69015 4.34057 8.62704 3.92328 9.70247C4.86803 12.1373 7.23361 13.8619 10.0002 13.8619C10.8326 13.8619 11.6287 13.7058 12.3608 13.4212ZM16.0771 9.70249C15.7843 10.4569 15.3552 11.1432 14.8199 11.7311L15.8813 12.7925C16.6329 11.9813 17.2187 11.0143 17.5849 9.94561C17.6389 9.78803 17.6389 9.61696 17.5849 9.45938C16.5055 6.30925 13.5184 4.04303 10.0002 4.04303C9.13525 4.04303 8.30244 4.17999 7.52218 4.43338L8.75139 5.66259C9.1556 5.58413 9.57311 5.54303 10.0002 5.54303C12.7667 5.54303 15.1323 7.26768 16.0771 9.70249Z"
                                                fill="#98A2B3"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">
                <a href="/admin/tutor"
                    class="shadow-theme-xs inline-flex items-center justify-center gap-2 rounded-lg bg-white px-4 py-3 text-sm font-medium text-gray-700 ring-1 ring-gray-300 transition hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700 dark:hover:bg-white/[0.03]">
                    Batal
                </a>
                <button type="submit"
                    class="bg-brand-500 shadow-theme-xs hover:bg-brand-600 inline-flex items-center justify-center gap-2 rounded-lg px-4 py-3 text-sm font-medium text-white transition">
                    Simpan
                </button>
            </div>
            <div class="grid grid-cols-1">
                <div class="col-span-12">
                    <div class="rounded-2xl border border-gray-200 bg-white pt-4 dark:border-gray-800 dark:bg-white/[0.03]">
                        <div class="mb-4 flex flex-col gap-2 px-5 sm:flex-row sm:items-center sm:justify-between sm:px-6">
                            <div>
                                <h3 id="total-fee" class="text-lg font-semibold text-gray-800 dark:text-white/90">
                                    Total Fee B : Rp. {{ number_format($total_tutor['fee'], 0, ',', '.') }}
                                </h3>
                            </div>
                            <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                                <form>
                                    <div class="relative">
                                        <span class="pointer-events-none absolute top-1/2 left-4 -translate-y-1/2">
                                            <svg class="fill-gray-500 dark:fill-gray-400" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.04199 9.37381C3.04199 5.87712 5.87735 3.04218 9.37533 3.04218C12.8733 3.04218 15.7087 5.87712 15.7087 9.37381C15.7087 12.8705 12.8733 15.7055 9.37533 15.7055C5.87735 15.7055 3.04199 12.8705 3.04199 9.37381ZM9.37533 1.54218C5.04926 1.54218 1.54199 5.04835 1.54199 9.37381C1.54199 13.6993 5.04926 17.2055 9.37533 17.2055C11.2676 17.2055 13.0032 16.5346 14.3572 15.4178L17.1773 18.2381C17.4702 18.531 17.945 18.5311 18.2379 18.2382C18.5308 17.9453 18.5309 17.4704 18.238 17.1775L15.4182 14.3575C16.5367 13.0035 17.2087 11.2671 17.2087 9.37381C17.2087 5.04835 13.7014 1.54218 9.37533 1.54218Z" fill=""></path>
                                            </svg>
                                        </span>
                                        <input type="text" placeholder="Search..." class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-[42px] w-full rounded-lg border border-gray-300 bg-transparent py-2.5 pr-4 pl-[42px] text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden xl:w-[300px] dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                                    </div>
                                </form>
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
    </form>
@endsection

@push('scripts')
    <script>
        document.getElementById('imageInput').addEventListener('change', function(e) {
            const preview = document.getElementById('imagePreview');
            const file = this.files[0];

            if (!file) {
                preview.src = "";
                return;
            }

            preview.src = URL.createObjectURL(file);
        });
    </script>
@endpush
