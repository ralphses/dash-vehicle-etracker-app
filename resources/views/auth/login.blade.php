<x-guest-layout>
    <!-- Session Status -->
    <x-header />
   
    <div class="bg-gradient-to-b from-green-600 to-green-800">
        <div class="container mx-auto px-6 lg:px-20 py-20">
            <div class="text-center text-white">
                <h1 class="text-4xl lg:text-6xl font-bold leading-tight mb-4">Admin Login</h1>
                <p class="text-lg lg:text-xl mb-8">Enter your credentials to access the admin dashboard.</p>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-6 lg:px-20 mt-8 bg-white p-8 rounded-md shadow-md max-w-md mb-11">
        <!-- Login Form -->
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email</label>
                <input type="text" id="email" name="email" class="w-full px-4 py-2 border rounded-md">
                @error('email')
                    <p class="text-red-700" style="color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-md">
                @error('password')
                    <p class="text-red-700" style="color: red">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-full font-semibold">Login</button>
        </form>
    </div>

      <x-footer />

</x-guest-layout>
