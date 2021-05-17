<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Guia extends Model
{
    use HasFactory;

    const SOLES = 'soles';
    const DOLARES = 'dolares';
    const VACIO = '-';
    const ZERO = 0;
    const ANULAR_FECHA = '0000-00-00';


    const PROCESO = 'proceso';
    const ENTREGADO = 'entregado';
    const LISTO = 'listo';
    const ANULADO = 'anulado';

    const POR_CANCELAR = 'por cancelar';
    const CANCELADO = 'cancelado';

    protected $table = 'guias';
    protected $primaryKey = 'idguias';

    protected $guarded = [
        'idguias',
        'updated_at',
        'created_at',
    ];

    public $timestamps = true;

    public static function guiaAnular($idguias)
    {
        $guia = Guia::find($idguias);
        foreach ($guia->productos as $producto) {
            $stockProducto = Producto::find($producto->idproductos);
            $stockProducto->stock += $producto->pivot->cantidad;
            $stockProducto->save();
        }
        $guia->productos()->detach();
        // $clienteNulo = Cliente::where("nombre_apellido", "=", "-")->get();
        // $guia->idclientes = $clienteNulo[0]['idclientes'];
        $guia->update([
            'od_sph' => Guia::VACIO,
            'od_cil' => Guia::VACIO,
            'od_eje' => Guia::VACIO,
            'oi_sph' => Guia::VACIO,
            'oi_cil' => Guia::VACIO,
            'oi_eje' => Guia::VACIO,
            'add1' => Guia::VACIO,
            'add2' => Guia::VACIO,
            'dip1' => Guia::VACIO,
            'dip2' => Guia::VACIO,
            'nombre_lente' => Guia::VACIO,
            'precio_lente' => Guia::ZERO,
            'precio_otros' => Guia::ZERO,
            'subtotal' => Guia::ZERO,
            'descuento' => Guia::ZERO,
            'total' => Guia::ZERO,
            'cta' => Guia::ZERO,
            'saldo' => Guia::ZERO,
            'observaciones' => Guia::VACIO,
            'moneda' => Guia::VACIO,
            'estado' => Guia::ANULADO,
            'situacion' => Guia::VACIO,
            'fecha' => Guia::ANULAR_FECHA,
            'fecha_entrega_aprox' => Guia::ANULAR_FECHA,
            'fecha_entrega' => Guia::ANULAR_FECHA,
        ]);
        $guia->save();
    }


    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idclientes', 'idclientes');
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'guia_producto', 'idguias', 'idproductos')
        ->withPivot(['cantidad', 'precio']);
    }

    public static function searchKeyword($stype, $keyword)
    {
        if ($stype == "barcode") {
            $guias = Guia::with('productos')
                ->whereHas('productos', function (Builder $query) use ($stype, $keyword) {
                    $query->where($stype, 'like', '%' . $keyword . '%');
                });
        } else if ($stype == "precio") {
            $guias = Guia::with('productos')
            ->whereHas('productos',function (Builder $query) use ($stype, $keyword) {
                    $query->where('guia_producto.'.$stype, 'like', '%' . $keyword . '%');
                });

        } else {
            $guias = Guia::with('productos')
                ->where($stype, 'like', '%' . $keyword . '%');
        }
        return $guias;
    }
    public static function searchRango($rtype, $inicio, $fin)
    {
        if ($rtype == "precio") {
            $guias = Guia::with('productos')
            ->whereHas('productos',function (Builder $query) use ($rtype, $inicio, $fin) {
                    $query->whereBetween('guia_producto.'.$rtype,  [$inicio, $fin]);
                });

        } else {
            $guias = Guia::with('productos')
            ->whereBetween($rtype, [$inicio, $fin]);
        }
        return $guias;
    }
}
