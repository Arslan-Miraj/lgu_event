@extends('society_admin.layout.app')

@section('main_content')

<section class="min-h-screen bg-gray-900 text-white py-16 px-6">
  <div class="max-w-7xl mx-auto">

    <!-- Filter -->
    <div class="flex justify-between items-center mb-8">
      <h2 class="text-3xl font-bold text-lime-400">🎉 All Events</h2>

      <form method="GET" action="" class="flex space-x-3">
        <select name="society" onchange="this.form.submit()" class="bg-gray-700 text-white px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-lime-400">
          <option value="all">All Societies</option>
            <option value=""></option>
        </select>
      </form>
    </div>

    <!-- Events Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10">
        <a href=""
           class="block group bg-gray-800 rounded-xl overflow-hidden shadow hover:shadow-lime-400 transition hover:scale-[1.02]">

          <img src="" class="w-full h-56 object-cover">

          <div class="p-4 space-y-1">
            <h3 class="text-xl text-lime-400 font-bold"></h3>
            <p class="text-sm text-gray-400">📅  &bull; 🕒  - </p>
            <p class="text-sm text-gray-400">📍 </p>
            <p class="text-sm text-gray-400">🏛️ </p>
          </div>

        </a>
        <p class="text-center col-span-3 text-gray-300">No events found for this filter.</p>
    </div>
  </div>
</section>


@endsection