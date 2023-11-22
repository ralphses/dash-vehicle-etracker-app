<!-- resources/views/add-parking-space.blade.php -->
<x-app-layout>
    <div class="container mx-auto px-6 lg:px-20 py-8">
        <div class="max-w-md mx-auto">
            <h2 class="text-3xl font-bold mb-6">Add Parking Space</h2>

            <form action="{{ route('spaces.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                    <input type="text" id="name" name="name"
                           class="w-full px-4 py-2 border rounded-md @error('name') border-red-500 @enderror">
                    @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="type" class="block text-gray-700 font-bold mb-2">Type:</label>
                    <select id="type" name="type"
                            class="w-full px-4 py-2 border rounded-md @error('type') border-red-500 @enderror">
                        <option value="car">Car</option>
                        <option value="tricycle">Tricycle</option>
                        <option value="motorcycle">Motorcycle</option>
                    </select>
                    @error('type')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="size" class="block text-gray-700 font-bold mb-2">Size (Decimal):</label>
                    <input type="number" step="0.01" id="size" name="size"
                           class="w-full px-4 py-2 border rounded-md @error('size') border-red-500 @enderror">
                    @error('size')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white px-8 py-3 rounded-full font-semibold">Add
                        Parking Space
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
