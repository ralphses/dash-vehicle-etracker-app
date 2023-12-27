<div class="bg-white shadow-md">
    <header class="container mx-auto px-4 lg:px-8 py-4">
        <div class="flex items-center justify-between">
            <a href="{{ route('welcome') }}" class="flex items-center">
                <img src="{{ asset('logo.jpg') }}" alt="Hospital Vehicle Tracking Logo" class="h-8 w-auto mr-2">
                <span class="text-2xl font-bold text-green-700">DASH Vehicle Tracking System</span>
            </a>

            <nav class="hidden lg:flex space-x-4">
                <a href="{{ route('vehicle.entry') }}" class="text-gray-700 hover:text-green-700">Check Vehicle</a>
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-green-700">Login</a>
                <a href="#" class="text-gray-700 hover:text-green-700">Contact Us</a>
                
            </nav>

            <!-- Mobile navigation toggle -->
            <div class="lg:hidden">
                <button id="mobile-menu-button" class="text-gray-700 hover:text-green-700 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile navigation menu -->
    <div id="mobile-menu" class="lg:hidden hidden">
        <a href="{{ route('login') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-200">Login</a>
        <a href="{{ route('vehicle.entry') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-200">Check Vehicle</a>
        <a href="#" class="block py-2 px-4 text-gray-700 hover:bg-gray-200">Contact Us</a>
      
    </div>
</div>
