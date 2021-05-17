<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuiaProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guia_producto', function (Blueprint $table) {
            $table->unsignedBigInteger('idguias');
            $table->foreign('idguias')->references('idguias')->on('guias');
            $table->unsignedBigInteger('idproductos');
            $table->foreign('idproductos')->references('idproductos')->on('productos');
            $table->tinyInteger('cantidad');
            $table->decimal('precio', 10, 2);
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
        Schema::dropIfExists('guia_producto');
    }
}
