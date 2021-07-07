<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('amout', 15, 2)->nullable();
            $table->date('payment_date')->nullable();
            $table->longText('note')->nullable();
            $table->string('payment_status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
