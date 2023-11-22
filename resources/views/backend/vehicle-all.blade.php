<x-app-layout>
    <div class="container mx-auto px-6 lg:px-20 py-8 h-screen">
        <h2 class="text-3xl font-bold mb-6">Vehicle Management</h2>

        @if ($vehicles->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b text-left">S/N</th>
                            <th class="py-2 px-4 border-b text-left">Registration Number</th>
                            <th class="py-2 px-4 border-b text-left">Description</th>
                            <th class="py-2 px-4 border-b text-left">Owner Name</th>
                            <th class="py-2 px-4 border-b text-left">Owner Phone</th>
                            <th class="py-2 px-4 border-b text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vehicles as $key => $vehicle)
                            <tr>
                                <td class="py-2 px-4 border-b text-left">{{ $key + 1 }}</td>
                                <td class="py-2 px-4 border-b text-left">
                                    {{ $vehicle->vehicle_registration_number }}</td>
                                <td class="py-2 px-4 border-b text-left">{{ $vehicle->vehicle_color . " " . $vehicle->vehicle_make . " " . $vehicle->vehicle_model }}</td>
                                <td class="py-2 px-4 border-b text-left">{{ $vehicle['full_name'] }}</td>
                                <td class="py-2 px-4 border-b text-left">{{ $vehicle['phone_contact'] }}</td>
                                
                                <td class="py-2 px-4 border-b text-left">
                                    <a href="{{ route('vehicles.show', $vehicle->id) }}"
                                        class="text-green-500 hover:text-green-700">View</a>
                                    <form action="{{ route('vehicles.delete', ['vehicle' => $vehicle->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{ $vehicles->links() }} <!-- Laravel pagination links -->
        @else
            <p class="text-gray-700">No data entry</p>
        @endif
    </div>
</x-app-layout>
