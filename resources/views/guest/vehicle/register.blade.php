<x-guest-layout>
    <x-header />
    <div class="bg-gradient-to-b from-green-600 to-green-800">
        <div class="container mx-auto px-6 lg:px-20 py-20">
            <div class="text-center text-white">
                <h1 class="text-4xl lg:text-6xl font-bold leading-tight mb-4">Visitor Vehicle Registration</h1>
                <p class="text-lg lg:text-xl mb-8">Enter your details and vehicle information for registration.</p>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-6 lg:px-20 mt-8 bg-white p-8 rounded-md shadow-md max-w-md mb-10">
        <!-- Registration Form -->
        <form action="{{ route('vehicle.register') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="full_name" class="block text-gray-700 text-sm font-semibold mb-2">Full Name</label>
                <input type="text" id="full_name" name="full_name" class="w-full px-4 py-2 border rounded-md">
                @error('full_name')
                    <p class="text-red-700" style="color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-gray-700 text-sm font-semibold mb-2">Phone contact</label>
                <input type="text" id="phone" name="phone_contact" class="w-full px-4 py-2 border rounded-md">
                @error('phone_contact')
                    <p class="text-red-700" style="color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email Address</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-md">
                @error('email')
                    <p class="text-red-700" style="color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="vehicle_registration" class="block text-gray-700 text-sm font-semibold mb-2">Vehicle
                    Registration Number</label>
                <input type="text" id="vehicle_registration_number" name="vehicle_registration_number"
                    class="w-full px-4 py-2 border rounded-md">
                @error('vehicle_registration_number')
                    <p class="text-red-700" style="color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="means_of_purchase" class="block text-gray-700 text-sm font-semibold mb-2">Vehicle
                    type</label>
                <select id="means_of_purchase" name="vehicle_type" class="w-full px-4 py-2 border rounded-md">
                    <option value="motorcycle">Motorcycle</option>
                    <option value="tricycle">Tricycle</option>
                    <option value="car">Car</option>
                </select>
                @error('vehicle_type')
                    <p class="text-red-700" style="color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="vehicle_make" class="block text-gray-700 text-sm font-semibold mb-2">Vehicle Make</label>
                <input type="text" id="vehicle_make" name="vehicle_make" class="w-full px-4 py-2 border rounded-md">
                @error('vehicle_make')
                    <p class="text-red-700" style="color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="vehicle_model" class="block text-gray-700 text-sm font-semibold mb-2">Vehicle Model</label>
                <input type="text" id="vehicle_model" name="vehicle_model"
                    class="w-full px-4 py-2 border rounded-md">
                @error('vehicle_model')
                    <p class="text-red-700" style="color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="vehicle_color" class="block text-gray-700 text-sm font-semibold mb-2">Vehicle Color</label>
                <input type="text" id="vehicle_color" name="vehicle_color"
                    class="w-full px-4 py-2 border rounded-md">
                @error('vehicle_color')
                    <p class="text-red-700" style="color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="means_of_purchase" class="block text-gray-700 text-sm font-semibold mb-2">Means of
                    Purchase</label>
                <select id="means_of_purchase" name="means_of_purchase" class="w-full px-4 py-2 border rounded-md">
                    <option value="new">New</option>
                    <option value="second_hand">Second Hand</option>
                </select>
                @error('means_of_purchase')
                    <p class="text-red-700" style="color: red">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit"
                class="w-full bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-full font-semibold">Register
                Vehicle</button>
        </form>
    </div>
    <x-footer />
</x-guest-layout>
