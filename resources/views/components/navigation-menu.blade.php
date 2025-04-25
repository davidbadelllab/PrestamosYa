<!-- Main Navigation -->
<div class="min-h-screen flex bg-gray-100">
    <!-- Sidebar -->
    <div class="fixed inset-y-0 left-0 w-64 transition duration-300 transform bg-gradient-to-b from-indigo-800 to-indigo-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0 -translate-x-full ease-in-out z-50"
         x-data="{ open: true }"
         :class="{'translate-x-0': open, '-translate-x-full': !open}">
        
        <!-- Logo section -->
        <div class="flex items-center justify-center h-16 bg-opacity-30 bg-black">
            <div class="flex items-center">
                <x-application-mark class="block h-12 w-auto" />
                <span class="text-white text-2xl font-bold ml-3">PRESTAMOSYA</span>
            </div>
        </div>

        <!-- Navigation Links -->
        <nav class="mt-6 px-4">
            <div class="space-y-3">
                <!-- Dashboard -->
                <a href="{{ route('dashboard') }}" 
                   class="flex items-center px-4 py-3 transition-colors duration-200 {{ request()->routeIs('dashboard') ? 'bg-indigo-700 bg-opacity-40 text-white rounded-lg shadow-lg scale-105 transform' : 'text-gray-300 hover:bg-indigo-700 hover:bg-opacity-40 hover:text-white rounded-lg hover:shadow-md' }}">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                    </svg>
                    <span class="mx-4 font-medium">Dashboard</span>
                </a>

                <!-- Capital -->
                <a href="{{ route('capital.index') }}" 
                   class="flex items-center px-4 py-3 transition-colors duration-200 {{ request()->routeIs('capital.*') ? 'bg-indigo-700 bg-opacity-40 text-white rounded-lg shadow-lg scale-105 transform' : 'text-gray-300 hover:bg-indigo-700 hover:bg-opacity-40 hover:text-white rounded-lg hover:shadow-md' }}">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="mx-4 font-medium">Capital</span>
                </a>

                <!-- Préstamos -->
                <a href="{{ route('prestamos.index') }}" 
                   class="flex items-center px-4 py-3 transition-colors duration-200 {{ request()->routeIs('prestamos.*') ? 'bg-indigo-700 bg-opacity-40 text-white rounded-lg shadow-lg scale-105 transform' : 'text-gray-300 hover:bg-indigo-700 hover:bg-opacity-40 hover:text-white rounded-lg hover:shadow-md' }}">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <span class="mx-4 font-medium">Préstamos</span>
                </a>

                <!-- Pagos -->
                <a href="{{ route('pagos.index') }}" 
                   class="flex items-center px-4 py-3 transition-colors duration-200 {{ request()->routeIs('pagos.*') ? 'bg-indigo-700 bg-opacity-40 text-white rounded-lg shadow-lg scale-105 transform' : 'text-gray-300 hover:bg-indigo-700 hover:bg-opacity-40 hover:text-white rounded-lg hover:shadow-md' }}">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 8h6m-5 0a3 3 0 110 6H9l3 3m-3-6h6m6 1a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="mx-4 font-medium">Pagos</span>
                </a>

                <!-- Deudores -->
                <a href="{{ route('deudor.index') }}" 
                   class="flex items-center px-4 py-3 transition-colors duration-200 {{ request()->routeIs('deudor.*') ? 'bg-indigo-700 bg-opacity-40 text-white rounded-lg shadow-lg scale-105 transform' : 'text-gray-300 hover:bg-indigo-700 hover:bg-opacity-40 hover:text-white rounded-lg hover:shadow-md' }}">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <span class="mx-4 font-medium">Deudores</span>
                </a>

                <!-- Avales -->
                <a href="{{ route('avales.index') }}" 
                   class="flex items-center px-4 py-3 transition-colors duration-200 {{ request()->routeIs('avales.*') ? 'bg-indigo-700 bg-opacity-40 text-white rounded-lg shadow-lg scale-105 transform' : 'text-gray-300 hover:bg-indigo-700 hover:bg-opacity-40 hover:text-white rounded-lg hover:shadow-md' }}">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    <span class="mx-4 font-medium">Avales</span>
                </a>
            </div>
        </nav>
    </div>

    <!-- Main Content Area -->
    <div class="flex-1">
        <!-- Top Navigation -->
        <div class="sticky top-0 z-40 lg:ml-64">
            <div class="bg-white border-b border-gray-200" style="backdrop-filter: blur(10px); background-color: rgba(255, 255, 255, 0.9);">
                <div class="flex items-center justify-between h-16 px-4 sm:px-6 lg:px-8">
                    <!-- Mobile menu button -->
                    <button @click="open = !open" class="lg:hidden text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>

                    <!-- Search Bar -->
                    <div class="flex-1 max-w-xl ml-8 hidden sm:flex">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-full leading-5 bg-gray-100 placeholder-gray-400 focus:outline-none focus:bg-white focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-150 ease-in-out" placeholder="Buscar...">
                        </div>
                    </div>

                    <!-- Right Navigation -->
                    <div class="flex items-center space-x-4">
                        <!-- Notifications -->
                        <button class="p-2 text-gray-400 hover:text-gray-500 focus:outline-none focus:text-gray-500">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                            </svg>
                        </button>

                        <!-- Profile dropdown -->
                        <div class="ml-3 relative" x-data="{ open: false }">
                            <div>
                                <button @click="open = !open" class="flex items-center max-w-xs text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="user-menu-button">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <img class="h-8 w-8 rounded-full object-cover border-2 border-indigo-500" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    @else
                                        <div class="h-8 w-8 rounded-full bg-indigo-500 flex items-center justify-center text-white font-semibold">
                                            {{ substr(Auth::user()->name, 0, 1) }}
                                        </div>
                                    @endif
                                    <span class="ml-3 text-gray-700 text-sm font-medium hidden sm:block">{{ Auth::user()->name }}</span>
                                    <svg class="ml-2 h-5 w-5 text-gray-400 hidden sm:block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                            </div>

                            <!-- Profile dropdown panel -->
                            <div x-show="open" 
                                 @click.away="open = false"
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 class="origin-top-right absolute right-0 mt-2 w-48 rounded-lg shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none"
                                 style="display: none;">
                                <div class="py-1">
                                    <a href="{{ route('profile.show') }}" class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50">
                                        <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        Perfil
                                    </a>
                                </div>
                                <div class="py-1">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="group flex w-full items-center px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50">
                                            <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                            </svg>
                                            Cerrar Sesión
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <main class="p-6">
            {{ $slot }}
        </main>
    </div>
</div>

<!-- Scripts for animations -->
<script>
    // Smooth state transitions
    document.addEventListener('alpine:init', () => {
        Alpine.store('sidebar', {
            open: true
        })
    })

    // Add smooth scrolling
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Add hover effects
    const menuItems = document.querySelectorAll('.nav-link');
    menuItems.forEach(item => {
        item.addEventListener('mouseover', () => {
            item.style.transform = 'translateX(10px)';
            item.style.transition = 'all 0.3s ease';
        });
        item.addEventListener('mouseout', () => {
            item.style.transform = 'translateX(0)';
        });
    });
</script>

<!-- Styles for glassmorphism and animations -->
<style>
    .glass-effect {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .nav-link {
        transition: all 0.3s ease;
    }

    .nav-link:hover {
        transform: translateX(10px);
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animate-fadeIn {
        animation: fadeIn 0.5s ease-out;
    }

    /* Gradient animations */
    .gradient-text {
        background: linear-gradient(45deg, #4f46e5, #818cf8);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-size: 200% 200%;
        animation: gradient 5s ease infinite;
    }

    @keyframes gradient {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
</style>
