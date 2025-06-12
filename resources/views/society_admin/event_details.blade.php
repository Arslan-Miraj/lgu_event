@extends('society_admin.layout.app')

@section('main_content')

<section class="min-h-screen bg-gray-900 text-white py-16 px-6">
  <div class="max-w-5xl mx-auto bg-gray-800 rounded-2xl shadow-xl p-8 md:p-12">
    <div class="grid md:grid-cols-2 gap-8">
      
      <!-- Poster -->
      <div>
        <img src="{{ asset('assets/imgs/w12.jpg') }}" alt=""
             class="rounded-lg shadow-md w-full object-cover h-96">
      </div>

      <!-- Details -->
      <div class="space-y-4">
        <h2 class="text-4xl font-bold text-lime-400">Title</h2>
        <p class="text-gray-300">Description</p>

        <div class="space-y-2 pt-4 text-sm text-gray-400">
          <p><strong class="text-white">Organized by:</strong></p>
          <p><strong class="text-white">Location:</strong></p>
          <p><strong class="text-white">Date:</strong> </p>
          <p><strong class="text-white">Time:</strong> </p>
          <p><strong class="text-white">Duration:</strong></p>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection