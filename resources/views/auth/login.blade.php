<x-guest-layout>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <input type="email" name="email" id="email" wire:model="form.email" placeholder="Ingresa tu correo electrónico" autofocus
                required autocomplete="username" class="'py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500
disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400
dark:placeholder-neutral-500 dark:focus:ring-neutral-600" />

        </div>

        <!-- Password -->
        <div class="mt-4">

            <input type="password" name="password" id="password" wire:model="form.password"
                placeholder="Ingresa tu contraseña" required autocomplete="current-password" class="'py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500

                disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400
                dark:placeholder-neutral-500 dark:focus:ring-neutral-600" />



        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox"
                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Recordar contraseña') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('password.request') }}" wire:navigate>
                {{ __('¿Olvidaste tu contraseña?') }}
            </a>
            @endif

            <x-form.actions.button type="submit" class="w-full justify-center mt-4" variant="success">
                <x-slot name="text">
                    {{ __(' Iniciar sesión') }}
                </x-slot>
            </x-form.actions.button>
        </div>
    </form>
</x-guest-layout>