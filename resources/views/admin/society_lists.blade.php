@extends('admin.layout.app')
@section('main_content')

<main class="flex-1 p-6 bg-gray-900 min-h-screen">
  <h1 class="text-3xl font-bold text-lime-400 mb-6">Societies List</h1>

  <!-- Search Bar -->
  <h2 class="text-xl font-bold text-white mb-3">Filters</h2>
    <div class="flex flex-wrap gap-4 mb-4">
        <div class="w-96">
            <input
            type="search" disabled
            placeholder="Search by society"
            class="w-full px-4 py-2 rounded bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-lime-400"
            />
        </div>

        <div class="w-96">
            <input
            type="search" disabled
            placeholder="Search by head"
            class="w-full px-4 py-2 rounded bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-lime-400"
            />
        </div>
    </div>


  <!-- Table -->
  <div class="overflow-x-auto rounded-lg border border-gray-700">
    <table class="w-full text-left text-white">
      <thead class="bg-gray-800">
        <tr>
          <th class="px-6 py-3 uppercase tracking-wider font-semibold text-lime-400">Id</th>
          <th class="px-6 py-3 uppercase tracking-wider font-semibold text-lime-400">Name</th>
          <th class="px-6 py-3 uppercase tracking-wider font-semibold text-lime-400">Description</th>
          <th class="px-6 py-3 uppercase tracking-wider font-semibold text-lime-400">Head</th>
          <th class="px-6 py-3 uppercase tracking-wider font-semibold text-lime-400">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-700">
        <!-- Example row -->
        @foreach ($societies as $society)
        <tr>
          <td class="px-6 py-4">{{ $society->id }}</td>
          <td class="px-6 py-4">{{ $society->name }}</td>
          <td class="px-6 py-4">{{ $society->description }}</td>
          <td class="px-6 py-4">{{ $society->head->name }}</td>
          <td class="px-6 py-4 space-x-2">
          <!-- Edit Button -->
            <a href="#" 
              class="text-lime-400 hover:underline open-modal"
              data-id="{{ $society->id }}"
              data-name="{{ $society->name }}"
              data-admin-name="{{ $society->head->name }}"
              data-admin-email="{{ $society->head->email }}">
              Edit
            </a>

            <!-- Delete Form Button -->
            <form action="{{ route('super.admin.delete_society', $society->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        onclick="return confirm('Are you sure you want to delete this society?')"
                        class="text-red-500 hover:underline">
                    Delete
                </button>
            </form>
          </td>

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</main>


<!-- Edit Society Modal -->
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
<div class="bg-gray-800 p-6 rounded-lg w-full max-w-2xl">
    <h2 class="text-xl font-bold text-lime-400 mb-4">Edit Society</h2>
    <form id="editForm" method="POST" action="">
      <input type="hidden" name="id" id="edit-id">
      <div class="mb-4">
        <label for="societyName" class="block text-sm font-medium mb-2">Society Name</label>
        <input
          type="text"
          id="societyName"
          name="society_name"
          value="{{ $society->name }}"
          class="w-full px-4 py-2 bg-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-lime-400 transition duration-200"
        />
      </div>

        <!-- Admin Name -->
      <div class="mb-4">
        <label for="adminName" class="block text-sm font-medium mb-2">Admin Name</label>
        <input
          type="text"
          id="adminName"
          name="admin_name"
          value="{{ $society->head->name }}"
          class="w-full px-4 py-2 bg-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-lime-400 transition duration-200"
        />
      </div>

        <!-- Admin Email -->
      <div class="mb-4">
        <label for="adminEmail" class="block text-sm font-medium mb-2">Admin Email</label>
        <input
          type="email"
          id="adminEmail"
          name="admin_email"
          value="{{ $society->head->email }}"
          class="w-full px-4 py-2 bg-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-lime-400 transition duration-200"
        />
      </div>

      <div class="flex justify-end space-x-3">

          <div class="w-full space-y-2 mb-4">
              <!-- Error Alert -->
              <div id="error" class="hidden p-4 text-sm text-red-800 rounded-lg bg-red-200" role="alert">
                  <ul id="error-list" class="list-none list-inside"></ul>
              </div>

              <!-- Success Alert -->
              <div id="success" class="hidden p-4 text-sm text-green-800 rounded-lg bg-green-200" role="alert">
                  <span class="font-medium">Society updated successfully.</span>
              </div>
          </div>
          <button 
              type="button" id="closeModal" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-500">Cancel
          </button>
          <button 
              type="submit" class="px-4 py-2 bg-lime-500 text-black font-semibold rounded hover:bg-lime-400">Save
          </button>
      </div>
    </form>
  </div>
</div>

@endsection
@section('customJS')
<script>
$(document).ready(function () {
  $('.open-modal').on('click', function (e) {
    e.preventDefault();

    // Get values from data attributes
    const id = $(this).data('id');
    const name = $(this).data('name');
    const adminName = $(this).data('admin-name');
    const adminEmail = $(this).data('admin-email');

    // Set values in modal form inputs
    $('#edit-id').val(id);
    $('#societyName').val(name);
    $('#adminName').val(adminName);
    $('#adminEmail').val(adminEmail);

    // Show the modal
    $('#editModal').removeClass('hidden');
  });

  // Close modal logic
  $('#closeModal').on('click', function () {
    $('#editModal').addClass('hidden');
  });
});


</script>


<script>
  $('#editForm').submit(function(e){
    e.preventDefault();
    $('#error-list').empty();

    let id = $('#edit-id').val(); // Get society ID
    let url = '{{ route("super.admin.update_society", ":id") }}'.replace(':id', id); // Assume PUT

    $.ajax({
        url: url,
        type: 'PUT',
        data: $('#editForm').serialize(),
        success: function(response){
            $('#error').addClass('hidden');
            $('#success').addClass('hidden');

            if (response.errors) {
                $.each(response.errors, function(field, message){
                    $('#error-list').append('<li>' + message + '</li>');
                });
                $('#error').removeClass('hidden');
            } else if (response.status) {
                $('#success').removeClass('hidden');
                setTimeout(() => location.reload(), 1500);
            }
        },
        error: function(xhr) {
            $('#error-list').append('<li>Something went wrong.</li>');
            $('#error').removeClass('hidden');
        }
    });
});




</script>

@endsection
