<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConektaCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conekta_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('token');
            $table->string('name');
            $table->string('type');
            $table->string('last4');
            $table->string('brand');
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
        Schema::dropIfExists('conekta_cards');
    }
}
