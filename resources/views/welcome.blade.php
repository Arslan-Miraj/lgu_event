@extends('auth.layout.app')
@section('content')
<body class="bg-gray-900 text-white">

  <!-- Navbar -->
  <header class="p-6 bg-gray-800 shadow-lg flex items-center justify-between">
    <h1 class="text-2xl font-bold text-lime-400">LGU Events</h1>
    <nav class="flex-1 flex justify-center space-x-6">
      <a href="#events" class="hover:text-lime-400">Home</a>
      <a href="#events" class="hover:text-lime-400">Events</a>
      <a href="#about" class="hover:text-lime-400">About</a>
    </nav>
    <div class="space-x-4">
      <a href="{{ route('account.register') }}" class="bg-lime-400 px-4 py-2 rounded text-black font-semibold">Register</a>
      <a href="{{ route('account.login') }}" class="bg-lime-400 px-4 py-2 rounded text-black font-semibold">Login</a>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="text-center py-20 bg-gradient-to-br from-gray-800 to-gray-900 relative overflow-hidden">
    <img src="https://www.transparenttextures.com/patterns/dark-mosaic.png" class="absolute inset-0 w-full h-full opacity-10 object-cover" alt="background texture">
    <h2 class="text-5xl font-bold mb-6 z-10 relative">Book <span class="text-lime-400">🎫</span> and Explore <span class="text-lime-400">➔</span> Events</h2>
    <p class="mb-8 text-lg text-gray-300 z-10 relative">Join the most exciting campus events organized by societies and departments at LGU.</p>
    <a href="#events" class="bg-lime-400 text-black px-6 py-3 rounded-full font-semibold z-10 relative inline-block">Explore Events</a>
  </section>

  <!-- Upcoming Events -->
  <section id="events" class="py-16 px-6 bg-gray-800">
    <h3 class="text-3xl font-semibold mb-8 text-center">Upcoming Events</h3>
    <div class="grid md:grid-cols-3 gap-6">
      <!-- Event cards -->
      <div class="bg-gray-700 p-6 rounded-lg shadow-lg">
        <img src="https://source.unsplash.com/400x250/?conference" alt="event" class="rounded mb-4">
        <h4 class="text-xl font-bold">Tech Conference 2025</h4>
        <p class="text-gray-300 mb-4">March 14, 2025 - Auditorium</p>
        <button class="bg-lime-400 text-black px-4 py-2 rounded">Register</button>
      </div>
      <div class="bg-gray-700 p-6 rounded-lg shadow-lg">
        <img src="https://source.unsplash.com/400x250/?culture,event" alt="event" class="rounded mb-4">
        <h4 class="text-xl font-bold">Cultural Gala</h4>
        <p class="text-gray-300 mb-4">April 10, 2025 - Main Hall</p>
        <button class="bg-lime-400 text-black px-4 py-2 rounded">Register</button>
      </div>
      <div class="bg-gray-700 p-6 rounded-lg shadow-lg">
        <img src="https://source.unsplash.com/400x250/?startup" alt="event" class="rounded mb-4">
        <h4 class="text-xl font-bold">Startup Pitch Night</h4>
        <p class="text-gray-300 mb-4">May 2, 2025 - Conference Room</p>
        <button class="bg-lime-400 text-black px-4 py-2 rounded">Register</button>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="py-16 px-6 bg-gray-900 text-center">
    <div class="max-w-3xl mx-auto">
      <img src="https://cdn-icons-png.flaticon.com/512/1055/1055687.png" alt="About icon" class="w-16 mx-auto mb-4">
      <h3 class="text-3xl font-semibold mb-6">About the Platform</h3>
      <p class="text-gray-300">
        LGU Event Management System is a centralized platform for managing, promoting, and registering for events across Lahore Garrison University.
        Designed for students, admins, and superadmins, it simplifies everything from announcements to analytics.
      </p>
    </div>
  </section>

  <!-- Featured Societies -->
  <section class="py-16 px-6 bg-gray-800">
    <h3 class="text-3xl font-semibold mb-8 text-center">Featured Societies</h3>
    <div class="flex flex-wrap justify-center gap-6">
      <div class="bg-gray-700 p-4 rounded-lg w-64 text-center">
        <img src="https://cdn-icons-png.flaticon.com/512/1041/1041880.png" class="w-12 mx-auto mb-2" alt="icon">
        <h4 class="font-bold text-xl mb-2">Tech Society</h4>
        <p class="text-gray-300">Hosts coding competitions and hackathons.</p>
      </div>
      <div class="bg-gray-700 p-4 rounded-lg w-64 text-center">
        <img src="https://cdn-icons-png.flaticon.com/512/3449/3449338.png" class="w-12 mx-auto mb-2" alt="icon">
        <h4 class="font-bold text-xl mb-2">Arts Club</h4>
        <p class="text-gray-300">Organizes cultural and artistic events.</p>
      </div>
    </div>
  </section>

  <!-- Event Categories -->
  <section class="py-16 px-6 bg-gray-900 text-center">
    <h3 class="text-3xl font-semibold mb-6">Explore by Category</h3>
    <div class="flex flex-wrap justify-center gap-4">
      <span class="bg-lime-400 text-black px-4 py-2 rounded-full font-semibold">🎓 Workshops</span>
      <span class="bg-lime-400 text-black px-4 py-2 rounded-full font-semibold">💻 Tech</span>
      <span class="bg-lime-400 text-black px-4 py-2 rounded-full font-semibold">🎭 Cultural</span>
      <span class="bg-lime-400 text-black px-4 py-2 rounded-full font-semibold">🏆 Competitions</span>
    </div>
  </section>

  <!-- How It Works -->
  <section class="py-16 px-6 bg-gray-800">
    <h3 class="text-3xl font-semibold mb-8 text-center">How It Works</h3>
    <div class="max-w-4xl mx-auto grid md:grid-cols-3 gap-8 text-center">
      <div>
        <div class="text-lime-400 text-4xl mb-2"><i class="ph-user-plus"></i></div>
        <h4 class="text-xl font-bold mb-2">1. Sign Up</h4>
        <p class="text-gray-300">Register as a student, admin or superadmin.</p>
      </div>
      <div>
        <div class="text-lime-400 text-4xl mb-2"><i class="ph-calendar-check"></i></div>
        <h4 class="text-xl font-bold mb-2">2. Join Events</h4>
        <p class="text-gray-300">Browse and register for exciting events.</p>
      </div>
      <div>
        <div class="text-lime-400 text-4xl mb-2"><i class="ph-star"></i></div>
        <h4 class="text-xl font-bold mb-2">3. Attend & Engage</h4>
        <p class="text-gray-300">Participate and leave your feedback!</p>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="py-16 px-6 bg-gray-900">
    <h3 class="text-3xl font-semibold mb-8 text-center">What Students Say</h3>
    <div class="flex flex-wrap justify-center gap-6">
      <div class="bg-gray-700 p-6 rounded-lg max-w-sm">
        <p class="italic text-gray-200">“This platform made it super easy to find and join events. Loved the smooth process!”</p>
        <p class="mt-4 font-bold text-lime-400">— Ahsan, CS Dept.</p>
      </div>
      <div class="bg-gray-700 p-6 rounded-lg max-w-sm">
        <p class="italic text-gray-200">“Best way to stay connected with society events at LGU. Highly recommended.”</p>
        <p class="mt-4 font-bold text-lime-400">— Zara, BBA Dept.</p>
      </div>
    </div>
  </section>

  <!-- Final CTA -->
  <section id="login" class="py-16 px-6 text-center bg-gray-800">
    <h3 class="text-3xl font-bold mb-4">Ready to Explore Events?</h3>
    <p class="mb-6 text-gray-300">Login or register to start participating today.</p>
    <a href="/register" class="bg-lime-400 text-black px-6 py-3 rounded-full font-semibold mr-4">Register</a>
    <a href="/login" class="border border-lime-400 px-6 py-3 rounded-full font-semibold text-lime-400">Login</a>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-900 text-center py-8 text-gray-400">
    <p>&copy; 2025 LGU Event Management System</p>
  </footer>
@endsection
