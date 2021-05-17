<?php

use App\Models\Producto;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id('idproductos');
            $table->string('barcode','50');
            $table->unsignedBigInteger('idmarcas');
            $table->foreign('idmarcas')->references('idmarcas')->on('marcas');
            $table->unsignedBigInteger('idproveedores');
            $table->foreign('idproveedores')->references('idproveedores')->on('proveedores');
            $table->string('modelo','50');
            $table->string('color','50');
            $table->decimal('costo', 10, 2);
            $table->decimal('precio_unitario', 10, 2);
            $table->integer('stock');
            $table->boolean('acabado')->default(0); // 1= si , 0= no
            $table->date('fecha_adquisicion');
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
        Schema::dropIfExists('productos');
    }
}
