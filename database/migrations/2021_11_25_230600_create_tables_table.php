<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesTable extends Migration
{
    public function up()
    {
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurant_id')->references('id')->on('restaurants')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('name');
            $table->enum('status', ['LIBRE', 'OCUPADA'])->default('LIBRE');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tables');
    }
}
