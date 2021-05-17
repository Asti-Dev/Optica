<?php

namespace App\Exports;

use App\Models\Guia;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class GuiaExport implements FromView
{
    public function view(): View
    {
        return view('guias.export', [
            'guias' => Guia::with('productos')->get()
        ]);
    }
    //public function query()
    // {
    // return Guia::query()
    // ->join('clientes','guias.idclientes', '=','clientes.idclientes')
    // ->select('guias.*', 'clientes.nombre_apellido','clientes.telefono','clientes.direccion')
    // ->select(array(
    //     'guias.idguias',
    // 'guias.nombre_lente',
    // 'guias.precio_lente',
    // 'guias.precio_otros',
    // 'guias.subtotal',
    // 'guias.descuento',
    // 'guias.total',
    // 'guias.cta',
    // 'guias.saldo',
    // 'guias.moneda',
    // 'guias.estado',
    // 'guias.situacion',
    // 'guias.fecha',
    // 'guias.fecha_entrega_aprox',
    // 'guias.fecha_entrega',
    // 'guias.od_sph',
    // 'guias.od_cil',
    // 'guias.od_eje',
    // 'guias.oi_sph',
    // 'guias.oi_cil',
    // 'guias.oi_eje',
    // 'guias.add1',
    // 'guias.add2',
    // 'guias.dip1',
    // 'guias.dip2',
    // 'guias.observaciones',
    //     ))
    // ->join('guia_producto','guias.idguias','=','guia_producto.idguias')
    // ->select(array('guias.*',
    // 'guia_producto.cantidad',
    // 'guia_producto.precio_unitario',
    // 'guia_producto.precio',
    // 'guia_producto.idproductos',
    // ))
    // ->join('productos','guia_producto.idproductos','=','productos.idproductos')
    // ->select(array('productos.marca','guia_producto.idproductos'));
    // }
    // public function map($guia): array
    // {
    //     return [
    //         $guia->idguias,
    //         $guia->nombre_apellido,
    //         $guia->telefono,
    //         $guia->direccion,
    //         $guia->nombre_lente,
    //         $guia->precio_lente,
    //         $guia->precio_otros,
    //         $guia->productos->marca,
    //         $guia->subtotal,
    //         $guia->descuento,
    //         $guia->total,
    //         $guia->cta,
    //         $guia->saldo,
    //         $guia->moneda,
    //         $guia->estado,
    //         $guia->situacion,
    //         $guia->fecha,
    //         $guia->fecha_entrega_aprox,
    //         $guia->fecha_entrega,
    //         $guia->od_sph,
    //         $guia->od_cil,
    //         $guia->od_eje,
    //         $guia->oi_sph,
    //         $guia->oi_cil,
    //         $guia->oi_eje,
    //         $guia->add1,
    //         $guia->add2,
    //         $guia->dip1,
    //         $guia->dip2,
    //         $guia->observaciones
    //     ];
    // }
    // public function headings(): array
    // {
    //     return [
    //         'idguias',
    //         'nombre_apellido',
    //         'telefono',
    //         'direccion',
    //         'nombre_lente',
    //         'precio_lente',
    //         'precio_otros',
    //         'subtotal',
    //         'descuento',
    //         'total',
    //         'cta',
    //         'saldo',
    //         'moneda',
    //         'estado',
    //         'situacion',
    //         'fecha',
    //         'fecha_entrega_aprox',
    //         'fecha_entrega',
    //         'od_sph',
    //         'od_cil',
    //         'od_eje',
    //         'oi_sph',
    //         'oi_cil',
    //         'oi_eje',
    //         'add1',
    //         'add2',
    //         'dip1',
    //         'dip2',
    //         'observaciones',
    //     ];
    // }
    // public function registerEvents(): array
    // {
    //     return [
    //         AfterSheet::class    => function (AfterSheet $event) {

    //             $event->sheet->getStyle('A1:I1')->applyFromArray([
    //                 'font' => [
    //                     'bold' => true
    //                 ],
    //                 'fill' => [
    //                     'fillType' => Fill::FILL_SOLID,
    //                     'startColor' => [
    //                         'argb' => 'FFA0A0A0',
    //                     ],
    //                 ],
    //             ]);
    //         },
    //     ];
    // }
}
