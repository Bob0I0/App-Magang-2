<x-layouts::auth>
    <div class="flex flex-col">
        {{-- <img src="{{ asset('images/Pertamina Logo.png') }}" alt="Logo" class="mx-auto mb-4 rounded-xl"> --}}
        <img src="{{ asset('images/Login-Hitam.png') }}" class="m-12 rounded-xl block dark:hidden">
        <img src="{{ asset('images/Login-Putih.png') }}" class="m-12 hidden dark:block">
        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-6">
            @csrf

            <!-- Email Address -->
            <flux:input
                wire:model="username"
                :label="__('Username')"
                type="text"
                required
                autofocus
                autocomplete="username"
                placeholder="Username"
                class="rounded-lg "
            />

            <!-- Password -->
            <div class="relative">
                <flux:input
                    name="password"
                    :label="__('Password')"
                    type="password"
                    required
                    autocomplete="current-password"
                    :placeholder="__('********')"
                    viewable
                />
            </div>

            <!-- Remember Me -->
            <flux:checkbox name="remember" :label="__('Remember me')" :checked="old('remember')" />

            <div class="flex items-center justify-end">
                <flux:button variant="primary" type="submit" class="w-full" data-test="login-button">
                    {{ __('Log in') }}
                </flux:button>
            </div>
        </form>
    </div>
</x-layouts::auth>
