<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranks', function (Blueprint $table) {
            $table->id();
            $table->integer('scholarship_id')->unsigned()->nullable(false);
            $table->foreign('scholarship_id')->references('id')->on('scholarships');
            $table->date('rank_date')->nullable(false);
            $table->integer('rank')->unsigned()->nullable(false);
            $table->unique(['scholarship_id', 'rank_date'], 'unq_rank_scholarship_id_rank_date');
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
        Schema::dropIfExists('ranks');
    }
}
