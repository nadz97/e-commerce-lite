<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="space-y-6">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login" class="space-y-4">
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="form.email" id="email" type="email" name="email" required autofocus
                autocomplete="username"
                class="block mt-1 w-full rounded-lg bg-teal text-brand shadow-insetpop focus:ring-2 focus:ring-brand" />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input wire:model="form.password" id="password" type="password" name="password" required
                autocomplete="current-password"
                class="block mt-1 w-full rounded-lg bg-teal text-brand shadow-insetpop focus:ring-2 focus:ring-brand" />
            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox"
                    class="rounded bg-teal border-gray-300 text-brand shadow-insetpop focus:ring-brand" name="remember">
                <span class="ms-2 text-sm text-brand hover:text-brand/80 transition-colors">
                    {{ __('Remember me') }}
                </span>
            </label>
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-between">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" wire:navigate
                    class="underline text-sm text-brand hover:text-brand/80 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand transition-colors">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3 bg-teal text-brand shadow-popout hover:shadow-md transition-shadow">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

    </form>
</div>
