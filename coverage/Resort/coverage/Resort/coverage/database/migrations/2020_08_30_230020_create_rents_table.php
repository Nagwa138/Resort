<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('jobber_id');
            $table->unsignedBigInteger('client_id');
            $table->integer('members');
            $table->integer('payment');
            $table->unsignedBigInteger('post_id');
            $table->date('start_at');
            $table->date('end_at');
            $table->foreign('jobber_id')->references('id')->on('jobbers');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('post_id')->references('id')->on('posts');
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
        Schema::dropIfExists('rents');
    }
}
