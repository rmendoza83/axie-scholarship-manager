<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAxiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('axies', function (Blueprint $table) {
            $table->id();
            $table->integer('scholarship_id')->unsigned()->nullable(false);
            $table->foreign('scholarship_id')->references('id')->on('scholarships');
            $table->string('name', 80)->nullable(false);
            $table->integer('axie_id')->nullable();
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
        Schema::dropIfExists('axies');
    }
}
