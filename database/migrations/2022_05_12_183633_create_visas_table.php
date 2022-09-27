<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visas', function (Blueprint $table) {
            $table->id();
            $table->integer('country_id');
            $table->mediumText('visa_title');
            $table->integer('number_of_visa')->default(0);
            $table->integer('rest_number_of_visa')->default(0);
            $table->double('total_cost')->default(0);
            $table->double('individual_cost')->default(0);
            $table->longText('company_name')->nullable();
            $table->longText('note')->nullable();
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
        Schema::dropIfExists('visas');
    }
}
