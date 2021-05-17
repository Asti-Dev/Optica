<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarcaProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marca_proveedor', function (Blueprint $table) {
            $table->unsignedBigInteger('idmarcas');
            $table->foreign('idmarcas')->references('idmarcas')->on('marcas')->onUpdate('cascade');
            $table->unsignedBigInteger('idproveedores');
            $table->foreign('idproveedores')->references('idproveedores')->on('proveedores')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('marca_proveedor');
    }
}
