<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocietiesTable extends Migration
{
    public function up()
    {
        Schema::create('societies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('logo')->nullable(); // e.g., 'uploads/logos/logo.png'
            $table->json('members')->nullable(); // stores array of members
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('societies');
    }
}
