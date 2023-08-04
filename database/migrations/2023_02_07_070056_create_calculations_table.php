<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalculationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculations', function (Blueprint $table) {
            $table->id();
            $table->integer('user_card_id')->nullable();
            $table->integer('water_jar')->nullable();
            $table->integer('empty_jar')->nullable();
            $table->integer('full_jar_left')->nullable();
            $table->integer('payment_money')->nullable();
            $table->integer('total_due')->nullable();
            $table->string('customer_signature');
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
        Schema::dropIfExists('calculations');
    }
}
