<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Blog')</title>
    @vite(['resources/js/public.js', 'resources/css/public.css'])
</head>
<body>
    <!-- Navbar -->
    <nav class="relative px-4 py-4 flex justify-between items-center bg-gray-50">
        <!-- Brand Logo -->
        <a class="text-3xl font-bold leading-none" href="/">
            <span class="brand-text font-weight-light">Blog{:}</span>
        </a>
        <!-- Mobile Menu Button -->
        <div class="lg:hidden">
            <button id="navbar-burger" class="flex items-center text-blue-600 p-3">
                <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Mobile menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </button>
        </div>
        <!-- Navigation Links -->
        <ul id="navbar-menu" class="hidden lg:flex lg:items-center lg:space-x-6">
            <li><a class="text-sm text-gray-400 hover:text-gray-500" href="{{ Route('public.public.index') }}">Home</a></li>
            @if(Auth::check() && Auth::user()->hasRole('admin'))
            <li><a class="text-sm text-gray-400 hover:text-gray-500" href="{{ Route('dashboard') }}">Dashboard</a></li>
            @endif
            <li><a class="text-sm text-blue-600 font-bold" href="{{ Route('public.public.index') }}">Blogs</a></li>
            <li><a class="text-sm text-gray-400 hover:text-gray-500" href="/About">About Us</a></li>
            <li><a class="text-sm text-gray-400 hover:text-gray-500" href="/Contact">Contact Us</a></li>
        </ul>
        <!-- Authentication Links -->
        @auth
            <div class="relative">
                <button id="user-menu-btn" class="flex items-center text-sm text-gray-900 hover:text-gray-600 focus:outline-none focus:ring">
                    <!-- User Image -->
                    <img src="{{ Auth::user()->profile_picture ?: 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=random&color=fff&bold=true&rounded=true&size=400&length=2' }}" alt="User Image" class="w-8 h-8 rounded-full mr-2">
                    {{ Auth::user()->name }}
                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <!-- Dropdown Menu (initially hidden) -->
                <ul id="user-menu" class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg opacity-0 pointer-events-none transform translate-y-2 transition-all duration-300 hidden">
                    <li class="flex-1">
                        <a href="/profile" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        @else
            <a class="py-2 px-6 bg-blue-500 hover:bg-blue-600 text-sm text-white font-bold rounded-xl transition duration-200" href="{{ route('login') }}">Login</a>
            <a class="py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-gray-900 font-bold rounded-xl transition duration-200" href="{{ route('register') }}">Sign up</a>
        @endauth
    </nav>

    <!-- Content -->
    <main>
        @yield('content')
    </main>

    <!-- Mobile Menu Script -->
    <script>
        const burger = document.getElementById('navbar-burger');
        const menu = document.getElementById('navbar-menu');
        burger.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });

        // Simple click-based dropdown with smooth transition
        const userMenuBtn = document.getElementById('user-menu-btn');
        const userMenu = document.getElementById('user-menu');
        userMenuBtn.addEventListener('click', (e) => {
            e.stopPropagation(); // Prevent click from bubbling up
            userMenu.classList.toggle('hidden');
            userMenu.classList.toggle('opacity-0');
            userMenu.classList.toggle('pointer-events-none');
            userMenu.classList.toggle('translate-y-2');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!userMenu.contains(e.target) && !userMenuBtn.contains(e.target)) {
                userMenu.classList.add('hidden');
                userMenu.classList.add('opacity-0');
                userMenu.classList.add('pointer-events-none');
                userMenu.classList.add('translate-y-2');
            }
        });

    </script>
</body>
</html>
