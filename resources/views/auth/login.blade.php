<x-guest-layout>
  <x-authentication-card>
    <x-slot name="logo">
      <x-authentication-card-logo />
    </x-slot>

    <x-validation-errors class="mb-4" />

    @if (session('status'))
      <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
      </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div>
        <x-label for="login" value="{{ __('Login') }}" />
        <x-input id="login" class="block mt-1 w-full" type="text" name="login" :value="old('login')" required autofocus
          autocomplete="login" />
      </div>

      <div class="mt-4">
        <x-label for="password" value="{{ __('Senha') }}" />
        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
          autocomplete="current-password" />
      </div>

      <div class="block mt-4">
        <label for="remember_me" class="flex items-center">
          <x-checkbox id="remember_me" name="remember" />
          <span class="ml-2 text-sm text-gray-600">{{ __('Lembrar de mim') }}</span>
        </label>
      </div>

      <div class="flex items-center justify-end mt-4">

        <x-button class="ml-4">
          {{ __('Login') }}
        </x-button>
      </div>
    </form>
  </x-authentication-card>
</x-guest-layout>
