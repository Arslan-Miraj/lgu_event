<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Super Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- Header -->
  <header class="bg-gray-800 text-white px-6 py-4 shadow-md flex justify-between items-center">
    <h1 class="text-2xl font-bold text-lime-400">LGU Event Admin</h1>
    <div>
      <span class="mr-4">Welcome, Super Admin</span>
      <a href="/logout" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Logout</a>
    </div>
  </header>

  <div class="flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-900 text-white min-h-screen px-4 py-6 space-y-4">
      <nav class="space-y-2">
        <a href="dashboard.html" class="block px-4 py-2 rounded hover:bg-gray-700 bg-gray-800 font-semibold">Dashboard</a>
        <a href="add-society.html" class="block px-4 py-2 rounded hover:bg-gray-700">Add Society</a>
        <a href="assign-admin.html" class="block px-4 py-2 rounded hover:bg-gray-700">Assign Admin</a>
        <a href="view-events.html" class="block px-4 py-2 rounded hover:bg-gray-700">View Events</a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
      <h2 class="text-2xl font-semibold mb-4">Dashboard Overview</h2>

      <!-- Charts -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-lg shadow">
          <h3 class="text-lg font-medium mb-2">Event Types</h3>
          <canvas id="eventTypeChart"></canvas>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
          <h3 class="text-lg font-medium mb-2">Monthly Registrations</h3>
          <canvas id="registrationChart"></canvas>
        </div>
      </div>
    </main>
  </div>

  <!-- Chart Scripts -->
  <script>
    const eventTypeChart = new Chart(document.getElementById('eventTypeChart'), {
      type: 'doughnut',
      data: {
        labels: ['Seminars', 'Workshops', 'Competitions'],
        datasets: [{
          label: 'Event Types',
          data: [12, 9, 5],
          backgroundColor: ['#84cc16', '#4ade80', '#60a5fa'],
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom'
          }
        }
      }
    });

    const registrationChart = new Chart(document.getElementById('registrationChart'), {
      type: 'bar',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
        datasets: [{
          label: 'Registrations',
          data: [30, 45, 28, 60, 40],
          backgroundColor: '#84cc16'
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
</body>
</html>
