<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('table_id')->references('id')->on('tables')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('restaurant_id')->references('id')->on('restaurants')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->enum('status', ['PENDIENTE', 'ENTREGADA', 'ANULADA', 'PREPARADA', 'ENVIADA', 'CERRADA'])->default('PENDIENTE');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('total')->default(0);
            $table->boolean('charged')->default(false);
            $table->foreignId('payment_method_id')->nullable()->references('id')->on('payment_methods')->nullOnDelete()->onUpdate('CASCADE');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
