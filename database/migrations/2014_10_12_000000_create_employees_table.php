<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->string('user_name');
            $table->string('name_prefix')->nullable();
            $table->string('first_name');
            $table->string('middle_initial')->nullable();
            $table->string('last_name');
            $table->string('gender', 1);
            $table->string('email')->unique();
            $table->date('date_of_birth');
            $table->time('time_of_birth')->nullable();
            $table->integer('age_in_years');
            $table->date('date_of_joining');
            $table->float('age_in_company');
            $table->string('phone_no');
            $table->string('place_name')->nullable();
            $table->string('county')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->string('region')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
