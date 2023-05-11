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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('capital', 191)->nullable();
            $table->string('citizenship', 191)->nullable();
            $table->string('country_code', 191)->nullable();
            $table->string('currency', 191)->nullable();
            $table->string('currency_code', 191)->nullable();
            $table->string('currency_symbol', 191)->nullable();
            $table->string('full_name', 191)->nullable();
            $table->string('iso_3166_2', 191)->nullable();
            $table->string('iso_3166_3', 191)->nullable();
            $table->string('name', 191)->nullable();
            $table->string('region_code', 191)->nullable();
            $table->string('sub_region_code', 191)->nullable();
            $table->string('eea', 191)->nullable();
            $table->string('calling_code', 191)->nullable();
            $table->string('flag', 191)->nullable();
            $table->string('code', 191)->nullable();
            $table->string('title_ar', 191)->nullable();
            $table->string('title_en', 191)->nullable();
            $table->string('tel', 191)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
