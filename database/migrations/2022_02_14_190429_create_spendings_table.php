<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpendingsTable extends Migration
{
    public function up()
    {
        Schema::create('spendings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('amount')->default(0);
            $table->foreignId('restaurant_id')->references('id')->on('restaurants')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('spendings');
    }
}
