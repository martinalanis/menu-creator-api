<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuPlaneacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_planeacion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('planeacion_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('menu_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->integer('dia');
            $table->integer('orden');
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
        Schema::dropIfExists('menu_planeacion');
    }
}
