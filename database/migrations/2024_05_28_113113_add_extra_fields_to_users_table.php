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
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_title');
            $table->enum('gender', ['male', 'female', 'neutral'])->default('male');
            $table->string('education')->nullable();
            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('country')->nullable();
            $table->string('user_phone')->nullable();
            $table->string('user_phone_for')->nullable();
            $table->string('user_alt_phone')->nullable();
            $table->string('user_alt_phone_for')->nullable();
            $table->string('user_alt_email')->nullable();
            $table->string('user_personal_website')->nullable();
            $table->string('user_organisation')->nullable();
            $table->string('user_job_title')->nullable();
            $table->string('user_department')->nullable();
            $table->string('user_company_website')->nullable();
            $table->string('user_studentof')->nullable();
            $table->string('user_studentof_type')->nullable();
            $table->string('user_alumniof')->nullable();
            $table->string('user_alumniof_type')->nullable();
            $table->string('user_degree')->nullable();
            $table->string('user_major')->nullable();
            $table->string('user_year_pass')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
