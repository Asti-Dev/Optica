<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Guia;
use App\Models\Producto;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\GuiaExport;

class GuiaController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Guia::class, 'guia');
        $this->middleware('can:excel,App\Models\Guia', ['only' => ['excelAll']]);
        $this->middleware('can:anular,App\Models\Guia', ['only' => ['anular']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->type && in_array($request->order, ['asc', 'desc'])) {
            $guias = Guia::with('productos')->orderBy($request->type, $request->order)->simplePaginate(5);
        } else {
            $guias = Guia::with('productos')->orderBy('idguias', 'desc')->simplePaginate(5);
        }

        $buscarPalabra = [
            'idguias' => 'idGuia',
            'nombre_apellido' => 'Cliente',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'nombre_lente' => 'Nombre del lente',
            'precio_lente' => 'Lente',
            'precio_otros' => 'Otros',
            'subtotal' => 'SubTotal',
            'descuento' => 'Descuento',
            'total' => 'Total',
            'cta' => 'A Cta.',
            'saldo' => 'Saldo',
            'observaciones' => 'Observaciones',
            'moneda' => 'Tipo Moneda',
            'estado' => 'Estado',
            'situacion' => 'Situacion',
            'barcode' => 'Codigo Nombre de montura',
            'precio' => 'Montura',
        ];

        $buscarRango = [
            'idguias' => 'idGuia',
            'precio_lente' => 'Lente',
            'precio' => 'Montura',
            'precio_otros' => 'Otros',
            'subtotal' => 'SubTotal',
            'descuento' => 'Descuento',
            'total' => 'Total',
            'cta' => 'A Cta.',
            'saldo' => 'Saldo',
            'fecha' => 'Fecha',
            'fecha_entrega_aprox' => 'Fecha entrega Aprox',
            'fecha_entrega' => 'Fecha entrega',
        ];


        $data['guias'] = $guias;
        $data['buscarPalabra'] = $buscarPalabra;
        $data['buscarRango'] = $buscarRango;
        return view('guias.index', $data);
    }


    //  BUSCADOR POR KEYWORD
    public function searchForm(Request $request)
    {
        $stype  = $request->stype;
        $keyword = $request->keyword;
        return redirect()->route('guias.search', ['stype' => $stype, 'keyword' => $keyword]);
    }

    public function search(Request $request, $stype, $keyword)
    {
        if ($request->type && $request->order) {
            $guias = Guia::searchKeyword($stype,$keyword)
                ->orderBy($request->type, $request->order)
                ->simplePaginate(10);
        } else {
            $guias = Guia::searchKeyword($stype,$keyword)
                ->orderBy('idguias', 'desc')
                ->simplePaginate(10);
        }
        $buscarPalabra = [
            'idguias' => 'idGuia',
            'nombre_apellido' => 'Cliente',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'nombre_lente' => 'Nombre del lente',
            'precio_lente' => 'Lente',
            'precio_otros' => 'Otros',
            'subtotal' => 'SubTotal',
            'descuento' => 'Descuento',
            'total' => 'Total',
            'cta' => 'A Cta.',
            'saldo' => 'Saldo',
            'observaciones' => 'Observaciones',
            'moneda' => 'Tipo Moneda',
            'estado' => 'Estado',
            'situacion' => 'Situacion',
            'barcode' => 'Codigo Nombre de montura',
            'precio' => 'Montura',
        ];

        $buscarRango = [
            'idguias' => 'idGuia',
            'precio_lente' => 'Lente',
            'precio' => 'Montura',
            'precio_otros' => 'Otros',
            'subtotal' => 'SubTotal',
            'descuento' => 'Descuento',
            'total' => 'Total',
            'cta' => 'A Cta.',
            'saldo' => 'Saldo',
            'fecha' => 'Fecha',
            'fecha_entrega_aprox' => 'Fecha entrega Aprox',
            'fecha_entrega' => 'Fecha entrega',
        ];
        $data['guias'] = $guias;
        $data['buscarPalabra'] = $buscarPalabra;
        $data['buscarRango'] = $buscarRango;
        return view('guias.index', $data);
    }

    // BUSCADOR POR RANGO

    public function searchFormRange(Request $request)
    {
        $rtype  = $request->rtype;
        $inicio = $request->inicio;
        $fin = $request->fin;
        return redirect()->route('guias.searchRangos', ['rtype' => $rtype, 'inicio' => $inicio, 'fin' => $fin]);
    }

    public function searchRangos(Request $request, $rtype, $inicio, $fin)
    {

        if ($request->type && $request->order) {
            $guias = Guia::searchRango($rtype,$inicio, $fin)
                ->orderBy($request->type, $request->order)
                ->simplePaginate(10);
        } else {
            $guias = Guia::searchRango($rtype,$inicio, $fin)
                ->orderBy('idguias', 'desc')
                ->simplePaginate(10);
        }

        $buscarPalabra = [
            'idguias' => 'idGuia',
            'nombre_apellido' => 'Cliente',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'nombre_lente' => 'Nombre del lente',
            'precio_lente' => 'Lente',
            'precio_otros' => 'Otros',
            'subtotal' => 'SubTotal',
            'descuento' => 'Descuento',
            'total' => 'Total',
            'cta' => 'A Cta.',
            'saldo' => 'Saldo',
            'observaciones' => 'Observaciones',
            'moneda' => 'Tipo Moneda',
            'estado' => 'Estado',
            'situacion' => 'Situacion',
            'barcode' => 'Codigo Nombre de montura',
            'precio_unitario' => 'Montura',
        ];

        $buscarRango = [
            'idguias' => 'idGuia',
            'precio_lente' => 'Lente',
            'precio_unitario' => 'Montura',
            'precio_otros' => 'Otros',
            'subtotal' => 'SubTotal',
            'descuento' => 'Descuento',
            'total' => 'Total',
            'cta' => 'A Cta.',
            'saldo' => 'Saldo',
            'fecha' => 'Fecha',
            'fecha_entrega_aprox' => 'Fecha entrega Aprox',
            'fecha_entrega' => 'Fecha entrega',
        ];
        $data['guias'] = $guias;
        $data['buscarPalabra'] = $buscarPalabra;
        $data['buscarRango'] = $buscarRango;
        return view('guias.index', $data);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guias.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required',
            'fecha_entrega_aprox' => 'required',
        ]);
        $data = Cliente::getFormGuiaCliente($request);
        DB::beginTransaction();
        try {
            $guia = Guia::create($request->all() + ['idclientes' => $data['idcliente']]);

            if ($request->input('idproductos', [])) {
                $idproductos = $request->input('idproductos', []);
                $cantidad = $request->input('cantidad', []);
                $precio = $request->input('precio', []);

                for ($producto = 0; $producto < count($idproductos); $producto++) {
                    if ($idproductos[$producto] != '') {
                        $guia->productos()->attach(
                            $idproductos[$producto],
                            [
                                'cantidad' => $cantidad[$producto],
                                'precio' => $precio[$producto],
                            ]
                        );
                        $stockProducto = Producto::find($idproductos[$producto]);
                        $check = $stockProducto->stock - $cantidad[$producto];
                        if ($check < 0) {
                            throw new \Exception("Producto: " . $stockProducto->marca . " " . $stockProducto->modelo . " Stock Insuficiente:" . $stockProducto->stock);
                        }
                        $stockProducto->stock -= $cantidad[$producto];
                        $stockProducto->save();
                        if ($stockProducto->stock == 0){
                            $stockProducto->acabado = Producto::SIACABADO;
                            $stockProducto->save();
                        }
                    }
                }
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('guias.create')->with('danger', $exception->getMessage());
        }

        return redirect()->route('guias.index')
            ->with('success', 'Guia creada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guia  $guia
     * @return \Illuminate\Http\Response
     */
    public function show(Guia $guia)
    {
        return view('guias.show', compact('guia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guia  $guia
     * @return \Illuminate\Http\Response
     */
    public function edit(Guia $guia)
    {
        return view('guias.edit', compact('guia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guia  $guia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guia $guia)
    {
        $request->validate([
            'fecha' => 'required',
            'fecha_entrega_aprox' => 'required',
        ]);

        $data = Cliente::getFormGuiaCliente($request);
        DB::beginTransaction();
        try {
            $guia->update($request->all() + ['idclientes' => $data['idcliente']]);
            foreach ($guia->productos as $producto) {
                $stockProducto = Producto::find($producto->idproductos);
                $stockProducto->stock += $producto->pivot->cantidad;
                $stockProducto->acabado = Producto::NOACABADO;
                $stockProducto->save();
            }
            $guia->productos()->detach();
            if ($request->input('idproductos', [])) {
                $idproductos = $request->input('idproductos', []);
                $cantidad = $request->input('cantidad', []);
                $precio = $request->input('precio', []);

                for ($producto = 0; $producto < count($idproductos); $producto++) {
                    if ($idproductos[$producto] != '') {
                        $guia->productos()->attach(
                            $idproductos[$producto],
                            [
                                'cantidad' => $cantidad[$producto],
                                'precio' => $precio[$producto],
                            ]
                        );
                        $stockProducto = Producto::find($idproductos[$producto]);

                        $check = $stockProducto->stock - $cantidad[$producto];
                        if ($check < 0) {
                            throw new \Exception("Producto: " . $stockProducto->marca->nombre . " " . $stockProducto->modelo . " Stock Insuficiente:" . $stockProducto->stock);
                        }
                        $stockProducto->stock -= $cantidad[$producto];
                        $stockProducto->save();
                        if ($stockProducto->stock == 0){
                            $stockProducto->acabado = Producto::SIACABADO;
                            $stockProducto->save();
                        }
                    }
                }
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('guias.index')->with('danger', $exception->getMessage());
        }

        return redirect()->route('guias.index')
            ->with('success', 'Guia actualizada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guia  $guia
     * @return \Illuminate\Http\Response
     */
    public function anular($idguias)
    {
        Guia::guiaAnular($idguias);

        return redirect()->route('guias.index')
            ->with('success', 'Guia anulada!');
    }


    // EXPORTAR A EXCEL

    public function excelAll()
    {
        return Excel::download(new GuiaExport, 'Guias.xlsx');
    }
}
