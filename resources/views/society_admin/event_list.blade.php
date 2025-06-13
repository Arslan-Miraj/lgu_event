<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>All Events</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white">

  <section class="min-h-screen py-16 px-6">
    <div class="max-w-7xl mx-auto">

      <!-- Filter -->
      <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold text-lime-400">🎉 All Events</h2>

        <form method="GET" action="#" class="flex space-x-3">
          <select name="society" class="bg-gray-700 text-white px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-lime-400">
            <option value="all">All Societies</option>
            <option value="Tech Society">Tech Society</option>
            <option value="Art Club">Art Club</option>
          </select>
          <button type="submit" class="bg-lime-400 text-black px-4 py-2 rounded hover:bg-lime-500">Filter</button>
        </form>
      </div>

      <!-- Events Grid -->
      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10">

        <!-- Event Card -->
        <a href="event-details.html"
           class="block group bg-gray-800 rounded-xl overflow-hidden shadow hover:shadow-lime-400 transition hover:scale-[1.02]">

          <img src="storage/posters/event_image.jpg" class="w-full h-56 object-cover" alt="Event">

          <div class="p-4 space-y-1">
            <h3 class="text-xl text-lime-400 font-bold">Startup Pitch Night</h3>
            <p class="text-sm text-gray-400">📅 June 12, 2025 • 🕒 2:00 PM - 5:00 PM</p>
            <p class="text-sm text-gray-400">📍 Auditorium A</p>
            <p class="text-sm text-gray-400">🏛️ Tech Society</p>
          </div>

        </a>

        <!-- Duplicate this block for more events -->

      </div>
    </div>
  </section>

</body>
</html>
