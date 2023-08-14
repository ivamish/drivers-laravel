<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Миграция, которая создаёт таблицу состояний транспортных средств (готов, в ремонте, на ТО)
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars_condition', function (Blueprint $table) {
            $table->id();
            $table->string('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars_condition');
    }
};
