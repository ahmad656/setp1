<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name',);
            $table->dropColumn('email');
            $table->dropColumn('password');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('image')->nullable();
            $table->string('mobile');
            $table->enum('gender' , ['Male', 'Female']);
            $table->enum('status' , ['Active', 'Inactive']);
            $table->date('date_of_birth');
            $table->foreignId('country_id');
            $table->foreign('country_id')->on('countries')->references('id');
            $table->morphs('actor');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
