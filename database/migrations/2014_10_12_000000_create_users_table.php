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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('phonenumber');
            $table->string('password');
            $table->timestamps(); // This will add `created_at` and `updated_at` columns
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }

    /**
     * Reverse the migrations.
     */
   
};
