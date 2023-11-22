<!-- resources/views/view-parking-space.blade.php -->
<x-app-layout>
    <div class="container mx-auto px-6 lg:px-20 py-8">
        <h2 class="text-3xl font-bold mb-6">View Parking Space</h2>

        <div class="max-w-md mx-auto">
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Name:</label>
                <p class="py-2 px-4 border rounded-md">{{ $space->name }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Type:</label>
                <p class="py-2 px-4 border rounded-md">{{ $space->type }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Size (Decimal):</label>
                <p class="py-2 px-4 border rounded-md">{{ $space->size }} ft</p>
            </div>

            <div class="flex space-x-4">

                <form action="{{ route('spaces.delete', ['space' => $space->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-full font-semibold">Delete</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
