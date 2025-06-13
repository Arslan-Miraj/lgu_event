<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Society Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0F0F23] text-white">

  <!-- Navbar -->
  <nav class="flex items-center justify-between px-6 py-4 border-b border-gray-700">
    <div class="text-2xl font-extrabold text-lime-400">EVENTX</div>
    <ul class="hidden md:flex gap-8 font-semibold text-sm">
      <li><a href="#" class="hover:text-lime-300">HOME</a></li>
      <li><a href="#" class="hover:text-lime-300">EVENTS</a></li>
      <li><a href="#" class="hover:text-lime-300">SPEAKERS</a></li>
      <li><a href="#" class="hover:text-lime-300">PRICING</a></li>
    </ul>
    <a href="#" class="bg-lime-400 text-black font-bold px-4 py-2 rounded hover:bg-lime-300 text-sm">SIGN UP</a>
  </nav>

  <!-- Hero Section -->
  <section class="grid md:grid-cols-2 py-12 px-6 gap-10">
    <!-- Event Details + Play Button -->
    <div class="bg-[#1A1A35] rounded-xl p-6 flex flex-col justify-between">
      <div>
        <p class="text-lime-300 font-bold text-sm mb-4">EVENT DETAILS</p>
        <ul class="space-y-2 text-gray-400 text-sm">
          <li><strong class="text-white">Title:</strong> Future of Tech 2025</li>
          <li><strong class="text-white">Date:</strong> August 18, 2025</li>
          <li><strong class="text-white">Time:</strong> 10:00 AM - 4:00 PM</li>
          <li><strong class="text-white">Location:</strong> Expo Center, Karachi</li>
        </ul>
      </div>
      <div class="flex justify-center mt-6">
        <div class="relative w-24 h-24 rounded-full bg-lime-400 flex items-center justify-center text-black font-bold text-xs">
          <div class="absolute text-[10px] text-center w-24 h-24 flex items-center justify-center animate-pulse">
            BOOK A SEAT ● BOOK A SEAT ●
          </div>
          <div class="z-10">
            <svg class="w-6 h-6" fill="black" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
          </div>
        </div>
      </div>
    </div>

    <!-- Countdown + Call to Action -->
    <div class="bg-[#1A1A35] rounded-xl p-8 ml-4 space-y-8">
      <div>
        <p class="text-sm text-gray-400 mb-4">Welcome to EventX, the ultimate destination for discovering and booking upcoming events.</p>
        <div class="flex gap-6 text-center">
          <div>
            <div class="text-4xl font-extrabold text-white">23</div>
            <div class="text-xs text-gray-400 uppercase">Hours</div>
          </div>
          <div>
            <div class="text-4xl font-extrabold text-white">04</div>
            <div class="text-xs text-gray-400 uppercase">Minutes</div>
          </div>
          <div>
            <div class="text-4xl font-extrabold text-white">47</div>
            <div class="text-xs text-gray-400 uppercase">Seconds</div>
          </div>
        </div>
      </div>
      <a href="#" class="w-full block text-center bg-lime-400 text-black font-bold py-3 rounded hover:bg-lime-300 text-sm flex items-center justify-center gap-2">
        Book Your Seat for EVENTX
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
        </svg>
      </a>
    </div>
  </section>

</body>
</html>

