<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offerts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('em_id')->nullable();
            $table->string('em_name')->nullable();
            $table->string('department')->nullable();
            $table->string('date')->nullable();
            $table->string('sent_offert')->nullable();
            $table->string('waiting_for_clients_feedback')->nullable();
            $table->string('offert_value')->nullable();
            $table->string('to_close_deals')->nullable();
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
        Schema::dropIfExists('offerts');
    }
}
