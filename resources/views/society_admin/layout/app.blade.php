<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Society Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen flex">

  <!-- Sidebar -->
<aside class="fixed top-0 left-0 h-screen w-64 bg-gray-800 text-white flex flex-col justify-between p-4 shadow-lg z-50">

    <!-- Top: Navigation -->
    <div>
        <h2 class="text-2xl font-bold text-lime-400 mb-6">Super Admin</h2>
        <nav class="flex flex-col space-y-2">

            <a href="{{ route('admin.viewEvent') }}"
                class="{{ request()->is('admin.viewEvent') ? 'bg-gray-700 text-lime-400 font-semibold' : 'hover:bg-gray-700' }} px-3 py-2 rounded transition">
                Create Event
            </a>

            <a href="{{ route('admin.viewHeadProfile') }}"
                class="{{ request()->is('admin.viewHeadProfile') ? 'bg-gray-700 text-lime-400 font-semibold' : 'hover:bg-gray-700' }} px-3 py-2 rounded transition">
                Head Profile
            </a>

            <a href="{{ route('admin.viewSocietyProfile') }}"
                class="{{ request()->is('admin.viewSocietyProfile') ? 'bg-gray-700 text-lime-400 font-semibold' : 'hover:bg-gray-700' }} px-3 py-2 rounded transition">
                Society Profile
            </a>

            <a href="{{ route('admin.viewHeadProfile') }}"
                class="{{ request()->is('admin.viewHeadProfile') ? 'bg-gray-700 text-lime-400 font-semibold' : 'hover:bg-gray-700' }} px-3 py-2 rounded transition">
                Members Profile
            </a>
        </nav>
    </div>

    <!-- Bottom: Profile & Logout -->
    <div class="space-y-4">
        <div class="flex items-center space-x-3 bg-gray-700 rounded-lg p-3">
            <img src="" alt="Society"
                class="w-12 h-12 rounded-full object-cover border-2 border-lime-400">
            <div>
                <p class="text-sm font-semibold text-white"></p>
                <p class="text-xs text-gray-300">Society</p>
            </div>
        </div>

        <form action="{{ route('account.logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white w-full py-2 rounded">
                Logout
            </button>
        </form>
    </div>
</aside>



    <div class="flex-1 ml-64">
        @yield('main_content')
    </div>

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
