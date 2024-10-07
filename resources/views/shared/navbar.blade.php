<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <!-- Bouton menu mobile -->
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <button type="button"
                    class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Ouvrir le menu</span>
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>

            <!-- Logo et navigation principale -->
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex flex-shrink-0 items-center">
                    <a href="{{ route('home') }}">
                        <span class="text-white font-bold text-xl">
                            {{ request()->is('admin/*') ? 'Immo Admin' : 'Immo Laravel' }}
                        </span>
                    </a>
                </div>
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <a href="{{ request()->is('admin/*') ? route('admin.property.index') : route('property.index') }}"
                            class="{{ request()->is('admin/property*') || request()->is('property*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">
                            Biens
                        </a>
                        @if (request()->is('admin/*'))
                            <a href="{{ route('admin.option.index') }}"
                                class="{{ request()->routeIs('admin.option.*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">
                                Options
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Menu utilisateur -->
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <div class="relative ml-3 md:block hidden">
                    <form action="{{ route('logout') }}" method="POST" class="block">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full text-left px-4 py-2 text-sm text-gray-400 hover:bg-gray-700 hover:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                            Déconnexion
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu mobile -->
    <div class="sm:hidden hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2">
            <a href="{{ request()->is('admin/*') ? route('admin.property.index') : route('property.index') }}"
                class="{{ request()->is('admin/property*') || request()->is('property*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium">
                Biens
            </a>
            @if (request()->is('admin/*'))
                <a href="{{ route('admin.option.index') }}"
                    class="{{ request()->routeIs('admin.option.*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium">
                    Options
                </a>
            @endif
            <form action="{{ route('logout') }}" method="POST" class="block">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="w-full text-left px-4 py-2 text-sm text-gray-400 hover:bg-gray-700 hover:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                    Déconnexion
                </button>
            </form>
        </div>
    </div>
</nav>
