@extends('auth.layout.app')
@section('content')
<body class="bg-gray-900 text-white min-h-screen flex items-center justify-center px-4">

  <!-- Register Form -->
  <div class="bg-gray-800 p-8 rounded-lg shadow-lg w-full max-w-md">
    <h2 class="text-3xl font-bold text-center text-lime-400 mb-6">Create an Account</h2>
    <form action="" method="" class="space-y-5" id="registerProcess">
      <div>
        <input type="text" name="name" id="name" class="w-full px-4 py-2 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-lime-400" placeholder="Full Name">
      </div>
      <div>
        <input type="text" name="email" id="email" class="w-full px-4 py-2 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-lime-400" placeholder="Email">
      </div>
      <div>
        <input type="password" name="password" id="password" class="w-full px-4 py-2 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-lime-400" placeholder="Password">
      </div>
      <button type="submit" class="w-full bg-lime-400 text-black py-2 rounded font-semibold">Register</button>
      <p class="text-sm text-gray-400 text-center">Already have an account? <a href="/login" class="text-lime-400 hover:underline">Login</a></p>

      <div class="hidden p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-600 dark:bg-red-400 dark:text-red-800" role="alert" id="error">
        <ul id="error-list" class="list-none list-inside space-y-1"></ul>
      </div>

      <div class="hidden p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-600 dark:bg-green-400 dark:text-green-800" role="alert" id="success">
        <span class="font-medium">Registered Successfully</span>
      </div>
    </form>
  </div>
@endsection

@section('customJS')
    <script>
        $('#registerProcess').submit(function(e){  
          e.preventDefault();
          $('#error-list').empty();

          $.ajax({
            url: '{{ route("account.registerProcess") }}',
            type: 'post',
            data: $('#registerProcess').serializeArray(),
            dataType: 'json',
            success: function(response){
              // console.log(response);
              let errors = response.errors;
              
              if (errors && errors.length > 0) {
                // Loop through errors and append to list
                $.each(errors, function(field, message) {
                  $('#error-list').append('<li data-field="' + field + '">' + message + '</li>');
                });

                $('#error').removeClass('hidden');
              }
              else if (response.status == true){
                
                setTimeout(() => {
                  $('#success').removeClass('hidden');
                }, 8000);
                window.location.href = '{{ route("account.login") }}';
                $('#registerProcess')[0].reset();
              }
            }
          });
        });
    </script>
@endsection