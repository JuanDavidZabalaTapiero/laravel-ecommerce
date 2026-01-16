<nav class="bg-gray-900 text-white" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex h-16 items-center justify-between">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="text-xl font-semibold">
                E-commerce
            </a>

            {{-- Desktop menu --}}
            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ route('home') }}" class="hover:text-gray-300">
                    Inicio
                </a>

                <a href="{{ route('contact') }}" class="hover:text-gray-300">
                    Contacto
                </a>

                {{-- SIN SESIÓN --}}
                @guest
                    <a href="{{ route('register') }}" class="px-4 py-2 rounded-md bg-blue-600 hover:bg-blue-700 transition">
                        Registro
                    </a>

                    <a href="{{ route('login') }}"
                        class="px-4 py-2 rounded-md border border-blue-500 text-blue-400 hover:bg-blue-500 hover:text-white transition">
                        Login
                    </a>
                @endguest

                {{-- CON SESIÓN --}}
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="px-4 py-2 rounded-md bg-red-600 hover:bg-red-700 transition">
                            Cerrar sesión
                        </button>
                    </form>
                @endauth
            </div>

            {{-- Mobile button --}}
            <button @click="open = !open" class="md:hidden focus:outline-none" aria-label="Abrir menú">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile menu --}}
    <div x-show="open" x-transition @click.outside="open = false" class="md:hidden bg-gray-800">
        <div class="px-4 py-4 space-y-3">
            <a href="{{ route('home') }}" class="block hover:text-gray-300">
                Inicio
            </a>

            <a href="{{ route('contact') }}" class="block hover:text-gray-300">
                Contacto
            </a>

            {{-- SIN SESIÓN --}}
            @guest
                <a href="{{ route('register') }}" class="block text-center px-4 py-2 rounded-md bg-blue-600">
                    Registro
                </a>

                <a href="{{ route('login') }}"
                    class="block text-center px-4 py-2 rounded-md border border-blue-500 text-blue-400">
                    Login
                </a>
            @endguest

            {{-- CON SESIÓN --}}
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-center px-4 py-2 rounded-md bg-red-600">
                        Cerrar sesión
                    </button>
                </form>
            @endauth
        </div>
    </div>
</nav>
