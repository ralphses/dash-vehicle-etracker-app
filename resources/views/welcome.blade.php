<x-guest-layout>
  <x-header />

  <div class="bg-gradient-to-b from-green-600 to-green-800">
      <div class="container mx-auto px-6 lg:px-20 py-20">
          <div class="text-center text-white">
              <h1 class="text-4xl lg:text-6xl font-bold leading-tight mb-4">Efficient Vehicle Management for Visitors</h1>
              <p class="text-lg lg:text-xl mb-8">Welcome to Dalhatu Araf Specialist Hospital! Easily manage your visit
                  by registering your vehicle. We record your vehicle details and assign parking spaces for a
                  hassle-free experience during your stay.</p>
              <div class="flex items-center justify-center space-x-4">
                  <a href="{{ route('vehicle.register') }}"
                      class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-full font-semibold">Register
                      Your Vehicle</a>
                  <a href="#" class="text-white">Learn more <span class="ml-1">&rarr;</span></a>
              </div>
          </div>
      </div>
  </div>

  <div class="container mx-auto px-6 lg:px-20 py-20">
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-16">
          <div class="text-center">
              <h2 class="text-2xl font-bold mb-4 text-green-700">Secure Parking Space Recording</h2>
              <p class="text-gray-700">Your parking space is our priority. Register your vehicle, and we'll ensure a
                  secure and well-recorded parking space for you during your visit.</p>
          </div>
          <div class="text-center">
              <h2 class="text-2xl font-bold mb-4 text-green-700">Effortless Entry and Exit Records</h2>
              <p class="text-gray-700">We record your vehicle details upon entry and exit. Easily keep track of your
                  hospital visits with our efficient entry and exit recording system.</p>
          </div>
          <div class="text-center">
              <h2 class="text-2xl font-bold mb-4 text-green-700">Visitor-Friendly Experience</h2>
              <p class="text-gray-700">Experience a smooth and visitor-friendly process. Register your vehicle now for
                  a seamless stay at Dalhatu Araf Specialist Hospital.</p>
          </div>
      </div>
  </div>

  <div class="bg-white">
      <div class="container mx-auto px-6 lg:px-20 py-20">
          <div class="text-center">
              <h2 class="text-3xl font-bold mb-4 text-gray-800">Ready to Register Your Vehicle?</h2>
              <p class="text-gray-700">Enjoy a hassle-free experience during your hospital visit. Register your
                  vehicle now and make the most of your stay.</p>
              <div class="mt-8">
                  <a href="{{ route('vehicle.register') }}"
                      class="bg-green-500 hover:bg-green-600 text-white px-8 py-4 rounded-full font-semibold">Register
                      Your Vehicle</a>
              </div>
          </div>
      </div>
  </div>

  <x-footer />

  @if(session('success'))
        <!-- Modal -->
        <div id="modal-container" class="fixed inset-0 z-50 flex items-center justify-center overflow-x-hidden overflow-y-auto outline-none focus:outline-none">
            <div class="relative w-auto max-w-sm mx-auto my-6">
                <!-- Modal content -->
                <div class="relative flex flex-col w-full bg-white border-0 rounded-lg shadow-lg outline-none focus:outline-none">
                    <!-- Header -->
                    <div class="flex items-start justify-between p-5 border-b border-solid border-gray-300 rounded-t">
                        <h3 class="text-2xl font-semibold">Success</h3>
                        <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="closeModal()">
                            <span class="text-2xl">×</span>
                        </button>
                    </div>
                    <!-- Body -->
                    <div class="relative p-6 flex-auto">
                      {{ session('success') }}
                    </div>
                    <!-- Footer -->
                    <div class="flex items-center justify-end p-6 border-t border-solid border-gray-300 rounded-b">
                        <button class="bg-green-500 text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded-full shadow hover:shadow-lg outline-none focus:outline-none" onclick="closeModal()">
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
</x-guest-layout>
