<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slps', function (Blueprint $table) {
            $table->id();
            $table->integer('scholarship_id')->unsigned()->nullable(false);
            $table->foreign('scholarship_id')->references('id')->on('scholarships');
            $table->date('slp_date')->nullable(false);
            $table->integer('amount')->unsigned()->nullable(false);
            $table->unique(['scholarship_id', 'slp_date'], 'unq_slps_scholarship_id_slp_date');
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
        Schema::dropIfExists('slps');
    }
}
