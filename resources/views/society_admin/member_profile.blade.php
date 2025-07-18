@extends('society_admin.layout.app')

@section('main_content')


  <div class="max-w-5xl mx-auto p-6">
    <h1 class="text-3xl font-bold text-center text-lime-400 mb-10">Members Profile Setup</h1>
    
    <!-- Members Section -->
    <div class="bg-gray-800 rounded-lg p-2 shadow-lg ">
      
      <div class="my-4 text-center flex items-center justify-between">
        <h2 class="text-2xl font-semibold text-white">Society Members</h2>
        <button type="button" id="addMember"
          class="bg-lime-500 hover:bg-lime-600 text-black font-semibold px-8 py-2 rounded-lg shadow transition duration-200">
          + Add Member
        </button>
      </div>

      <div id="members-wrapper" class="space-y-6 mt-6"></div>
      
      <div class="space-y-6 hidden" id="members">
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
              <label class="block text-sm font-semibold text-white mb-2">Member Image</label>
              <div class="bg-gray-700 border-2 border-dashed border-lime-400 rounded-lg p-6 text-center text-gray-300">
                <svg class="w-12 h-12 mx-auto mb-2 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M7 16V4a1 1 0 011-1h8a1 1 0 011 1v12m-4-4l4 4m0 0l-4 4m4-4H3" />
                </svg>
                <p class="mb-2">Drag & drop member image or click below</p>
                <input type="file" name="memberImage" class="w-full rounded-full mt-2 text-sm bg-gray-800 text-white file:bg-lime-400 file:text-black file:px-4 file:py-2 file:rounded-full file:border-none">
              </div>
            </div>

          </div>
        </div>
      </div>
      
    </div>
  </div>

@endsection

@section('customJS')
  <script>
    $(document).ready(function (){
      $('#addMember').on('click', function(){
        let newMember = $('#members').html();
        $('#members-wrapper').append(newMember);
      });
    });
  </script>
@endsection
