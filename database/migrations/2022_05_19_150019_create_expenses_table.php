<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('for_whom')->comment('c=client, a=agent, o=office');
            $table->integer('expenses_category_id')->nullable();
            $table->integer('work_id')->nullable();
            $table->integer('agent_id')->nullable();
            $table->integer('passport_id')->nullable();
            $table->string('amount');
            $table->integer('user_id');
            $table->string('voucher_number')->nullable();
            $table->string('file')->nullable();
            $table->longText('note')->nullable();
            $table->string('date')->nullable();
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
        Schema::dropIfExists('expenses');
    }
}
