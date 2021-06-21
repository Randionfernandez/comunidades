<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials/navArrayLinks')
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
    <style>
        #sideTitle {
            background-color: blueviolet;
            width: -webkit-fill-available;
            justify-content: center;
            font-size: 1.5em;
            text-decoration:none;
            font-family: Verdana, sans-serif;
        }
        .bolder {
            font-weight: bolder;
        }
    </style>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="container-fluid p-0">
<x-jet-banner/>

<!-- header para la parte de Rafa Maya -->
        @if (isset($css))
        <css>
            <div>
                {{ $css }}
            </div>
        </css>
        @endif

<div class="row m-0 vh-100">
    <!-- component aside navbar -->

    <div class="col-12 col-sm-12 col-lg-2 p-0 bg-black collapse show" id="navbarToggleExternalContent">

        <x-jet-nav-link id="sideTitle" href="{{ route('dashboard') }}" class="h-16 m-auto">
            RANDI<b class="bolder">FINCAS</b>
        </x-jet-nav-link>

        <div class="accordion px-0 border-0" id="accordionExample">
            <div class="accordion-item px-0 border-0">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button bg-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        @lang('ADMINISTRATOR')
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse bg-black collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        @forelse($navDarkLinks as $link)
                        @if($link['text'] != 'Proveedores' || Session::has('activeCommunity'))
                        @if(Session::has('activeCommunity') && $link['text'] == 'Comunidades')
                        <x-jet-responsive-nav-link href="{{ route('comunidades.show', Session()->get('activeCommunity')) }}" :active="request()->routeIs($link['name'])">
                            {{ __($link['text']) }}
                        </x-jet-responsive-nav-link>
                        @else
                        <x-jet-responsive-nav-link href="{{ route($link['href']) }}" :active="request()->routeIs($link['name'])">
                            {{ __($link['text']) }}
                        </x-jet-responsive-nav-link>
                        @endif
                        @endif
                        @if($link['text'] == 'Comunidades' && Session::has('activeCommunity'))
                        @forelse($navDarkCommunitiesLinks as $link2)
                        <x-jet-responsive-nav-link class='bg-gray-300 text-black-50' href="{{ route($link2['href'], Session()->get('activeCommunity')) }}" :active="request()->routeIs($link2['name'])">
                            {{ __($link2['text']) }}
                        </x-jet-responsive-nav-link>
                        @empty
                        @endforelse
                        @endif
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

    <footer class="col-12 col-sm-12 col-lg-12 bg-white text-center text-black-50">
        {{ config('app.name') }} | Copyright @ {{ date('Y') }}
    </footer>
</div>

@stack('modals')

@livewireScripts

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<!-- script para la parte de Rafa Maya -->
@if (isset($js))
<js>
    <div>
        {{ $js }}
    </div>
</js>
@endif
</body>
</html>
