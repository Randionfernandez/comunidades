   <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('propiedades') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>
            <div>
                <x-jet-label for="apellido1" value="{{ __('apellido1') }}" />
                <x-jet-input id="apellido1" class="block mt-1 w-full" type="text" name="apellido1" :value="old('apellido1')" required autofocus autocomplete="apellido2" />
            </div>
            <div>
                <x-jet-label for="apellido2" value="{{ __('apellido2') }}" />
                <x-jet-input id="apellido2" class="block mt-1 w-full" type="text" name="apellido2" :value="old('apellido2')" required autofocus autocomplete="apellido2" />
            </div>
            <div>
                <x-jet-label for="nif" value="{{ __('nif') }}" />
                <x-jet-input id="nif" class="block mt-1 w-full" type="text" name="nif" :value="old('nif')" required autofocus autocomplete="nif" />
            </div>
            <div>
                <x-jet-label for="telefono" value="{{ __('telefono') }}" />
                <x-jet-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" required autofocus autocomplete="telefono" />
            </div>

            <div>
                <x-jet-label for="fecha" value="{{ __('fecha') }}" />
                <x-jet-input id="fecha" class="block mt-1 w-full" type="text" name="fecha" :value="old('fecha')" required autofocus autocomplete="fecha" />
            </div>
            <div>
                <x-jet-label for="tipo" value="{{ __('tipo') }}" />
                <x-jet-input id="tipo" class="block mt-1 w-full" type="text" name="tipo" :value="old('tipo')" required autofocus autocomplete="tipo" />
            </div>
            <div>
                <x-jet-label for="calle" value="{{ __('calle') }}" />
                <x-jet-input id="calle" class="block mt-1 w-full" type="text" name="calle" :value="old('calle')" required autofocus autocomplete="calle" />
            </div>
            <div>
                <x-jet-label for="portal" value="{{ __('portal') }}" />
                <x-jet-input id="portal" class="block mt-1 w-full" type="text" name="portal" :value="old('portal')" required autofocus autocomplete="portal" />
            </div>
            <div>
                <x-jet-label for="bloque" value="{{ __('bloque') }}" />
                <x-jet-input id="bloque" class="block mt-1 w-full" type="text" name="bloque" :value="old('bloque')" required autofocus autocomplete="bloque" />
            </div>
            <div>
                <x-jet-label for="escalera" value="{{ __('escalera') }}" />
                <x-jet-input id="escalera" class="block mt-1 w-full" type="text" name="escalera" :value="old('escalera')" required autofocus autocomplete="escalera" />
            </div>
            <div>
                <x-jet-label for="piso" value="{{ __('piso') }}" />
                <x-jet-input id="piso" class="block mt-1 w-full" type="text" name="piso" :value="old('piso')" required autofocus autocomplete="piso" />
            </div>
            <div>
                <x-jet-label for="puerta" value="{{ __('puerta') }}" />
                <x-jet-input id="puerta" class="block mt-1 w-full" type="text" name="puerta" :value="old('puerta')" required autofocus autocomplete="puerta" />
            </div>
            <div>
                <x-jet-label for="codigo_pais" value="{{ __('codigo_pais') }}" />
                <x-jet-input id="codigo_pais" class="block mt-1 w-full" type="text" name="codigo_pais" :value="old('codigo_pais')" required autofocus autocomplete="codigo_pais" />
            </div>
            <div>
                <x-jet-label for="cp" value="{{ __('cp') }}" />
                <x-jet-input id="cp" class="block mt-1 w-full" type="text" name="cp" :value="old('cp')" required autofocus autocomplete="cp" />
            </div>
            <div>
                <x-jet-label for="pais" value="{{ __('pais') }}" />
                <x-jet-input id="pais" class="block mt-1 w-full" type="text" name="pais" :value="old('pais')" required autofocus autocomplete="pais" />
            </div>
            <div>
                <x-jet-label for="provincia" value="{{ __('provincia') }}" />
                <x-jet-input id="provincia" class="block mt-1 w-full" type="text" name="provincia" :value="old('provincia')" required autofocus autocomplete="provincia" />
            </div>
            <div>
                <x-jet-label for="localidad" value="{{ __('localidad') }}" />
                <x-jet-input id="localidad" class="block mt-1 w-full" type="text" name="localidad" :value="old('localidad')" required autofocus autocomplete="localidad" />
            </div>
            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-jet-label for="terms">
                    <div class="flex items-center">
                        <x-jet-checkbox name="terms" id="terms"/>

                        <div class="ml-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
                @endif

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-jet-button class="ml-4">
                        {{ __('Register') }}
                    </x-jet-button>
                </div>
            </form>
        </x-jet-authentication-card>
    </x-guest-layout>