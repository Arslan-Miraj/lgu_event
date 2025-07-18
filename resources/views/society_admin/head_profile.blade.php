@extends('society_admin.layout.app')

@section('main_content')
<div class="w-full px-4 py-8 bg-gray-900 min-h-screen space-y-12">

  {{-- Form 1: Basic Info --}}
  <div class="max-w-4xl mx-auto bg-gray-800 rounded-xl shadow-lg p-6">
    <h2 class="text-2xl font-bold text-lime-400 mb-6">Account Information</h2>

    <form id="updateBasicInfo" class="space-y-6">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <label class="block text-sm font-medium text-gray-300 mb-1">Head Name</label>
          <input type="text" name="name" value="{{ $user->name }}"
            class="w-full bg-gray-700 text-white rounded-md p-3" />
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-300 mb-1">Email</label>
          <input type="email" name="email" value="{{ $user->email }}"
            class="w-full bg-gray-700 text-white rounded-md p-3" />
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <label class="block text-sm font-medium text-gray-300 mb-1">Contact No</label>
          <input type="text" name="contact_no" value="{{ $user->contact_no }}"
            class="w-full bg-gray-700 text-white rounded-md p-3" />
        </div>
        <div class="relative">
          <label class="block text-sm font-medium text-gray-300 mb-1">Password</label>
          <input type="password" name="password" id="password" value="{{ $user->plain_password }}"
            class="w-full bg-gray-700 text-white rounded-md p-3 pr-12" />

          <button type="button" id="togglePassword"
            class="absolute inset-y-0 right-3 top-[36px] text-gray-400 hover:text-white focus:outline-none">
            👁️
          </button>
        </div>
      </div>

      <div>
        <label class="block text-sm font-semibold text-white mb-2">Head Image</label>
        <div class="bg-gray-700 border-2 border-dashed border-lime-400 rounded-lg p-6 text-center text-gray-300">
          <svg xmlns="" class="w-12 h-12 mx-auto mb-2 text-lime-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M7 16V4m0 0L3.5 7.5M7 4l3.5 3.5M17 8v12m0 0l-3.5-3.5M17 20l3.5-3.5" />
          </svg>
          <p class="mb-2">Drag & drop your event poster or click below</p>
          <input type="file" name="headImage" class="w-full rounded-full mt-2 text-sm bg-gray-800 text-white file:bg-lime-400 file:text-black file:px-4 file:py-2 file:rounded-full file:border-none">
        </div>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-300 mb-1">Message from Head</label>
        <textarea name="message" rows="2" placeholder="Write a message..."
          class="w-full bg-gray-700 text-white rounded-md p-2 resize-none">{{ $user->message }}</textarea>
      </div>

      <div class="flex justify-between items-center space-x-4">
          <div class="flex-1 max-w-xl min-w-[300px]">
            <div id="error" class="hidden p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-600 dark:bg-red-400 dark:text-red-800" role="alert">
              <ul id="error-list" class="list-none list-inside space-y-1"></ul>
            </div>
            <div id="success" class="hidden p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-600 dark:bg-green-400 dark:text-green-800" role="alert">
              <span class="font-medium">Record updated successfully.</span>
            </div>
          </div>

          <div class="flex-shrink-0">
            <button type="submit" class="bg-lime-400 text-black px-6 py-2 rounded-lg font-semibold hover:bg-lime-300 transition duration-200 whitespace-nowrap">
              Save Account Profile
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

    $('#togglePassword').on('click', function () {
      const passwordInput = $('#password');
      const type = passwordInput.attr('type') === 'password' ? 'text' : 'password';
      passwordInput.attr('type', type);
      $(this).text(type === 'password' ? '👁️' : '🙈');
    });


    $('#updateBasicInfo').submit(function(e){
      e.preventDefault();
      $('#error-list').empty();

      const form = $('#updateBasicInfo');
      const formData = new FormData(form);
      $.ajax({
        url: '{{ route("admin.updateHeadProfile") }}',
        type: 'post',
        data: formData,
        processData: false, // ⛔ don't process data
        contentType: false, // ⛔ don't set content-type
        dataType: 'json',
        success: function(response){
          $('#error').addClass('hidden');
          $('#success').addClass('hidden');

          let errors = response.errors;
          if (errors && Object.keys(errors).length > 0){
            $.each(errors, function(field, message) {
              $('#error-list').append('<li data-field="' + field + '">' + message + '</li>');
            });
            $('#error').removeClass('hidden');
          }
          else if (response.status == true){
            $('#success').removeClass('hidden');
            setTimeout(() => {
              $('#success').addClass('hidden');
              $('#societyForm')[0].reset();
            }, 2000);
          }
        }
      });
    })
  });
</script>
@endsection
