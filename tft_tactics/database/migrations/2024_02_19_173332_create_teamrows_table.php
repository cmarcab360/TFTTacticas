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
        Schema::create('teamrows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('character_id');
            $table->foreignId('team_id');
            $table->string('position');
            $table->string('item1');
            $table->string('item2');
            $table->string('item3');
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
        Schema::dropIfExists('teamrows');
    }
};
