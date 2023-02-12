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
        Schema::create('pakvietimas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('model_type_what');
            $table->unsignedBigInteger('model_id_what');
            $table->string('model_type_with');
            $table->unsignedBigInteger('model_id_with');
            $table->string('model_type_who');
            $table->unsignedBigInteger('model_id_who');
            $table->unsignedBigInteger('role_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pakvietimas');
    }
};
