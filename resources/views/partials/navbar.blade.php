<div class="relative py-6" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <nav class="relative flex items-center justify-between sm:h-10 md:justify-center" aria-label="Global">
            <div class="flex items-center flex-1 md:absolute md:inset-y-0 md:left-0">
                <div class="flex items-center justify-between w-full md:w-auto">
                    <a href="{{ route('homepage') }}">
                        <span class="sr-only">Alexandre Gérault</span>
                        <img class="h-8 w-auto sm:h-10"
                             src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="">
                    </a>
                    <div class="-mr-2 flex items-center md:hidden">
                        <button type="button"
                                class="bg-gray-50 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                                aria-expanded="false"
                                @click="open = true"
                        >
                            <span class="sr-only">Ouvrir le menu</span>
                            <!-- Heroicon name: outline/menu -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="hidden md:flex md:space-x-10">
                <a href="{{ route('homepage') }}" class="font-medium text-gray-500 hover:text-gray-900">À propos de moi</a>

                <a href="{{ route('article.index') }}" class="font-medium text-gray-500 hover:text-gray-900">Articles</a>

                @if (auth()->check())
                <a href="{{ route('filament.pages.dashboard') }}" class="font-medium text-gray-500 hover:text-gray-900">
                    Administration
                </a>
                @endif
            </div>
            <div class="hidden md:absolute md:flex md:items-center md:justify-end md:inset-y-0 md:right-0 gap-4">
                @if (!auth()->check())
                <span class="inline-flex rounded-md shadow">
                      <a href="{{ route('login') }}"
                         class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50">
                        Connexion
                      </a>
                    </span>

                <span class="inline-flex rounded-md shadow">
                      <a href="{{ route('register.show') }}"
                         class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50">
                        Inscription
                      </a>
                    </span>
                @else
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="xl:text-red-900">
                        Déconnexion
                    </button>
                </form>
               @endif
            </div>
        </nav>
    </div>

    <div
        x-show="open"
        x-transition:enter="duration-150 ease-out"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="duration-100 ease-in"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
    >
        <div class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
            <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
                <div class="px-5 pt-4 flex items-center justify-between">
                    <div>
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                             alt="">
                    </div>
                    <div class="-mr-2">
                        <button
                            type="button"
                            class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                            @click="open = false"
                        >
                            <span class="sr-only">Fermer le menu</span>
                            <!-- Heroicon name: outline/x -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="px-2 pt-2 pb-3">
                    <a href="{{ route('homepage') }}">
                       class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">
                        À propos de moi
                    </a>

                    <a href="{{ route('article.index') }}"
                       class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">
                        Articles
                    </a>
                </div>
                <a href="{{ route('login') }}"
                   class="block w-full px-5 py-3 text-center font-medium text-indigo-600 bg-gray-50 hover:bg-gray-100">
                    Connexion
                </a>
            </div>
        </div>
    </div>
</div>
