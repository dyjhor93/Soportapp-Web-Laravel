<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_services', function (Blueprint $table) {
            $table->id();
            $table->string('os')->unique();
            $table->string('client_nic');
            $table->string('user_id');
            $table->timestamps();

            //$table->primary('os');
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //$table->foreign('client_nic')->references('nic')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_services');
    }
}
