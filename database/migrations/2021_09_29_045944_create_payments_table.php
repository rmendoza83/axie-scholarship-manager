<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('scholarship_id')->unsigned()->nullable(false);
            $table->foreign('scholarship_id')->references('id')->on('scholarships');
            $table->date('payment_date')->nullable(false);
            $table->integer('slp_amount')->unsigned()->nullable(false);
            $table->unique(['scholarship_id', 'payment_date'], 'unq_payments_scholarship_id_payment_date');
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
        Schema::dropIfExists('payments');
    }
}
