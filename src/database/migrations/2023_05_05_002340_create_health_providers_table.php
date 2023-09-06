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
        Schema::create('health_providers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable()->index();
            $table->string('last_name')->nullable()->index();
            $table->string('username', 191);
            $table->string('email')->unique();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->date('date_of_birth')->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('gender', 225)->nullable();
            $table->string('specialization')->nullable();
            $table->string('address', 191)->nullable();
            $table->decimal('consultation_fee', 18, 6)->default(0);
            $table->json('qualifications')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_providers');
    }
};


// Full name
// Email address
// Password
// Phone number
//Consultation Fee
// Professional qualifications (e.g., degree, license)
// Area of expertise (e.g., cardiology, pediatrics)
// Practice information (e.g., name, address, website)
// Specializations or certifications (e.g., ACLS, BLS)
