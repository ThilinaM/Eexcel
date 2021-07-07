<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('bank_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('account_name');
            $table->string('account_no');
            $table->string('bank_name')->nullable();
            $table->string('branch')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
