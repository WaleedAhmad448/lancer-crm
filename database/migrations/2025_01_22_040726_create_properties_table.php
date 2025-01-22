<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->string('bedrooms');
            $table->string('bathrooms');
            $table->string('area');
            $table->date('date');
            $table->enum('type', ['Building', 'Apartment', 'House', 'Land', 'Other']);
            $table->string('address');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('status', ['sale', 'rent', 'sold']);
            $table->string('country');
  
            $table->string('city');
            $table->json('images');

            $table->foreignId('agents_id')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
