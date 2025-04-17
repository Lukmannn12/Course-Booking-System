<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
  public LoginForm $form;

  /**
   * Handle an incoming authentication request.
   */
  public function login(): void
  {
    $this->validate();

    $this->form->authenticate();

    Session::regenerate();

    $user = Auth::user();

    if ($user->role === 'admin') {
      $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    } else {
      $this->redirectIntended(default: route('home', absolute: false), navigate: true);
    }
  }
}; ?>

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <h2 class="mt-5 text-center text-2xl font-bold tracking-tight text-gray-900">Sign in to your account</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login" class="space-y-6">
      <!-- Email Address -->
      <div>
        <x-input-label for="email" :value="__('Email address')" class="block text-sm font-medium text-gray-900" />
        <div class="mt-2">
          <x-text-input wire:model="form.email" id="email" type="email" name="email" required autofocus autocomplete="username" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm" />
          <x-input-error :messages="$errors->get('form.email')" class="mt-2 text-sm text-red-600" />
        </div>
      </div>

      <!-- Password -->
      <div>
        <div class="flex items-center justify-between">
          <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium text-gray-900" />
          @if (Route::has('password.request'))
          <div class="text-sm">
            <a href="{{ route('password.request') }}" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
          </div>
          @endif
        </div>
        <div class="mt-2">
          <x-text-input wire:model="form.password" id="password" type="password" name="password" required autocomplete="current-password" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm" />
          <x-input-error :messages="$errors->get('form.password')" class="mt-2 text-sm text-red-600" />
        </div>
      </div>

      <!-- Remember Me -->
      <div class="flex items-center">
        <input wire:model="form.remember" id="remember" type="checkbox" class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
        <label for="remember" class="ml-2 block text-sm text-gray-900">
          {{ __('Remember me') }}
        </label>
      </div>

      <div>
        <x-primary-button class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600">
          {{ __('Sign in') }}
        </x-primary-button>
      </div>
    </form>

    <p class="mt-10 text-center text-sm text-gray-500">
      Not a member?
      <a href="{{ route('register') }}" class="font-semibold text-indigo-600 hover:text-indigo-500">Register here</a>
    </p>
  </div>
</div>