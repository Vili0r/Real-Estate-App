<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        @livewireStyles
    </head>
    <body>
        <div class="bg-white" x-data="{ isOpen: false }">
            <nav class="container px-6 py-8 mx-auto md:flex md:justify-between md:items-center">
                <div class="flex items-center justify-between">
                    <a class="text-xl font-bold text-gray-800 md:text-2xl hover:text-blue-400" href="{{ route('home') }}">
                        Building Hands 
                    </a>
                    <!-- Mobile menu button -->
                    <div @click="isOpen = !isOpen" class="flex md:hidden">
                        <button type="button"
                            class="text-gray-800 hover:text-gray-400 focus:outline-none focus:text-gray-400"
                            aria-label="toggle menu">
                            <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                                <path fill-rule="evenodd"
                                    d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                <div :class="isOpen ? 'flex' : 'hidden'"
                    class="flex-col mt-8 space-y-4 md:flex md:space-y-0 md:flex-row md:items-center md:space-x-10 md:mt-0">
                    <a class="text-sm text-gray-800 hover:text-blue-400" href="{{ route('home') }}">Home</a>
                    <a class="text-sm text-gray-800 hover:text-blue-400" href="{{ route('properties') }}">Properties</a>
                    <a class="text-sm text-gray-800 hover:text-blue-400" href="{{ route('contact-us') }}">Contact Us</a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-800 hover:text-blue-400">Dashboard</a>
                        @else
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-800 hover:text-blue-400">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </nav>
        </div>

        <div class="font-sans text-gray-900 antialiased min-h-screen">
            {{ $slot }}
        </div>

        <!-- footer -->
        <footer class="px-4 pt-12 pb-32 mt-12 bg-gray-200 border-t lg:0">

            <div class="lg:flex lg:justify-evenly">
                <div class="max-w-sm mt-6 text-center lg:mt-0">
                    <h6 class="mb-4 text-4xl font-semibold text-gray-700">Real Estate</h6>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis, tenetur. Sint, vel sit
                        molestiae velit doloribus aspernatur. Voluptate, necessitatibus. Inventore corrupti aliquid
                        atque tempora quo eaque error voluptas et earum.</p>
                </div>
                <div class="mt-6 text-center lg:mt-0">
                    <h6 class="mb-4 font-semibold text-gray-700">Quick links</h6>
                    <ul>
                        <li> <a href="" class="block py-2 text-gray-600">Home</a> </li>
                        <li> <a href="" class="block py-2 text-gray-600">About us</a> </li>
                        <li> <a href="" class="block py-2 text-gray-600">Contact Us</a> </li>
                    </ul>
                </div>
                <div class="mt-6 text-center lg:mt-0">
                    <h6 class="mb-4 font-semibold text-gray-700">Quick links</h6>
                    <ul>
                        <li> <a href="" class="block py-2 text-gray-600">Property</a> </li>
                        <li> <a href="" class="block py-2 text-gray-600">About us</a> </li>
                        <li> <a href="" class="block py-2 text-gray-600">Help</a> </li>
                    </ul>
                </div>
                <div class="mt-6 text-center lg:mt-0">
                    <h6 class="mb-4 font-semibold text-gray-700">Quick links</h6>
                    <ul>
                        <li> <a href="" class="block py-2 text-gray-600">FAQ</a> </li>
                        <li> <a href="" class="block py-2 text-gray-600">About us</a> </li>
                        <li> <a href="" class="block py-2 text-gray-600">New Property</a> </li>
                    </ul>
                </div>
            </div>
        </footer>

        @livewireScripts
    </body>
</html>
