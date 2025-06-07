<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Society - LGU Events</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen flex">
  <!-- Sidebar -->
  <aside class="w-64 bg-gray-800 p-6">
    <h2 class="text-lime-400 text-xl font-bold mb-6">LGU Super Admin</h2>
    <nav class="space-y-4">
      <a href="dashboard.html" class="block text-white hover:text-lime-400">Dashboard</a>
      <a href="add-society.html" class="block text-lime-400 font-semibold">Add Society</a>
      <a href="assign-admin.html" class="block text-white hover:text-lime-400">Assign Admin</a>
      <a href="view-events.html" class="block text-white hover:text-lime-400">View Events</a>
    </nav>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-10">
    <h1 class="text-2xl font-bold text-lime-400 mb-6">Add New Society</h1>
    <form class="space-y-6 max-w-lg">
      <div>
        <label for="societyName" class="block text-sm mb-1">Society Name</label>
        <input type="text" id="societyName" class="w-full px-4 py-2 bg-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-lime-400">
      </div>
      <div>
        <label for="description" class="block text-sm mb-1">Description</label>
        <textarea id="description" rows="4" class="w-full px-4 py-2 bg-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-lime-400"></textarea>
      </div>
      <button type="submit" class="bg-lime-400 text-black px-6 py-2 rounded font-semibold">Add Society</button>
    </form>
  </main>
</body>
</html>
