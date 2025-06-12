@extends('auth.layout.app')
@section('content')
<body class="bg-gray-900 text-white">
    @php
      use App\Enums\UserRole;
    @endphp
  <!-- Navbar -->
<header class="p-6 bg-gray-800 shadow-lg flex items-center justify-between">
  <h1 class="text-2xl font-bold text-lime-400">LGU Events</h1>
  <nav class="flex-1 flex justify-center space-x-6">
    <a href="#events" class="hover:text-lime-400">Home</a>
    <a href="#events" class="hover:text-lime-400">Events</a>
    <a href="#about" class="hover:text-lime-400">About</a>
  </nav>
  <div class="space-x-4">
    @auth
      <div class="flex items-center space-x-4">
        <span class="text-white font-semibold">Welcome, {{ Auth::user()->name }}</span>

        @if(Auth::user()->role === UserRole::SuperAdmin)
          <a href="{{ route('super.admin.dashboard') }}"
            class="bg-lime-500 px-4 py-2 rounded text-white font-semibold hover:bg-lime-600">
            Go to Dashboard
          </a>
        @endif
      </div>
    @else
      <div class="flex items-center space-x-4">
        <a href="{{ route('account.register') }}"
          class="bg-lime-400 px-4 py-2 rounded text-black font-semibold hover:bg-lime-300">
            Register
        </a>
        <a href="{{ route('account.login') }}"
          class="bg-lime-400 px-4 py-2 rounded text-black font-semibold hover:bg-lime-300">
            Login
        </a>
      </div>
    @endauth

  </div>
</header>

  <!-- Hero Section -->
  <section class="text-center py-20 bg-gradient-to-br from-gray-800 to-gray-900 relative overflow-hidden">
    <img src="https://www.transparenttextures.com/patterns/dark-mosaic.png" class="absolute inset-0 w-full h-full opacity-10 object-cover" alt="background texture">
    <h2 class="text-5xl font-bold mb-6 z-10 relative">Book <span class="text-lime-400">🎫</span> and Explore <span class="text-lime-400">➔</span> Events</h2>
    <p class="mb-8 text-lg text-gray-300 z-10 relative">Join the most exciting campus events organized by societies and departments at LGU.</p>
    <a href="#events" class="bg-lime-400 text-black px-6 py-3 rounded-full font-semibold z-10 relative inline-block">Explore Events</a>
  </section>

<section id="events" class="py-20 px-6 bg-gradient-to-b from-gray-800 via-gray-900 to-gray-800 text-center">
  <h3 class="text-4xl font-bold mb-12 text-lime-400 tracking-wide">📅 Upcoming Events</h3>

  <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10 max-w-6xl mx-auto">

    @foreach ($events as $evt)
    <div class="flex flex-col items-center space-y-4">
      <!-- Card -->
      <a href="/event/startup-pitch-night" class="block group relative rounded-2xl overflow-hidden shadow-xl hover:shadow-lime-400/40 transform hover:scale-[1.03] transition duration-300 w-full cursor-pointer" aria-label="View details for Startup Pitch Night">
        <img src="{{ asset('storage/' . $evt->poster) }}" alt="Event Poster" class="w-full h-80 object-cover z-10 relative">
        <div class="absolute inset-0 bg-black/60 flex items-end z-20 p-6">
            <div class="bg-black/70 w-full rounded-xl p-4 space-y-2 shadow-md">


            <p class="text-lime-400 text-sm font-medium flex items-center">
              <span class="mr-2">👥</span>
              Organized by: <span class="ml-1 font-semibold">{{ $evt->society->name }}</span>
            </p>

            <p class="text-white text-sm flex items-center">
              <span class="mr-2">📍</span>
              {{ $evt->location }}
            </p>
            <p class="text-white text-sm flex items-center">
              <span class="mr-2">🕒</span>
              {{ \Carbon\Carbon::parse($evt->event_date)->format('M d, Y') }} —
              {{ \Carbon\Carbon::parse($evt->start_time)->format('g:i A') }} to
              {{ \Carbon\Carbon::parse($evt->end_time)->format('g:i A') }}
            </p>

          </div>
        </div>
      </a>

      <h4 class="text-lime-500 text-2xl font-semibold">{{ $evt->title }}</h4>
    </div>
    @endforeach
  </div>

  <div class="mt-12">
    <a href="#" class="inline-block bg-lime-400 text-black px-6 py-3 rounded-full font-semibold hover:bg-lime-500 transition">
      View All Events
    </a>
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
  {{-- <section class="py-16 px-6 bg-gray-800">
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
  </section> --}}

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

  <!-- Our Societies -->
<section id="societies" class="py-20 px-6 bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 text-center">
  <h3 class="text-4xl font-bold mb-12 text-lime-400 tracking-wide">🌟 Our Societies</h3>
  <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10 max-w-6xl mx-auto ">
    @foreach ($society as $soc)
    <a href="#"
       class="bg-gray-800 rounded-2xl shadow-lg hover:shadow-lime-400/40 hover:scale-[1.02] transform transition-all duration-300 p-6 text-left ">
      
      <div class="flex items-center space-x-4 mb-4">
        <img src=""
             alt="Tech Society"
             class="w-16 h-16 object-cover rounded-full border-2 border-lime-400 shadow-md">
        <h4 class="text-2xl font-bold text-white ">{{ $soc->name }}</h4>
      </div>

      <p class="text-gray-300 text-md leading-relaxed">
        {{ $soc->description }}
      </p>

      <div class="mt-4">
        <span class="inline-block bg-lime-500 text-black px-3 py-1 text-sm rounded-full font-semibold">
          View Members →
        </span>
      </div>
    </a>
  @endforeach
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
