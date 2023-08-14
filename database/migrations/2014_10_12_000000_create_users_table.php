<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Миграция, которая создаёт таблицу водителей:
     * name - имя
     * last_name -  фамилия
     * middle_name -  отчество
     * email - почта
     * phone - номер телефона
     * driver_type_id - Водитель ИМ или ЭТ (берётся из таблицы drivers_type)
     * district_id - район
     * status_id - статус работы водителя (берётся из таблицы users_status)
     * password - пароль
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('middle_name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->integer('driver_type_id');
            $table->string('district_id');
            $table->integer('status_id');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
