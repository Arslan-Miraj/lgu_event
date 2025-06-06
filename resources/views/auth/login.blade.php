@extends('auth.layout.app')
@section('content')
<body class="bg-gray-900 text-white min-h-screen flex items-center justify-center px-4">

  <!-- Login Form -->
  <div class="bg-gray-800 p-8 rounded-lg shadow-lg w-full max-w-md">
    <h2 class="text-3xl font-bold text-center text-lime-400 mb-6">Login to LGU Events</h2>
    <form action="/login" method="POST" class="space-y-5">
      <div>
        <input type="email" name="email" id="email" class="w-full px-4 py-2 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-lime-400" placeholder="Email">
      </div>
      <div>
        <input type="password" name="password" id="password" class="w-full px-4 py-2 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-lime-400" placeholder="Password">
      </div>
      <button type="submit" class="w-full bg-lime-400 text-black py-2 rounded font-semibold">Login</button>
      <p class="text-sm text-gray-400 text-center">Don't have an account? <a href="{{ route('account.register') }}" class="text-lime-400 hover:underline">Register</a></p>
    </form>
  </div>
@endsection
