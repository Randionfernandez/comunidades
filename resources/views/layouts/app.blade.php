<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Comunidades') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="container-fluid">
    <x-jet-banner />

    <div class="row">
        <!-- component aside navbar -->

        <div class="col-12 col-sm-12 col-lg-2 p-0 bg-black collapse show" id="navbarToggleExternalContent">

            <x-jet-nav-link href="{{ route('dashboard') }}" class="h-16 m-auto">
                @lang('RandiFincas')
            </x-jet-nav-link>

            <div class="accordion border-0" id="accordionExample">
                <div class="accordion-item border-0">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button bg-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            @lang('ADMINISTRATOR')
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse bg-black collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @forelse($navDarkLinks as $link)
                            <x-jet-responsive-nav-link href="{{ route($link['href']) }}" :active="request()->routeIs($link['name'])">
                                {{ __($link['text']) }}
                            </x-jet-responsive-nav-link>
                            @empty
                            <h1>El menú no esta disponible</h1>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed bg-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            @lang('OWNER')
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse bg-black collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <x-jet-responsive-nav-link href="{{ route('comunidades.index') }}" :active="request()->routeIs('comunidades.index')">
                                @lang('Propiedades')
                            </x-jet-responsive-nav-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- navigationbar -->

        <div class="col px-0">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            @endif

            <div class="py-2 px-2">
                {{ $slot }}
            </div>
        </div>

        <footer class="col-12 col-sm-12 col-lg-12 fixed-bottom bg-white text-center text-black-50 mt-auto p-2 py-3 shadow">
            {{ config('app.name') }} | Copyright @ {{ date('Y') }}
        </footer>
    </div>

    @stack('modals')
    @yield('content')

    @livewireScripts

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>
