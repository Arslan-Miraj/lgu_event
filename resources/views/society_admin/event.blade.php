@extends('society_admin.layout.app')

@section('main_content')

<section class="min-h-screen bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 py-12 px-4">
  <div class="max-w-6xl mx-auto bg-gray-800 p-10 rounded-2xl shadow-xl">
    <h2 class="text-3xl font-bold text-lime-400 mb-10 text-center">📅 Create New Event</h2>

    <form action="" method="POST" id="eventForm" enctype="multipart/form-data" class="grid md:grid-cols-2 gap-10">
      <div class="space-y-5">
        <!-- Title -->
        <div>
          <label class="block text-sm font-semibold text-white mb-1">Event Title</label>
          <input type="text" name="title" placeholder="Tech Meetup 2025"
                 class="w-full px-4 py-2 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-lime-400">
        </div>

        <!-- Organized By -->
        <div>
          <label class="block text-sm font-semibold text-white mb-1">Organized By</label>
          <input type="text" name="organized_by" value="{{ $society->name }}" readonly
                 class="w-full px-4 py-2 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-lime-400">
        </div>

        <!-- Location -->
        <div>
          <label class="block text-sm font-semibold text-white mb-1">Location</label>
          <input type="text" name="location" placeholder="Auditorium, LGU"
                 class="w-full px-4 py-2 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-lime-400">
        </div>

        <!-- Date, Start & End Time -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
          <div>
            <label class="block text-sm font-semibold text-white mb-1">Date</label>
            <input type="date" name="event_date"
                   class="w-full px-4 py-2 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-lime-400">
          </div>
          <div>
            <label class="block text-sm font-semibold text-white mb-1">Start Time</label>
            <input type="time" name="start_time"
                   class="w-full px-4 py-2 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-lime-400">
          </div>
          <div>
            <label class="block text-sm font-semibold text-white mb-1">End Time</label>
            <input type="time" name="end_time"
                   class="w-full px-4 py-2 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-lime-400">
          </div>
        </div>

        <!-- Description -->
        <div>
          <label class="block text-sm font-semibold text-white mb-1">Description</label>
          <textarea name="description" rows="4" placeholder="Brief details about the event..."
                    class="w-full px-4 py-2 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-lime-400"></textarea>
        </div>
      </div>

      <!-- Right Side Poster Upload -->
      <div class="flex flex-col justify-between">
        <div>
          <label class="block text-sm font-semibold text-white mb-2">Event Poster</label>
          <div class="bg-gray-700 border-2 border-dashed border-lime-400 rounded-lg p-6 text-center text-gray-300">
            <svg xmlns="" class="w-12 h-12 mx-auto mb-2 text-lime-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7 16V4m0 0L3.5 7.5M7 4l3.5 3.5M17 8v12m0 0l-3.5-3.5M17 20l3.5-3.5" />
            </svg>
            <p class="mb-2">Drag & drop your event poster or click below</p>
            <input type="file" name="poster"
                   class="w-full mt-2 text-sm bg-gray-800 text-white file:bg-lime-400 file:text-black file:px-4 file:py-2 file:rounded-full file:border-none">
          </div>
        </div>

        <div class="flex-1 max-w-xl min-w-[300px] mt-2">
            <div id="error" class="hidden p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-600 dark:bg-red-400 dark:text-red-800" role="alert">
              <ul id="error-list" class="list-none list-inside space-y-1"></ul>
            </div>
            <div id="success" class="hidden p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-600 dark:bg-green-400 dark:text-green-800" role="alert">
              <span class="font-medium">Event added successfully.</span>
            </div>
          </div>
        <!-- Submit Button -->
        <div class="mt-10 text-center">
          <button type="submit"
            class="bg-lime-400 hover:bg-lime-300 text-black px-6 py-3 rounded-full font-semibold transition w-full">
            Create Event
          </button>
        </div>
      </div>
    </form>
  </div>
</section>

@endsection

@section('customJS')

<script>
    $(document).ready(function(){

        $('#eventForm').submit(function(e){
            e.preventDefault();
            // alert('clicked');
            $('#error-list').empty();
            let form_data = new FormData(this);
            $.ajax({
                url: '{{ route("admin.createEvent") }}',
                type: 'post',
                data: form_data,
                processData: false,
                contentType: false,
                success: function(response){
                    $('#error').addClass('hidden');
                    $('#success').addClass('hidden');

                    let errors = response.errors;
                    if (errors && Object.keys(errors).length > 0){
                        $.each(errors, function(field, message) {
                        $('#error-list').append('<li data-field="' + field + '">' + message + '</li>');
                        });
                        $('#error').removeClass('hidden');
                    }

                    else if (response.status == true){
                        $('#success').removeClass('hidden');
                        setTimeout(() => {
                        $('#success').addClass('hidden');
                        window.location.href = '{{ route("admin.dashboard") }}';
                        $('#eventForm')[0].reset();
                        }, 2000);
                        
                    }
                }
            });
        });
    });
</script>

@endsection