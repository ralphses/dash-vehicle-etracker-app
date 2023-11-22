<x-app-layout>
    <div class="container mx-auto px-6 lg:px-20 py-8 h-screen">
        <h2 class="text-3xl font-bold mb-6">Vehicle Entries Management</h2>

        @if ($entries->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b text-left">S/N</th>
                            <th class="py-2 px-4 border-b text-left">Vehicle Number</th>
                            <th class="py-2 px-4 border-b text-left">Time In</th>
                            <th class="py-2 px-4 border-b text-left">Time Out</th>
                            <th class="py-2 px-4 border-b text-left">Status</th>
                            <th class="py-2 px-4 border-b text-left">Parking Space</th>
                            <th class="py-2 px-4 border-b text-left">Driver Name</th>
                            <th class="py-2 px-4 border-b text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($entries as $key => $entry)
                            <tr>
                                <td class="py-2 px-4 border-b text-left">{{ $key + 1 }}</td>
                                <td class="py-2 px-4 border-b text-left">
                                    {{ $entry->vehicle->vehicle_registration_number }}</td>
                                <td class="py-2 px-4 border-b text-left">{{ $entry['created_at'] }}</td>
                                <td class="py-2 px-4 border-b text-left">{{ $entry['time_out'] ?? '-------' }}</td>
                                <td class="py-2 px-4 border-b text-left">{{ $entry['status'] }}</td>
                                <td class="py-2 px-4 border-b text-left">{{ $entry->space->name }}</td>
                                <td class="py-2 px-4 border-b text-left">{{ $entry['driver_name'] }}</td>
                                <td class="py-2 px-4 border-b text-left">
                                    <a href="{{ route('entries.show', $entry->id) }}"
                                        class="text-green-500 hover:text-green-700">View</a>
                                    <form action="{{ route('entries.delete', ['entry' => $entry->id]) }}"
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

            {{ $entries->links() }} <!-- Laravel pagination links -->
        @else
            <p class="text-gray-700">No data entry</p>
        @endif
    </div>
</x-app-layout>
