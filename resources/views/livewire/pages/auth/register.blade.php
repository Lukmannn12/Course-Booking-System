<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['role'] = $validated['role'] ?? 'user';

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        if ($user->role === 'admin') {
            $this->redirect(route('dashboard', absolute: false), navigate: true);
        } else {
            $this->redirect(route('home', absolute: false), navigate: true);
        }
        
    }
}; ?>

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <h2 class="mt-5 text-center text-2xl font-bold tracking-tight text-gray-900">Create your account</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form wire:submit="register" class="space-y-3">
      <!-- Name -->
      <div>
        <x-input-label for="name" :value="__('Name')" class="block text-sm font-medium text-gray-900" />
        <div class="mt-2">
          <x-text-input wire:model="name" id="name" type="text" name="name" required autofocus autocomplete="name"
            class="block w-full rounded-md bg-white px-3 py-1.5 text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm" />
          <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-600" />
        </div>
      </div>

      <!-- Email -->
      <div>
        <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-gray-900" />
        <div class="mt-2">
          <x-text-input wire:model="email" id="email" type="email" name="email" required autocomplete="username"
            class="block w-full rounded-md bg-white px-3 py-1.5 text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm" />
          <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
        </div>
      </div>

      <!-- Password -->
      <div>
        <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium text-gray-900" />
        <div class="mt-2">
          <x-text-input wire:model="password" id="password" type="password" name="password" required autocomplete="new-password"
            class="block w-full rounded-md bg-white px-3 py-1.5 text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm" />
          <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
        </div>
      </div>

      <!-- Confirm Password -->
      <div>
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="block text-sm font-medium text-gray-900" />
        <div class="mt-2">
          <x-text-input wire:model="password_confirmation" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
            class="block w-full rounded-md bg-white px-3 py-1.5 text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm" />
          <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600" />
        </div>
      </div>

      <!-- Link + Button -->
      <div class="flex items-center justify-between">
        <a href="{{ route('login') }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-500">
          {{ __('Already registered?') }}
        </a>
        <x-primary-button class="bg-indigo-600 hover:bg-indigo-500 text-white font-semibold px-4 py-2 rounded-md shadow-sm">
          {{ __('Register') }}
        </x-primary-button>
      </div>
    </form>
  </div>
</div>
