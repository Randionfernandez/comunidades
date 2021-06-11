<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Introduce el nombre..." />
            </div>
            <div>
                <x-jet-label for="apellido1" value="{{ __('Apellido 1') }}" />
                <x-jet-input id="apellido1" class="block mt-1 w-full" type="text" name="apellido1" :value="old('apellido1')" required autofocus autocomplete="apellido1" placeholder="Introduce el primer apellido..."/>
            </div>
            <div>
                <x-jet-label for="apellido2" value="{{ __('Apellido 2') }}" />
                <x-jet-input id="apellido2" class="block mt-1 w-full" type="text" name="apellido2" :value="old('apellido2')" required autofocus autocomplete="apellido2" placeholder="Introduce el segundo apellido..."/>
            </div>
              <div class="mt-4">
                <x-jet-label for="nif" value="{{ __('Nif') }}" />
                <x-jet-input id="nif" class="block mt-1 w-full" type="text" name="nif" :value="old('nif')" required placeholder="Introduce el dni con letra..."/>
            </div>
            <div>
                <x-jet-label for="telefono" value="{{ __('Teléfono') }}" />
                <x-jet-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" required autofocus autocomplete="telefono" placeholder="Introduce el teléfono..."/>
            </div>
                 <div>
                <x-jet-label for="calle" value="{{ __('Calle') }}" />
                <x-jet-input id="calle" class="block mt-1 w-full" type="text" name="calle" :value="old('calle')" required autofocus autocomplete="" placeholder="Introduce la calle ..."/>
            </div>
               <div>
                <x-jet-label for="portal" value="{{ __('Portal') }}" />
                <x-jet-input id="portal" class="block mt-1 w-full" type="text" name="portal" :value="old('portal')" required autofocus autocomplete="" placeholder="Introduce el portal ..."/>
            </div>

             <div>
                <x-jet-label for="bloque" value="{{ __('Bloque') }}" />
                <x-jet-input id="bloque" class="block mt-1 w-full" type="text" name="bloque" :value="old('bloque')" required autofocus autocomplete="bloque" placeholder="Introduce el bloque..."/>
            </div>   <div>
                <x-jet-label for="escalera" value="{{ __('escalera') }}" />
                <x-jet-input id="escalera" class="block mt-1 w-full" type="text" name="escalera" :value="old('escalera')" required autofocus autocomplete="escalera" placeholder="Introduce la escalera ..."/>
            </div>
              <div>
                <x-jet-label for="piso" value="{{ __('Piso') }}" />
                <x-jet-input id="piso" class="block mt-1 w-full" type="text" name="piso" :value="old('piso')" required autofocus autocomplete="piso" placeholder="Introduce el piso..."/>
            </div>
             <div>
                <x-jet-label for="puerta" value="{{ __('Puerta') }}" />
                <x-jet-input id="puerta" class="block mt-1 w-full" type="text" name="puerta" :value="old('puerta')" required autofocus autocomplete="puerta" placeholder="Introduce puerta ..."/>
            </div>
             <div>
                <x-jet-label for="cod_pais" value="{{ __('Código pais') }}" />
                <x-jet-input id="cod_pais" class="block mt-1 w-full" type="text" name="cod_pais" :value="old('cod_pais')" required autofocus autocomplete="cod_pais" placeholder="Introduce el código de pais..."/>

            </div>
              <div>
                <x-jet-label for="cp" value="{{ __('Cp') }}" />
                <x-jet-input id="cp" class="block mt-1 w-full" type="text" name="cp" :value="old('cp')" required autofocus autocomplete="cp" placeholder="Introduce el cp ..."/>
            </div>
              <div>
                <x-jet-label for="pais" value="{{ __('Pais') }}" />
                <x-jet-input id="pais" class="block mt-1 w-full" type="text" name="pais" :value="old('')" required autofocus autocomplete="pais" placeholder="Introduce el pais..."/>
            </div>
             <div>
                <x-jet-label for="provincia" value="{{ __('Provincia') }}" />
                <x-jet-input id="provincia" class="block mt-1 w-full" type="text" name="provincia" :value="old('provincia')" required autofocus autocomplete="" placeholder="Introduce la provincia ..."/>
            </div>
             <div>
                <x-jet-label for="localidad" value="{{ __('Localidad') }}" />
                <x-jet-input id="localidad" class="block mt-1 w-full" type="text" name="localidad" :value="old('localidad')" required autofocus autocomplete="localidad" placeholder="Introduce la localidad..."/>
            </div>
            <div class="mt-4">
                <x-jet-label for="role" value="{{ __('Role') }}" />
                <x-jet-input id="role" class="block mt-1 w-full" type="text" name="role" :value="old('role')"  required autofocus autocomplete="role" placeholder="Introduce el tipo de role (admin o invitado)..."/>
            </div>
              <div class="mt-4">
                <x-jet-label for="num_cta" value="{{ __('Nº Cuenta') }}" />
                <x-jet-input id="num_cta" class="block mt-1 w-full" type="text" name="num_cta" :value="old('num_cta')" required autofocus autocomplete="num_cta" placeholder="Introduce el IBAN..."/>
            </div>
            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required placeholder="Introduce el correo electrónico..."/>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Introduce una clave de 9 dígitos..."/>
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Repite la clave..."/>
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
