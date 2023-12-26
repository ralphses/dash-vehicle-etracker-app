<x-guest-layout>
    <x-header />
    <div class="bg-gradient-to-b from-green-600 to-green-800">
        <div class="container mx-auto px-6 lg:px-10 py-5">
            <div class="text-center text-white">
                <h1 class="text-4xl lg:text-6xl font-bold leading-tight mb-4">Visitor Vehicle Management</h1>
                <p class="text-lg lg:text-xl mb-8">Enter vehicle plate number to check status.</p>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-6 lg:px-20 mt-8 bg-white p-8 rounded-md shadow-md max-w-md mb-10">
        <!-- Check Registration Status Form -->
        <form action="{{ route('vehicle.entry') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="vehicle_registration_number" class="block text-gray-700 text-sm font-semibold mb-2">Vehicle
                    Registration Number</label>
                <input type="text" id="vehicle_registration_number" name="vehicle_registration_number"
                    class="w-full px-4 py-2 border rounded-md">
                @error('vehicle_registration_number')
                    <p class="text-red-700" style="color: red">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit"
                class="w-full bg-gradient-to-b from-green-600 to-green-800 hover:bg-blue-600 text-white px-6 py-3 rounded-full font-semibold">Check
                Vehicle Status</button>
            <p class="mt-4 text-gray-700 text-sm">Enter the vehicle registration number to check its registration
                status.</p>
        </form>
    </div>

    <!-- Modal for Vehicle Not Found -->
    @if(session()->has('vehicle') && session('vehicle') === 'not found')
    <div class="fixed inset-0 z-50 flex items-center justify-center">
        <div class="bg-black bg-opacity-50 absolute inset-0"></div>
        <div class="bg-white p-6 rounded-md shadow-md relative max-w-md w-full">
            <p class="text-red-700 font-semibold text-lg mb-4">{{ session('messge') }}</p>
            <div class="flex justify-between">
                <a href="{{ route('vehicle.register', ['number' => session('number')]) }}"
                    class="w-1/2 bg-gradient-to-b from-green-600 to-green-800 hover:bg-blue-600 text-white px-4 py-2 rounded-full font-semibold transition duration-300 ease-in-out transform hover:scale-105 block mr-4">Register
                    Vehicle</a>
                <button
                    class="w-1/2 bg-gray-400 hover:bg-gray-600 text-white px-4 py-2 rounded-full font-semibold transition duration-300 ease-in-out transform hover:scale-105"
                    onclick="closeModal()">Cancel</button>
            </div>
        </div>
    </div>
    @endif

    <x-footer />

    <script>
        function closeModal() {
            document.querySelector('.fixed').style.display = 'none';
        }
    </script>
</x-guest-layout>
