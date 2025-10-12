@extends('layouts.auth')

@section('content')
    <div class="flex w-full flex-1 flex-col lg:w-1/2">
        <div class="mx-auto flex w-full max-w-md flex-1 flex-col justify-center">
            <div class="mb-5 sm:mb-8">
                <h1 class="text-title-sm sm:text-title-md mb-2 font-semibold text-gray-800 dark:text-white/90">
                    Lupa Password Anda?
                </h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Masukkan alamat email yang terhubung dengan akun Anda, dan kami akan mengirimkan link untuk mereset password Anda.
                </p>
            </div>
            <div>
                <form>
                    <div class="space-y-5">
                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Email<span class="text-error-500">*</span>
                            </label>
                            <input type="email" placeholder="Masukkan email Anda" class="dark:bg-dark-900 font-noraml shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-left text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                        </div>
                        <div>
                            <a href="/sign-in" class="bg-brand-500 shadow-theme-xs hover:bg-brand-600 flex w-full items-center justify-center rounded-lg px-4 py-3 text-sm font-medium text-white transition">
                                Kirim Link Reset
                            </a>
                        </div>
                    </div>
                </form>
                <div class="mt-5">
                    <p class="text-center text-sm font-normal text-gray-700 sm:text-start dark:text-gray-400">
                        Tunggu, saya ingat password saya...
                        <a href="/sign-in" class="text-brand-500 hover:text-brand-600 dark:text-brand-400">Klik di sini</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
