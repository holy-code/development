<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConektaOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conekta_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('token');
            $table->string('amount');
            $table->string('payment_status');
            $table->string('parent_id');
            $table->string('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conekta_orders');
    }
}
