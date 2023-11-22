<x-app-layout>

    <div class="bg-gradient-to-b from-green-600 to-green-800 h-32">
        <div class="container mx-auto px-6 lg:px-20 py-9 ">
            <div class="text-center text-white">
                <h1 class="text-2xl lg:text-4xl font-bold leading-tight mb-4">Admin Dashboard</h1>
                <p class="text-lg lg:text-xl mb-10">Welcome, Admin! Here's an overview of the system.</p>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-6 lg:px-20 mt-8 bg-white p-8 rounded-md shadow-md">
        <!-- Dashboard Content -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Statistics Section -->
            <div>
                <h2 class="text-2xl font-bold mb-4 text-green-700">System Statistics</h2>
                <ul class="text-gray-700">
                    <li>Total Vehicles: {{ $info['stats']['vehicleCount'] }}</li>
                    <li>Registered Users: {{ $info['stats']['userCount'] }}</li>
                    <li>Recent Entries: {{ $info['stats']['recentEntryCount'] }}</li>
                </ul>
            </div>

            <!-- Recent Entries Section -->
            <div>
                <h2 class="text-2xl font-bold mb-4 text-green-700">Today's Vehicle Entries</h2>
                <ul class="text-gray-700">
                    @foreach ($info['recent'] as $recent)
                        <ol>{{ $recent->vehicle->vehicle_color }} {{ $recent->vehicle->vehicle_make }} {{ $recent->vehicle->vehicle_model }}, ({{ $recent->vehicle->vehicle_registration_number }}) - Entry at {{ $recent->created_at }}</ol>
                    @endforeach
                    <a class="text-red-800" href="{{ route('vehicle.entries') }}">View more...</a>
                </ul>
            </div>

            <!-- Manage Users Section -->
            <div>
                <h2 class="text-2xl font-bold mb-2 text-green-700">Manage Vehicle Entries</h2>
                <p class="text-gray-700">You can manage Visitors' vehicle entries here.</p>
                <button
                    class="bg-green-700 hover:bg-white hover:text-green-700 text-white font-bold py-2 px-4 rounded mb-6">
                    <a href="{{ route('vehicle.entries') }}">Go to Vehicle Entries Management</a>
                </button>

                <h2 class="text-2xl font-bold mb-2 text-green-700">Manage Registered Vehicles</h2>
                <p class="text-gray-700">You can manage registered vehicles here.</p>
                <button class="bg-green-700 hover:bg-white hover:text-green-700 text-white font-bold py-2 px-4 rounded">
                    <a href="{{ route('vehicles.all') }}">Go to Registered Vehicle Management</a>
                </button>
            </div>


        </div>
    </div>
</x-app-layout>
