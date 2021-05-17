<?php

use App\Models\Guia;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guias', function (Blueprint $table) {
            $table->id('idguias');
            $table->unsignedBigInteger('idclientes');
            $table->foreign('idclientes')->references('idclientes')->on('clientes');
            $table->string('nombre_apellido','200');
            $table->string('telefono','15')->nullable();
            $table->string('direccion','200')->nullable();
            $table->string('od_sph','50');
            $table->string('od_cil','50');
            $table->string('od_eje','50');
            $table->string('oi_sph','50');
            $table->string('oi_cil','50');
            $table->string('oi_eje','50');
            $table->string('add1','50');
            $table->string('add2','50');
            $table->string('dip1','50');
            $table->string('dip2','50');
            $table->string('nombre_lente','100');
            $table->decimal('precio_lente', 10, 2);
            $table->decimal('precio_otros', 10, 2);
            $table->decimal('subtotal', 10, 2);
            $table->decimal('descuento', 10, 2);
            $table->decimal('total', 10, 2);
            $table->decimal('cta', 10, 2);
            $table->decimal('saldo', 10, 2);
            $table->string('observaciones','250')->nullable();
            $table->enum('moneda',[Guia::SOLES,Guia::DOLARES,Guia::VACIO])->default(Guia::SOLES);
            $table->enum('estado',[Guia::PROCESO,Guia::ENTREGADO,Guia::LISTO,Guia::ANULADO])->default(Guia::PROCESO);
            $table->enum('situacion',[Guia::POR_CANCELAR,Guia::CANCELADO,Guia::VACIO])->default(Guia::POR_CANCELAR);
            $table->date('fecha');
            $table->date('fecha_entrega_aprox');
            $table->date('fecha_entrega')->nullable();
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
        Schema::dropIfExists('guias');
    }
}
