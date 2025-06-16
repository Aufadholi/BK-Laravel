<nav x-data="{ open: false }" class="bg-blue-100 dark:from-gray-900 dark:to-gray-700 border-b  shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center">
                <!-- Logo or Brand -->
                <a href="/" class="flex items-center gap-2">

                    <span class="font-bold text-black text-lg tracking-wide">BK Klinik</span>
                </a>
                <!-- Main Nav -->
                <div class="hidden space-x-4 sm:ml-10 sm:flex">
                    @if (Auth::user()->role == 'dokter')
                        <x-nav-link :href="route('dokter.dashboard')" :active="request()->routeIs('dokter.dashboard')" class="text-black">
                            <span class="inline-flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                {{ __('Dashboard') }}
                            </span>
                        </x-nav-link>
                        <x-nav-link :href="route('dokter.obat.index')" :active="request()->routeIs('dokter.obat.index')" class="text-black">
                            <span class="inline-flex items-center gap-1">
                                <!-- Icon Obat: pill/capsule -->
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <rect x="3" y="11" width="18" height="7" rx="3.5" />
                                    <path d="M8 11V7a4 4 0 018 0v4" />
                                </svg>
                                {{ __('Obat') }}
                            </span>
                        </x-nav-link>
                        <x-nav-link :href="route('dokter.jadwalperiksa.index')" :active="request()->routeIs('dokter.jadwalperiksa.index')" class="text-black">
                            <span class="inline-flex items-center gap-1">
                                <!-- Icon Jadwal: calendar -->
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <rect x="3" y="4" width="18" height="18" rx="2" />
                                    <path d="M16 2v4M8 2v4M3 10h18" />
                                </svg>
                                {{ __('Jadwal Periksa') }}
                            </span>
                        </x-nav-link>
                        <x-nav-link :href="route('dokter.memeriksa.index')" :active="request()->routeIs('dokter.memeriksa.index')" class="text-black">
                            <span class="inline-flex items-center gap-1">
                                <!-- Icon Periksa Pasien: stethoscope -->
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path d="M6 3v6a6 6 0 0012 0V3" />
                                    <circle cx="12" cy="17" r="4" />
                                    <path d="M12 21v-4" />
                                </svg>
                                {{ __('Memeriksa Pasien') }}
                            </span>
                        </x-nav-link>

                    @elseif(Auth::user()->role == 'pasien')
                        <x-nav-link :href="route('pasien.dashboard')" :active="request()->routeIs('pasien.dashboard')" class="text-black">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('pasien.janjiperiksa.index')" :active="request()->routeIs('pasien.janjiperiksa.index')" class="text-black">
                            {{ __('Janji Periksa') }}
                        </x-nav-link>

                        <x-nav-link :href="route('pasien.riwayat-periksa.index')" :active="request()->routeIs('pasien.riwayat-periksa.index')">
                            {{ __('Riwayat Periksa') }}
                        </x-nav-link>
                        <!-- sesuaikan dengan source code milikmu -->

                    @endif

                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-600 dark:bg-gray-800 hover:bg-blue-600 dark:hover:bg-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div class="mr-2 font-semibold">{{ Auth::user()->name }}</div>
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-blue-200 hover:bg-blue-200 focus:outline-none focus:bg-blue-300 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden bg-white dark:bg-gray-900">
        <div class="pt-2 pb-3 space-y-1 px-2">
            @if (Auth::user()->role == 'dokter')
                <x-responsive-nav-link :href="route('dokter.dashboard')" :active="request()->routeIs('dokter.dashboard')" class="text-black">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('dokter.obat.index')" :active="request()->routeIs('dokter.obat.index')" class="text-black">
                    {{ __('Obat') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('dokter.jadwalperiksa.index')" :active="request()->routeIs('dokter.jadwalperiksa.index')" class="text-black">
                    {{ __('Jadwal Periksa') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('dokter.memeriksa.index')" :active="request()->routeIs('dokter.memeriksa.index')" class="text-black">
                    {{ __('Memeriksa Pasien') }}
                </x-responsive-nav-link>
               
            @elseif(Auth::user()->role == 'pasien')
                <x-responsive-nav-link :href="route('pasien.dashboard')" :active="request()->routeIs('pasien.dashboard')" class="text-black">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('pasien.janjiperiksa.index')" :active="request()->routeIs('pasien.janjiperiksa.index')" class="text-black">
                    {{ __('Janji Periksa') }}
                </x-responsive-nav-link>
            @endif
        </div>
        <div class="pt-4 pb-1 border-t border-blue-400 dark:border-gray-600 px-4">
            <div class="font-medium text-base text-black dark:text-gray-200">{{ Auth::user()->name }}</div>
            <div class="font-medium text-sm text-blue-600 dark:text-gray-400">{{ Auth::user()->email }}</div>
        </div>
        <div class="mt-3 space-y-1 px-2">
            <x-responsive-nav-link :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-responsive-nav-link>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
</nav>
