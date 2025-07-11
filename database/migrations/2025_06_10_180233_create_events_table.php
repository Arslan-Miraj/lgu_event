<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('organized_by');
            $table->string('location');
            $table->date('event_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('duration')->nullable(); 
            $table->string('poster')->nullable();   
            $table->unsignedBigInteger('created_by'); 
            $table->string('status')->default('upcoming');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
