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
            //
            $table->string('disease_history');
            $table->string('current_symptoms');
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
            $table->id();
            $table->integer('id_card');
            $table->string('name');
            $table->string('password');
            $table->string('address');
            $table->date('born_date');
            $table->string('gender');
            $table->string('token');
            $table->string('disease_history');
            $table->string('current_symptoms');
            $table->rememberToken();
            $table->timestamps();
        });
    }
};
