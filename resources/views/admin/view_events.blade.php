<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Events - LGU Events</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen flex">
  <!-- Sidebar -->
  <aside class="w-64 bg-gray-800 p-6">
    <h2 class="text-lime-400 text-xl font-bold mb-6">LGU Super Admin</h2>
    <nav class="space-y-4">
      <a href="dashboard.html" class="block text-white hover:text-lime-400">Dashboard</a>
      <a href="add-society.html" class="block text-white hover:text-lime-400">Add Society</a>
      <a href="assign-admin.html" class="block text-white hover:text-lime-400">Assign Admin</a>
      <a href="view-events.html" class="block text-lime-400 font-semibold">View Events</a>
    </nav>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-10">
    <h1 class="text-2xl font-bold text-lime-400 mb-6">All Events</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div class="bg-gray-800 p-4 rounded-lg shadow">
        <h2 class="text-lg font-bold text-white">Tech Talk 2025</h2>
        <p class="text-sm text-gray-400">Date: 2025-07-15</p>
        <span class="text-sm text-green-400">Upcoming</span>
      </div>

      <div class="bg-gray-800 p-4 rounded-lg shadow">
        <h2 class="text-lg font-bold text-white">Hackathon</h2>
        <p class="text-sm text-gray-400">Date: 2025-05-10</p>
        <span class="text-sm text-yellow-400">Completed</span>
      </div>
    </div>
  </main>
</body>
</html>
