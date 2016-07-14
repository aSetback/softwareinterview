<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('address1', 255);
            $table->string('address2', 255);
            $table->string('city', 100);
            $table->string('state', 50);
            $table->string('country', 100);
            $table->string('zip', 10); // String, since there may be dashes (5 digits, or 9 digits w/ a dash)
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
        Schema::drop('registrations');
    }
}
