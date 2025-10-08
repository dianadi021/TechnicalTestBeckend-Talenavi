<x-card-box-shadow-layout>
    <form id="loginForm" onsubmit="submitForm('loginForm')">
        @csrf
        <input type="hidden" name="token" class="csrf-token" />

        <!-- username Address -->
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autocomplete="username" />

            <ul class="hide_notif text-sm text-red-600 space-y-1 mt-2" id="err_username">
                <li></li>
            </ul>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />

            <ul class="hide_notif text-sm text-red-600 space-y-1 mt-2" id="err_password">
                <li></li>
            </ul>
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Ingat password') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4 gap-10">
            {{-- @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer"
                href="{{ route('password.request') }}">
                {{ __('Lupa password?') }}
            </a>
        @endif --}}

            <p class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer" onclick="openSection('registerSection')">
                {{ __('Belum terdaftar?') }}
            </p>

            <x-primary-button class="hideBtnProcess ms-3">
                {{ __('Masuk') }}
            </x-primary-button>
        </div>
    </form>
</x-card-box-shadow-layout>
