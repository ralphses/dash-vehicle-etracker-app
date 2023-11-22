<x-app-layout>
    <div class="container mx-auto px-6 lg:px-20 py-8 h-screen">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-3xl font-bold">Parking Space Management</h2>
            <a href="{{ route('spaces.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-full">Create New Parking Space</a>
        </div>

        @if ($spaces->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                    <tr>
                        <th class="py-2 px-4 border-b text-left">S/N</th>
                        <th class="py-2 px-4 border-b text-left">Name</th>
                        <th class="py-2 px-4 border-b text-left">Type</th>
                        <th class="py-2 px-4 border-b text-left">Size</th>
                        <th class="py-2 px-4 border-b text-left">Occupied</th>
                        <th class="py-2 px-4 border-b text-left">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($spaces as $key => $space)
                        <tr>
                            <td class="py-2 px-4 border-b text-left">{{ $key + 1 }}</td>
                            <td class="py-2 px-4 border-b text-left">{{ $space->name }}</td>
                            <td class="py-2 px-4 border-b text-left">{{ $space->type }}</td>
                            <td class="py-2 px-4 border-b text-left">{{ $space->size }}ft</td>
                            <td class="py-2 px-4 border-b text-left">{{ $space->occupied ? "TRUE" : "FALSE" }}</td>
                            <td class="py-2 px-4 border-b text-left">
                                <a href="{{ route('spaces.show', $space->id) }}" class="text-green-500 hover:text-green-700">View</a>
                                <form action="{{ route('spaces.delete', ['space' => $space->id]) }}" method="POST">
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

            {{ $spaces->links() }} <!-- Laravel pagination links -->
        @else
            <p class="text-gray-700">No data entry</p>
        @endif
    </div>
</x-app-layout>
