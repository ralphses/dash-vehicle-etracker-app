<!-- resources/views/add-vehicle-entry.blade.php -->

<x-guest-layout>
    <x-header />

    <!-- Add Vehicle Entry Form -->
    <div class="container mx-auto px-6 lg:px-20 py-20">
        <div class="max-w-md mx-auto"> <!-- Adjusted container size -->
            <div class="text-center">
                <h2 class="text-3xl font-bold mb-4 text-gray-800">Add New Vehicle Entry</h2>
                <!-- Vehicle Entry Form -->
                <form action="{{ route('vehicle.entry.new') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="registration_number" class="block text-gray-700 text-sm font-semibold mb-2">Vehicle
                            Registration Number</label>
                        <input type="text" id="registration_number" name="registration_number"
                            class="w-full px-4 py-2 border rounded-md" value="{{ session('number') ?? ""}}">
                    </div>
                    <div class="mb-4">
                        <label for="parking_space" class="block text-gray-700 text-sm font-semibold mb-2">Parking
                            Space</label>
                        <select id="parking_space" name="parking_space" class="w-full px-4 py-2 border rounded-md">

                            @foreach ($parkingSpaces as $space)
                                <option value="{{ $space->id }}">{{ $space->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="driver_name" class="block text-gray-700 text-sm font-semibold mb-2">Driver
                            Name</label>
                        <input type="text" id="driver_name" name="driver_name"
                            class="w-full px-4 py-2 border rounded-md">
                    </div>
                    <button type="submit"
                        class="w-full bg-green-500 hover:bg-green-600 text-white px-8 py-4 rounded-full font-semibold">Add
                        Vehicle Entry</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for Success -->
    @if (session('success'))
        <!-- Modal -->
        <div id="modal-container"
            class="fixed inset-0 z-50 flex items-center justify-center overflow-x-hidden overflow-y-auto outline-none focus:outline-none">
            <div class="relative w-auto max-w-sm mx-auto my-6">
                <!-- Modal content -->
                <div
                    class="relative flex flex-col w-full bg-white border-0 rounded-lg shadow-lg outline-none focus:outline-none">
                    <!-- Header -->
                    <div class="flex items-start justify-between p-5 border-b border-solid border-gray-300 rounded-t">
                        <h3 class="text-2xl font-semibold">Success</h3>
                        <button
                            class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
                            onclick="closeModal()">
                            <span class="text-2xl">×</span>
                        </button>
                    </div>
                    <!-- Body -->
                    <div class="relative p-6 flex-auto">
                        {{ session('success') }}
                    </div>
                    <!-- Footer -->
                    <div class="flex items-center justify-end p-6 border-t border-solid border-gray-300 rounded-b">
                        <button
                            class="bg-green-500 text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded-full shadow hover:shadow-lg outline-none focus:outline-none"
                            onclick="closeModal()">
                            OK
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div id="modal-overlay" class="fixed inset-0 z-40 bg-black opacity-25" onclick="closeModal()"></div>
        <script>
            function closeModal() {
                document.getElementById('modal-container').style.display = 'none';
                document.getElementById('modal-overlay').style.display = 'none';
            }
        </script>
    @endif

    <x-footer />
</x-guest-layout>
