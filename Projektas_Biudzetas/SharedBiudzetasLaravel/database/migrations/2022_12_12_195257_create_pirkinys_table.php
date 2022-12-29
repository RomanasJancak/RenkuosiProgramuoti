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
        Schema::create('pirkinys', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('price');
            $table->integer('quantity');
            $table->integer('deposit');
            $table->integer('sum');
            $table->unsignedBigInteger('prekepaslauga_id');
            //Foreign keys
            $table->unsignedBigInteger('apsipirkimas_id');
            //References
            $table->foreign('apsipirkimas_id')->references('id')->on('apsipirkimas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pirkinys');
    }
};
