<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaimsSlpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claims_slps', function (Blueprint $table) {
            $table->id();
            $table->integer('scholarship_id')->unsigned()->nullable(false);
            $table->foreign('scholarship_id')->references('id')->on('scholarships');
            $table->date('claim_slp_date')->nullable(false);
            $table->integer('amount')->unsigned()->nullable(false);
            $table->unique(['scholarship_id', 'claim_slp_date'], 'unq_claims_slps_scholarship_id_claim_slp_date');
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
        Schema::dropIfExists('claims_slps');
    }
}
