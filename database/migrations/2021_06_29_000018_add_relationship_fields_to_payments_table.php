<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id', 'course_fk_4278699')->references('id')->on('courses');
            $table->unsignedBigInteger('payment_methord_id');
            $table->foreign('payment_methord_id', 'payment_methord_fk_4278700')->references('id')->on('payment_methods');
            $table->unsignedBigInteger('bank_details_id')->nullable();
            $table->foreign('bank_details_id', 'bank_details_fk_4278701')->references('id')->on('bank_details');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_4278710')->references('id')->on('users');
        });
    }
}
