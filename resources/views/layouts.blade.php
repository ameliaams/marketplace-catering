<!-- resources/views/layouts/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Katering - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-gray-100">
    <div x-data="{ sidebarOpen: false }">
        <div :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}" class="fixed top-0 left-0 z-30 w-64 h-screen transition-transform -translate-x-full bg-gray-800 md:translate-x-0">
            <div class="flex items-center justify-center h-16 bg-gray-900">
                <span class="text-xl font-semibold text-white">Marketplace Katering</span>
            </div>

            <nav class="px-2 py-4">

                @if(auth()->user()->role === 'merchant')
                <a href="{{ route('merchant.dashboard') }}" class="flex items-center px-4 py-2 text-gray-100 hover:bg-gray-700 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-gray-700' : '' }}">
                    <i class="fas fa-home w-6"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('merchant.menu') }}" class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700 rounded-lg">
                    <i class="fas fa-shopping-bag w-6"></i>
                    <span>Menu</span>
                </a>
                <a href="{{ route('merchant.order') }}" class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700 rounded-lg">
                    <i class="fas fa-chart-line w-6"></i>
                    <span>Order</span>
                </a>
                @endif

                @if(auth()->user()->role === 'user')
                <a href="{{ route('user.dashboard') }}" class="flex items-center px-4 py-2 text-gray-100 hover:bg-gray-700 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-gray-700' : '' }}">
                    <i class="fas fa-home w-6"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('user.catering') }}" class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700 rounded-lg">
                    <i class="fas fa-shopping-cart w-6"></i>
                    <span>Catering</span>
                </a>
                <a href="#" class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700 rounded-lg">
                    <i class="fas fa-heart w-6"></i>
                    <span>My Order</span>
                </a>
                @endif

            </nav>
        </div>

        <!-- Navbar & Content -->
        <div class="flex flex-col md:pl-64">
            <nav class="fixed top-0 z-20 w-full bg-white border-b border-gray-200 md:flex-row md:flex-nowrap shadow">
                <div class="flex items-center justify-between px-4 py-3">
                    <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 md:hidden">
                        <i class="fas fa-bars text-xl"></i>
                    </button>

                    <div class="flex items-center">
                        <div class="mr-4">
                            <span class="text-sm text-gray-500">Welcome,</span>
                            <span class="text-sm font-semibold">{{ auth()->user()->name }}</span>
                        </div>


                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" class="flex items-center focus:outline-none">
                                <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}" alt="User avatar">
                            </button>

                            <div x-show="open" @click.away="open = false" class="absolute right-0 w-48 mt-2 py-2 bg-white rounded-lg shadow-xl">
                                @if(auth()->user()->role === 'merchant')
                                    <a href="{{ route('merchant.profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                @elseif (auth()->user->role === 'user')
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                @endif
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="flex-1 px-4 py-8 mt-16 md:px-6">
                @yield('content')
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
