<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insumos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('provedor_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('grupo_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('producto');
            $table->string('codigo');
            $table->string('marca');
            $table->string('presentacion');
            $table->string('unidad');
            $table->decimal('calorias_porcion', 9, 2);
            $table->decimal('precio_porcion', 9, 2);
            $table->decimal('merma', 9, 2);
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
        Schema::dropIfExists('insumos');
    }
}
