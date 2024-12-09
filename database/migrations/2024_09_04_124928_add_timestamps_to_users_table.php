<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
 {
public function up()
    {
        // Schema::table('users', function (Blueprint $table) {
        //     // Change the column to a string with max length 15
        //     $table->string('phonenumber', 15)->change();
        // });
         Schema::table('users', function (Blueprint $table) {
            $table->timestamps(); // Adds both `created_at` and `updated_at` columns
        });
    }

    public function down()
    {
        // Schema::table('users', function (Blueprint $table) {
        //     // Revert back to the original column type, if necessary
        //     $table->integer('phonenumber')->change();
        // });
        Schema::table('users', function (Blueprint $table) {
            $table->dropTimestamps(); // Removes both `created_at` and `updated_at` columns
        });
    }


 };
