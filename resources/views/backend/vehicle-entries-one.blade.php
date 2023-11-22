<x-app-layout>

    <div class="container mx-auto px-6 lg:px-20 py-8">
        <h2 class="text-3xl font-bold mb-6">View Vehicle Entry</h2>

        <div class="bg-white border border-gray-300 p-6">
            <p><strong>Vehicle Number:</strong> {{ $entry->vehicle->vehicle_registration_number }}</p>
            <p><strong>Time In:</strong> {{ $entry->created_at }}</p>
            <p><strong>Time Out:</strong> {{ $entry->time_out ?? '----' }}</p>
            <p><strong>Status:</strong> {{ $entry->status }}</p>
            <p><strong>Parking Space:</strong> {{ $entry->parking_space }}</p>
            <p><strong>Driver Name:</strong> {{ $entry->driver_name }}</p>
            <p><strong>Owner name:</strong> {{ $entry->vehicle->full_name }}</p>
            <p><strong>Owner phone number:</strong> {{ $entry->vehicle->phone_contact }}</p>

            <button class="bg-green-700 hover:bg-white hover:text-green-700 text-white font-bold py-2 px-4 rounded">
                <a href="{{ route('vehicle.entries') }}">Go to Vehicle Entries Management</a>
            </button>
        </div>
    </div>
</x-app-layout>
