<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->integer('passport_id');
            $table->longText('post')->nullable();
            $table->integer('country_id');
            $table->integer('visa_id');
            $table->string('code')->nullable();
            $table->integer('agent_id')->nullable();
            $table->string('package_price')->default(0);
            $table->string('paid')->default(0);
            $table->string('due')->default(0);
            $table->string('agent_commission')->default(0);
            $table->string('agent_commission_paid')->default(0);
            $table->string('agent_commission_due')->default(0);
            $table->longText('note')->nullable();
            $table->integer('is_active')->default(1);
            $table->string('status')->nullable();
            $table->integer('is_rejected')->default(0);
            $table->string('date');
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
        Schema::dropIfExists('works');
    }
}
