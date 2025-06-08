@extends('society_admin.layout.app')
@section('main_content')
<div class="w-full px-4 py-4 bg-gray-900 min-h-screen space-y-8">

  {{-- Form 2: Head Profile Info --}}
  <div class="max-w-4xl mx-auto bg-gray-800 rounded-xl shadow-lg p-4">
    <h2 class="text-xl font-bold text-lime-400 mb-4">Head Profile</h2>

    <form id="updateSocietyProfile" enctype="multipart/form-data" class="space-y-4">
      
      <!-- Head Image -->
      <div>
        <label class="block text-sm font-medium text-gray-300 mb-1">Society Head Image</label>
        <label for="headImage"
          class="flex flex-col items-center justify-center w-full h-24 border-2 border-dashed border-gray-600 rounded-md cursor-pointer bg-gray-700 hover:bg-gray-600 transition">
          <div class="flex flex-col items-center py-2">
            <svg class="w-6 h-6 text-gray-400 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7 16V4a1 1 0 011-1h8a1 1 0 011 1v12m-4-4l4 4m0 0l-4 4m4-4H3" />
            </svg>
            <p class="text-xs text-gray-300">Click or drag to upload (Max 2MB)</p>
          </div>
          <input id="headImage" type="file" class="hidden" name="headImage" accept=".png, .jpg, .jpeg" />
        </label>
      </div>

      <!-- Message -->
      <div>
        <label class="block text-sm font-medium text-gray-300 mb-1">Message from Head</label>
        <textarea name="message" rows="2" placeholder="Write a message..."
          class="w-full bg-gray-700 text-white rounded-md p-2 resize-none"></textarea>
      </div>

      <!-- Description -->
      <div>
        <label class="block text-sm font-medium text-gray-300 mb-1">Society Description</label>
        <textarea name="description" rows="2" placeholder="Society description..."
          class="w-full bg-gray-700 text-white rounded-md p-2 resize-none"></textarea>
      </div>

      <!-- Society Logo -->
      <div>
        <label class="block text-sm font-medium text-gray-300 mb-1">Society Logo</label>
        <label for="societyLogo"
          class="flex flex-col items-center justify-center w-full h-24 border-2 border-dashed border-gray-600 rounded-md cursor-pointer bg-gray-700 hover:bg-gray-600 transition">
          <div class="flex flex-col items-center py-2">
            <svg class="w-6 h-6 text-gray-400 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7 16V4a1 1 0 011-1h8a1 1 0 011 1v12m-4-4l4 4m0 0l-4 4m4-4H3" />
            </svg>
            <p class="text-xs text-gray-300">Click or drag to upload (Max 2MB)</p>
          </div>
          <input id="societyLogo" type="file" class="hidden" name="logo" accept=".png, .jpg, .jpeg" />
        </label>
      </div>

      <!-- Submit -->
      <div class="flex justify-between items-center space-x-4">
          <div class="flex-1 max-w-xl min-w-[300px]">
            <div id="error" class="hidden p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-600 dark:bg-red-400 dark:text-red-800" role="alert">
              <ul id="error-list" class="list-none list-inside space-y-1"></ul>
            </div>
            <div id="success" class="hidden p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-600 dark:bg-green-400 dark:text-green-800" role="alert">
              <span class="font-medium">Society created successfully.</span>
            </div>
          </div>

          <div class="flex-shrink-0">
            <button type="submit" class="bg-lime-400 text-black px-6 py-2 rounded-lg font-semibold hover:bg-lime-300 transition duration-200 whitespace-nowrap">
              Save
            </button>
          </div>
        </div>
    </form>
  </div>
</div>
@endsection

@section('customJS')
<script>
  $(document).ready(function(){

    $('#updateSocietyProfile').submit(function(e){
      e.preventDefault();
    })
  });

</script>
@endsection
