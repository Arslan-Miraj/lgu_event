@extends('auth.layout.app')
@section('content')
<body class="bg-gray-900 text-white min-h-screen flex items-center justify-center px-4">

  <!-- Login Form -->
  <div class="bg-gray-800 p-8 rounded-lg shadow-lg w-full max-w-md">
    <h2 class="text-3xl font-bold text-center text-lime-400 mb-6">Login to LGU Events</h2>
    <form action="" method="POST" class="space-y-5" id="loginProcess">
      <div>
        <input type="email" name="email" id="email" class="w-full px-4 py-2 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-lime-400" placeholder="Email">
      </div>
      <div>
        <input type="password" name="password" id="password" class="w-full px-4 py-2 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-lime-400" placeholder="Password">
      </div>
      <button type="submit" class="w-full bg-lime-400 text-black py-2 rounded font-semibold">Login</button>
      <p class="text-sm text-gray-400 text-center">Don't have an account? <a href="{{ route('account.register') }}" class="text-lime-400 hover:underline">Register</a></p>

      <div class="hidden p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-600 dark:bg-red-400 dark:text-red-800" role="alert" id="error">
        <ul id="error-list" class="list-none list-inside space-y-1"></ul>
      </div>

      <div class="hidden p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-600 dark:bg-green-400 dark:text-green-800" role="alert" id="success">
        <span class="font-medium">Logged In Successfully</span>
      </div>

    </form>
  </div>
@endsection

@section('customJS')
  <script>
    $('#loginProcess').submit(function(e){
      // alert('clicked');
      e.preventDefault();
      $('#error-list').empty();
      
      $.ajax({
        url: '{{ route("account.loginProcess") }}',
        type: 'post',
        data: $('#loginProcess').serializeArray(),
        dataType: 'json',
        success: function(response){
          // console.log(response);
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
              if (response.role === 'superadmin'){
                window.location.href = '{{ route("super.admin.dashboard") }}';
              }
              if (response.role === 'admin'){
                window.location.href = '{{ route("admin.dashboard") }}';
              }

              if (response.role === 'user'){
                window.location.href = '{{ route("home") }}';
              }
              
              $('#loginProcess')[0].reset();
            }, 2000);
          }
        }
      })
    })
  </script>
@endsection
