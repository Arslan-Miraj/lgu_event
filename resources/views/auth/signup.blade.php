@extends('auth.layout.app')
@section('content')
<body class="bg-gray-900 text-white min-h-screen flex items-center justify-center px-4">

  <!-- Register Form -->
  <div class="bg-gray-800 p-8 rounded-lg shadow-lg w-full max-w-md">
    <h2 class="text-3xl font-bold text-center text-lime-400 mb-6">Create an Account</h2>
    <form action="/register" method="POST" class="space-y-5">
      <div>
        <input type="text" name="name" id="name" class="w-full px-4 py-2 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-lime-400" required placeholder="Full Name">
      </div>
      <div>
        <input type="email" name="email" id="email" class="w-full px-4 py-2 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-lime-400" required placeholder="Email">
      </div>
      <div>
        <input type="password" name="password" id="password" class="w-full px-4 py-2 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-lime-400" required placeholder="Password">
      </div>
      <button type="submit" class="w-full bg-lime-400 text-black py-2 rounded font-semibold">Register</button>
      <p class="text-sm text-gray-400 text-center">Already have an account? <a href="/login" class="text-lime-400 hover:underline">Login</a></p>
    </form>
  </div>
@endsection