@extends('society_admin.layout.app')

@section('main_content')
<div class="w-full px-4 py-8 bg-gray-900 min-h-screen space-y-12">

  {{-- Form 1: Basic Info --}}
  <div class="max-w-4xl mx-auto bg-gray-800 rounded-xl shadow-lg p-6">
    <h2 class="text-2xl font-bold text-lime-400 mb-6">Account Information</h2>

    <form id="updateBasicInfo" class="space-y-6">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <label class="block text-sm font-medium text-gray-300 mb-1">Head Name</label>
          <input type="text" name="name" value="{{ $society->name }}" readonly
            class="w-full bg-gray-700 text-white rounded-md p-3" />
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-300 mb-1">Email</label>
          <input type="email" name="email" value="{{ $society->email }}" readonly
            class="w-full bg-gray-700 text-white rounded-md p-3" />
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <label class="block text-sm font-medium text-gray-300 mb-1">Contact No</label>
          <input type="text" name="contact_no"
            class="w-full bg-gray-700 text-white rounded-md p-3" />
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-300 mb-1">Password</label>
          <input type="password" name="password" placeholder="Default 123456"
            class="w-full bg-gray-700 text-white rounded-md p-3" />
        </div>
      </div>

      <div class="text-right">
        <button type="submit"
          class="bg-lime-500 hover:bg-lime-600 text-black font-semibold px-6 py-2 rounded-md transition">
          Save Account Info
        </button>
      </div>
    </form>
  </div>

</div>
@endsection

@section('customJS')
{{-- <script>
  $(document).ready(function () {
    $('#updateHeadProfile').submit(function (e) {
      e.preventDefault();
      let formData = new FormData(this);

      $.ajax({
        url: '{{ route("admin.updateHeadProfile") }}',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function (response) {
          $('#error-list').empty();
          $('#error').addClass('hidden');
          $('#success').addClass('hidden');

          if (response.errors) {
            $.each(response.errors, function (field, message) {
              $('#error-list').append('<li>' + message + '</li>');
            });
            $('#error').removeClass('hidden');
          } else if (response.status) {
            $('#success').removeClass('hidden');
            setTimeout(() => $('#success').addClass('hidden'), 3000);
            $('#updateHeadProfile')[0].reset();
          }
        }
      });
    });

    $('#updateBasicInfo').submit(function (e) {
      e.preventDefault();
      let formData = $(this).serialize();

      $.ajax({
        url: '{{ route("admin.updateBasicInfo") }}', // make sure this route exists
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function (response) {
          alert(response.message || 'Updated successfully.');
        }
      });
    });
  });
</script> --}}
@endsection
