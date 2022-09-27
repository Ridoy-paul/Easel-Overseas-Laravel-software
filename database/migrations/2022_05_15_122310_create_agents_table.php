<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->mediumText('name')->nullable();
            $table->string('phone')->nullable();
            $table->mediumText('address')->nullable();
            $table->mediumText('father_name')->nullable();
            $table->mediumText('mother_name')->nullable();
            $table->mediumText('nid_number')->nullable();
            $table->double('balance')->nullable();
            $table->integer('is_active')->default(1);
            $table->integer('user_id');
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
        Schema::dropIfExists('agents');
    }
}
