<x-app-layout>

    <div class="container mx-auto px-6 lg:px-20 py-8">
        <h2 class="text-3xl font-bold mb-6">View Vehicle</h2>

        <div class="bg-white border border-gray-300 p-6">
            <p><strong>Vehicle Number: </strong> {{ $vehicle->vehicle_registration_number }}</p>
            <p><strong>Vehicle Make: </strong> {{ $vehicle->vehicle_make }}</p>
            <p><strong>Vehicle Model: </strong> {{ $vehicle->vehicle_model }}</p>
            <p><strong>Vehicle Colour: </strong> {{ $vehicle->vehicle_color }}</p>
            <p><strong>Vehicle Type: </strong> {{ $vehicle->vehicle_type }}</p>
            <p><strong>Owner name:</strong> {{ $vehicle->full_name }}</p>
            <p><strong>Owner phone number:</strong> {{ $vehicle->phone_contact }}</p>

            <button class="bg-green-700 hover:bg-white hover:text-green-700 text-white font-bold py-2 px-4 rounded mt-9">
                <a href="{{ route('vehicles.all') }}">Go to Vehicle Management</a>
            </button>
        </div>
    </div>
</x-app-layout>
