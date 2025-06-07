<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Super Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen flex">

  <!-- Sidebar -->
  <aside class="w-64 bg-gray-800 text-white flex flex-col p-4 space-y-4">
    <h2 class="text-2xl font-bold text-lime-400 mb-6">Super Admin</h2>
    <nav class="flex flex-col space-y-2">
        <a href="{{ route('super.admin.dashboard') }}"
            class="{{ request()->routeIs('super.admin.dashboard') ? 'bg-gray-700 text-lime-400 font-semibold' : 'hover:bg-gray-700' }} px-3 py-2 rounded transition">
            Dashboard
        </a>
        <a href="{{ route('super.admin.addSociety') }}"
            class="{{ request()->routeIs('super.admin.addSociety') ? 'bg-gray-700 text-lime-400 font-semibold' : 'hover:bg-gray-700' }} px-3 py-2 rounded transition">
            Add Society
        </a>

    <a href="/assign_admin"
        class="{{ request()->is('assign_admin') ? 'bg-gray-700 text-lime-400 font-semibold' : 'hover:bg-gray-700' }} px-3 py-2 rounded transition">
        Assign Admin
    </a>

    <a href="/view_events"
        class="{{ request()->is('view_events') ? 'bg-gray-700 text-lime-400 font-semibold' : 'hover:bg-gray-700' }} px-3 py-2 rounded transition">
        View Events
    </a>
    </nav>
    <form action="#" method="POST" class="mt-auto">
      <button type="submit" class="bg-red-600 hover:bg-red-700 text-white w-full py-2 rounded">Logout</button>
    </form>
  </aside>


    <!-- Main Content -->
    @yield('main_content')

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('js/customJS.js') }}"></script>
  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  </script>
  @yield('customJS')
  </div>
</body>
</html>
