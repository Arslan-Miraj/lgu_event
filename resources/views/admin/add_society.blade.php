@extends('admin.layout.app')

@section('main_content')
  <main class="flex-1 p-10">
    <h1 class="text-3xl font-bold text-lime-400 mb-8">Add New Society & Admin</h1>

    <div class="bg-gray-800 p-8 rounded-2xl shadow-lg max-w-2xl">
      <form method="POST" action="" class="space-y-6" id="societyForm">
        <!-- Society Name -->
        <div>
          <label for="societyName" class="block text-sm font-medium mb-2">Society Name</label>
          <input
            type="text"
            id="societyName"
            name="society_name"
            placeholder="e.g. Dramatics Society"
            class="w-full px-4 py-2 bg-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-lime-400 transition duration-200"
          />
        </div>

        <!-- Admin Name -->
        <div>
          <label for="adminName" class="block text-sm font-medium mb-2">Admin Name</label>
          <input
            type="text"
            id="adminName"
            name="admin_name"
            placeholder="e.g. Ali Raza"
            class="w-full px-4 py-2 bg-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-lime-400 transition duration-200"
          />
        </div>

        <!-- Admin Email -->
        <div>
          <label for="adminEmail" class="block text-sm font-medium mb-2">Admin Email</label>
          <input
            type="email"
            id="adminEmail"
            name="admin_email"
            placeholder="e.g. ali.raza@lgu.edu.pk"
            class="w-full px-4 py-2 bg-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-lime-400 transition duration-200"
          />
        </div>

        <p class="text-sm text-gray-400">Default password <span class="text-white font-semibold">123456</span> will be set. Society admin can change it later.</p>

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
              Add Society
            </button>
          </div>
        </div>
      </form>
    </div>
  </main>
@endsection

@section('customJS')
  <script>
    $('#societyForm').submit(function(e){
      e.preventDefault();
      $('#error-list').empty();
      // alert('Society Added');
      $.ajax({
        url: '{{ route("registerSociety") }}',
        type: 'post',
        dataType: 'json',
        data: $('#societyForm').serializeArray(),
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
      })
    })
  </script>
  
@endsection

