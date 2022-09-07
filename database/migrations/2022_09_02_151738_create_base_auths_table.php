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
        Schema::create('base_auths', function (Blueprint $table) {
            $table->id();
            $table->morphs('authable');
            $table->string('email');
            $table->string('password');
            $table->timestamps();

            $table->unique(['email', 'authable_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('base_auths');
    }
};
