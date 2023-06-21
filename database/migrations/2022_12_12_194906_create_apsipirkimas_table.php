<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apsipirkimas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('suma');
            $table->dateTime('shop_time');
            //Foreign keys
            $table->unsignedBigInteger('budget_id');
            $table->unsignedBigInteger('vendor_id');
            //References
            $table->foreign('budget_id')->references('id')->on('budgets');
            $table->foreign('vendor_id')->references('id')->on('vendors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apsipirkimas');
    }
};
