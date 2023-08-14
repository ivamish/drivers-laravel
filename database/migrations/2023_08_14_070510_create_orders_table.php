<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Таблица заказов:
     * Status - статус заказа (в работе, ожидает, завершён)
     * user_id - водитель, который выполняет или выполнил заказ (null, если водитель ещё не назначен)
     * address - адресс доставки (Yandex Maps API предоставляет возможность задать маршрут по адресу, а не по координатам)
     * start - Время начала заказа  }
     *                              } => промежуток, в течении которого необходимо выполнить заказ
     * end - время окончания заказа }
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('status');
            $table->integer('user_id')->nullable();
            $table->string('address');
            $table->timestamp('start');
            $table->timestamp('end');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
