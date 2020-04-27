<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsumoRecetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insumo_receta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('receta_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('insumo_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('cantidad', 9, 2);
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
        Schema::dropIfExists('insumo_receta');
    }
}
