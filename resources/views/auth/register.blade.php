<x-guest-layout>
  <x-authentication-card>
    <x-slot name="logo">
      <x-authentication-card-logo />
    </x-slot>

    <x-validation-errors class="mb-4" />

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <div>
        <x-label for="name" value="{{ __('Nome') }}" />
        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('Nome')" required autofocus
          autocomplete="name" />
      </div>

      <div class="mt-4">
        <x-label for="username" value="{{ __('Nome de usuário') }}" />
        <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('email')" required
          autocomplete="username" />
      </div>

      <div class="mt-4">
        <x-label for="email" value="{{ __('Email') }}" />
        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
          autocomplete="username" />
      </div>

      <div class="mt-4">
        <x-label for="password" value="{{ __('Senha') }}" />
        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
          autocomplete="new-password" />
      </div>

      <div class="mt-4">
        <x-label for="password_confirmation" value="{{ __('Confirmar senha') }}" />
        <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"
          required autocomplete="new-password" />
      </div>
      <div class="mt-4">
        <x-label for="departament" value="{{ __('Departamento:') }}" />
        <select name="departament"
          class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
          <option value="1">Fiscal</option>
          <option value="2">Contábil</option>
          <option value="3">Pessoal</option>
          <option value="4">Qualidade</option>
          <option value="5">Recursos Humanos</option>
          <option value="6">T.I</option>
          <option value="7">Financeiro</option>
        </select>
      </div>
      <div class="mt-4">
        <x-label for="role_id" value="{{ __('Cadastrar como:') }}" />
        <select name="role_id"
          class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
          <option value="1">Colaborador</option>
          <option value="2">Coordenador</option>
          <option value="3">Gerente</option>
        </select>
      </div>

      @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
        <div class="mt-4">
          <x-label for="terms">
            <div class="flex items-center">
              <x-checkbox name="terms" id="terms" required />

              <div class="ml-2">
                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                    'terms_of_service' =>
                        '<a target="_blank" href="' .
                        route('terms.show') .
                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                        __('Terms of Service') .
                        '</a>',
                    'privacy_policy' =>
                        '<a target="_blank" href="' .
                        route('policy.show') .
                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                        __('Privacy Policy') .
                        '</a>',
                ]) !!}
              </div>
            </div>
          </x-label>
        </div>
      @endif

      <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
          href="{{ route('login') }}">
          {{ __('Já registrado?') }}
        </a>

        <x-button class="ml-4">
          {{ __('Registrar') }}
        </x-button>
      </div>
    </form>
  </x-authentication-card>
</x-guest-layout>
