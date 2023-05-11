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
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable()->index();
            $table->string('last_name')->nullable()->index();
            $table->string('username', 191);
            $table->string('email')->unique();
            $table->foreignId('user_id')->constrained();
            $table->date('date_of_birth')->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('gender', 225)->nullable();
            $table->string('address', 191)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};

// Full name
// Email address
// Password
// Phone number
// Date of birth
// Gender
// Height
// Weight
// Medical history (if relevant)
// Insurance information (if relevant)
