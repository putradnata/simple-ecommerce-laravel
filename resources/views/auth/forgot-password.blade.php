<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <span class="text-5xl font-extrabold text-green-500">
                    T
                </span>
                <span class="text-5xl font-extrabold">S</span>
            </a>
        </x-slot>

        <div class="mb-4  text-gray-600 text-base">
            {{ __('Lupa kata sandi Anda? Tidak masalah. Beri tahu kami alamat email Anda dan kami akan mengirimi Anda tautan setel ulang kata sandi melalui email yang memungkinkan Anda memilih yang baru.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Atur Ulang Kata Sandi Melalui Surel') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
