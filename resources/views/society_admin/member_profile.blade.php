@extends('society_admin.layout.app')

@section('main_content')


  <div class="max-w-5xl mx-auto p-6">
    <h1 class="text-3xl font-bold text-center text-lime-400 mb-10">Members Profile Setup</h1>

    <!-- Members Section -->
    <div class="bg-gray-800 rounded-lg p-6 shadow-lg">
      <h2 class="text-2xl font-semibold text-white mb-6">Society Members</h2>

      <!-- Single Member Block -->
      <div class="space-y-6" id="members-section">
        <div class="bg-gray-700 p-5 rounded-lg shadow-inner">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block mb-2 text-sm text-gray-300">Name</label>
              <input type="text" placeholder="Member Name"
                class="w-full p-3 rounded-lg bg-gray-800 text-white placeholder-gray-400 focus:ring-lime-400 focus:outline-none" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-gray-300">Email</label>
              <input type="email" placeholder="Email"
                class="w-full p-3 rounded-lg bg-gray-800 text-white placeholder-gray-400 focus:ring-lime-400 focus:outline-none" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-gray-300">Contact No</label>
              <input type="text" placeholder="Phone Number"
                class="w-full p-3 rounded-lg bg-gray-800 text-white placeholder-gray-400 focus:ring-lime-400 focus:outline-none" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-gray-300">Role</label>
              <input type="text" placeholder="e.g., General Secretary"
                class="w-full p-3 rounded-lg bg-gray-800 text-white placeholder-gray-400 focus:ring-lime-400 focus:outline-none" />
            </div>

            <!-- Member Image -->
            <div class="md:col-span-2">
              <label class="block mb-2 text-sm font-medium text-gray-300">Member Image</label>
              <label
                for="memberImage"
                class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed rounded-lg cursor-pointer bg-gray-800 hover:bg-gray-700 transition duration-300"
              >
                <div class="flex flex-col items-center justify-center pt-4 pb-4">
                  <svg class="w-10 h-10 mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                       xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M7 16V4a1 1 0 011-1h8a1 1 0 011 1v12m-4-4l4 4m0 0l-4 4m4-4H3"/>
                  </svg>
                  <p class="text-sm text-gray-300"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                  <p class="text-xs text-gray-400">PNG, JPG, JPEG (Max 2MB)</p>
                </div>
                <input id="memberImage" type="file" class="hidden" />
              </label>
            </div>
          </div>
        </div>
      </div>

      <!-- Add Member Button -->
      <div class="mt-8 text-center">
        <button type="button"
          class="bg-lime-500 hover:bg-lime-600 text-black font-semibold px-8 py-2 rounded-lg shadow transition duration-200">
          + Add Member
        </button>
      </div>
    </div>
  </div>

@endsection
