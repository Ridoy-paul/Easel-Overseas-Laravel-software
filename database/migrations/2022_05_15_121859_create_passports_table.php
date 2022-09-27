<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passports', function (Blueprint $table) {
            $table->id();
            $table->mediumText('name')->nullable();
            $table->string('phone')->nullable();
            $table->mediumText('address')->nullable();
            $table->mediumText('father_name')->nullable();
            $table->mediumText('mother_name')->nullable();
            $table->mediumText('passport_number')->nullable();
            $table->mediumText('passport_scan_copy')->nullable();
            $table->string('nid_number')->nullable();
            $table->longText('note')->nullable();
            $table->longText('reference')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('passports');
    }
}
