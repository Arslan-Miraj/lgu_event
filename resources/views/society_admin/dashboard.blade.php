@extends('society_admin.layout.app')
@section('main_content')

    <main class="flex-1 p-6 space-y-6 bg-gray-900">
    <!-- Top Bar -->
      <div class="my-6">
        <h2 class="text-2xl font-bold text-lime-400 mb-6 text-center">Welcome, <span>{{ $society->name }}</span> Head</h2>
      </div>

    <!-- Dashboard Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
      <a href="/view_events" class="bg-gradient-to-br from-purple-600 to-purple-800 rounded-lg shadow-md p-6 hover:shadow-xl transition transform hover:scale-105">
        <h2 class="text-xl font-semibold mb-2">Total Events Happened</h2>
        <p class="text-3xl font-bold">42</p>
        <p class="text-sm text-purple-200 mt-2">Click to view event details</p>
      </a>

      <a href="{{ route('super.admin.societies_list') }}" class="bg-gradient-to-br from-green-600 to-emerald-800 rounded-lg shadow-md p-6 hover:shadow-xl transition transform hover:scale-105">
        <h2 class="text-xl font-semibold mb-2">Total Societies</h2>
        <p class="text-3xl font-bold"></p>
        <p class="text-sm text-emerald-200 mt-2">Click to manage societies</p>
      </a>

      <a href="#" class="bg-gradient-to-br from-red-400 to-red-800 rounded-lg shadow-md p-6 hover:shadow-xl transition transform hover:scale-105">
        <h2 class="text-xl font-semibold mb-2">Upcoming Events</h2>
        <p class="text-3xl font-bold">10</p>
        <p class="text-sm text-blue-200 mt-2">Analytics coming soon</p>
      </a>

      <a href="#" class="bg-gradient-to-br from-cyan-600 to-blue-800 rounded-lg shadow-md p-6 hover:shadow-xl transition transform hover:scale-105">
        <h2 class="text-xl font-semibold mb-2">Total Students Registered</h2>
        <p class="text-3xl font-bold">320</p>
        <p class="text-sm text-blue-200 mt-2">Analytics coming soon</p>
      </a>
    </div>
  </main>
@endsection
