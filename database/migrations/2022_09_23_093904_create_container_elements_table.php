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
        Schema::create('container_elements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('container_id');
            $table->morphs('element');
            $table->unsignedSmallInteger('position');
            $table->timestamps();

            $table->unique(['element_type', 'element_id']);
            $table->unique(['container_id', 'position']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('container_elements');
    }
};
