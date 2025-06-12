<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email) . '|' . request()->ip());
    }
}; ?>

<div class="flex flex-col gap-6">
    <div class="text-center">
        <h1 class="text-2xl text-gray-800 font-semibold">Log in to your account</h1>
        <p class="text-gray-600 mt-2">Enter your email and password below to log in</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="login" class="flex flex-col gap-6">
        <!-- Email Address -->
        <label for="content" class="block font-medium text-sm text-gray-600">Email</label>
        <flux:input
            wire:model="email"
            type="email"
            required
            autofocus
            autocomplete="email"
            placeholder="email@example.com" />

        <!-- Password -->
        <div class="relative">
            <label for="content" class="block font-medium text-sm text-gray-600">Password</label>
            <flux:input
                wire:model="password"
                type="password"
                required
                autocomplete="current-password"
                :placeholder="__('Password')"
                viewable />

            @if (Route::has('password.request'))
            <flux:link class="absolute end-0 top-0 text-sm dark:text-zinc-400" :href="route('password.request')" wire:navigate>
                {{ __('Forgot your password?') }}
            </flux:link>
            @endif
        </div>

        <!-- Remember Me -->
        <div class="flex">
            <flux:checkbox wire:model="remember" />
            <label for="content" class="block font-medium text-sm text-gray-600 ml-2">Remember me</label>
        </div>

        <div class="flex items-center justify-end dark:text-zinc-800">
            <flux:button variant="primary" type="submit" class="w-full">{{ __('Log in') }}</flux:button>
        </div>
    </form>

    @if (Route::has('register'))
    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-800">
        {{ __('Don\'t have an account?') }}
        <a href="{{ route('register') }}" class="inline px-6 py-2 hover:text-green-300 text-sm">
            Sign up
        </a>
    </div>
    @endif
</div>