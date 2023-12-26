<x-guest-layout>
    <x-header />

    <div class="container mx-auto px-6 lg:px-20 py-8" id="pass">
        <h2 class="text-3xl font-bold mb-6">Vehicle Entry Pass Tag</h2>

        <button onclick="printVehicleEntryReport()"
            class="bg-blue-500 hover:bg-white hover:text-blue-500 text-white font-bold py-2 px-4 rounded mb-4">
            Print Pass Tag
        </button>

        <div class="bg-white border border-gray-300 p-6">
            <p><strong>Vehicle Number:</strong> {{ $entry->vehicle->vehicle_registration_number }}</p>
            <p><strong>Time In:</strong> {{ $entry->created_at }}</p>
            <p><strong>Time Out:</strong> {{ $entry->time_out ?? '----' }}</p>
            <p><strong>Status:</strong> {{ $entry->status }}</p>
            <p><strong>Parking Space:</strong> {{ $entry->space->name }}</p>
            <p><strong>Driver Name:</strong> {{ $entry->driver_name }}</p>
            <p><strong>Owner name:</strong> {{ $entry->vehicle->full_name }}</p>
            <p><strong>Owner phone number:</strong> {{ $entry->vehicle->phone_contact }}</p>

            <form action="{{ route('vehicle.entry.update', ['id' => $entry->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit"
                    class="bg-green-700 hover:bg-white hover:text-green-700 text-white font-bold py-2 px-4 rounded">
                    Check Out
                </button>
            </form>
        </div>
    </div>
    <x-footer />

    <script>
        function printVehicleEntryReport() {
            var printContent = document.getElementById("pass").innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = printContent;

            window.print();

            document.body.innerHTML = originalContent;
        }
    </script>
</x-guest-layout>
