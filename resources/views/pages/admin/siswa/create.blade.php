@extends('layouts.main')

@section('content')
    @include('components.alerts')
    @include('components.breadcrumb')

    <form action="/admin/siswa" method="POST">
        @csrf
        <div class="space-y-6">
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03] mt-6">
                <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-800">
                    <h2 class="text-lg font-medium text-gray-800 dark:text-white">
                        Form Tambah Siswa
                    </h2>
                </div>
                <div class="p-4 sm:p-6 dark:border-gray-800">
                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                        <div class="col-span-full">
                            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                                <div>
                                    <label for="product-name"
                                        class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Nama
                                        Siswa<span class="text-error-500">*</span></label>
                                    <input type="text" id="product-name" name="name"
                                        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                        placeholder="Masukkan nama siswa" required>
                                </div>
                                <div>
                                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                        Kelas
                                    </label>
                                    <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                                        <select
                                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                            :class="isOptionSelected & amp; & amp;
                                            'text-gray-800 dark:text-white/90'"
                                            @change="isOptionSelected = true">
                                            <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                                Pilih Kelas
                                            </option>
                                            <option value="Kelas 9A" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                                Kelas 9A
                                            </option>
                                            <option value="Kelas 8B" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                                Kelas 8B
                                            </option>
                                            <option value="Kelas 6C" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                                Kelas 6C
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
                                    <label for="product-name"
                                        class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Asal
                                        Sekolah<span class="text-error-500">*</span></label>
                                    <input type="text" id="product-name" name="school"
                                        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                        placeholder="Masukkan asal sekolah" required>
                                </div>
                                <div>
                                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                        Tanggal Masuk<span class="text-error-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <input
                                        type="date"
                                        name="enter_date"
                                        placeholder="Pilih tanggal masuk"
                                        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10
                                                dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300
                                                px-4 py-2.5 pr-11 pl-4 text-sm text-gray-800 placeholder:text-gray-400
                                                focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900
                                                dark:text-white/90 dark:placeholder:text-white/30"
                                        required
                                        >

                                        <span class="pointer-events-none absolute top-1/2 right-3 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                                        <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M6.66659 1.5415C7.0808 1.5415 7.41658 1.87729 7.41658 2.2915V2.99984H12.5833V2.2915C12.5833 1.87729 12.919 1.5415 13.3333 1.5415C13.7475 1.5415 14.0833 1.87729 14.0833 2.2915V2.99984L15.4166 2.99984C16.5212 2.99984 17.4166 3.89527 17.4166 4.99984V7.49984V15.8332C17.4166 16.9377 16.5212 17.8332 15.4166 17.8332H4.58325C3.47868 17.8332 2.58325 16.9377 2.58325 15.8332V7.49984V4.99984C2.58325 3.89527 3.47868 2.99984 4.58325 2.99984L5.91659 2.99984V2.2915C5.91659 1.87729 6.25237 1.5415 6.66659 1.5415ZM6.66659 4.49984H4.58325C4.30711 4.49984 4.08325 4.7237 4.08325 4.99984V6.74984H15.9166V4.99984C15.9166 4.7237 15.6927 4.49984 15.4166 4.49984H13.3333H6.66659ZM15.9166 8.24984H4.08325V15.8332C4.08325 16.1093 4.30711 16.3332 4.58325 16.3332H15.4166C15.6927 16.3332 15.9166 16.1093 15.9166 15.8332V8.24984Z"
                                            fill=""></path>
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
                <a href="/admin/siswa"
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
