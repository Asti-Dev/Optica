<?php

namespace App\Http\Controllers;

use App\Exports\ProductosExport;
use App\Models\Marca;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;

class ProductoController extends Controller
{

    public function __construct(){
        $this->authorizeResource(Producto::class, 'producto');
        $this->middleware('can:excel,App\Models\Producto', ['only' => ['excelAll','barcode']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->type && in_array($request->order, ['asc', 'desc'])) {
            $productos = Producto::where('acabado','=',Producto::NOACABADO)->orderBy($request->type, $request->order)->simplePaginate(10);
        } else {
            $productos = Producto::where('acabado','=',Producto::NOACABADO)->orderBy('idproductos', 'desc')->simplePaginate(10);
        }


        return view('productos.index', compact('productos'));
    }
    //  BUSCADOR POR KEYWORD
    public function searchForm(Request $request)
    {
        $stype  = $request->stype;
        $keyword = $request->keyword;
        if($request->mostrarAcabados == 'on'){
            $mostrarAcabados = Producto::SIACABADO;
        }else{
        $mostrarAcabados = Producto::NOACABADO;
        }
        //mostrarAcabados
        return redirect()->route('productos.search',
        ['stype' => $stype,'keyword' => $keyword,'mostrarAcabados' => $mostrarAcabados]);
    }

    public function search(Request $request, $stype, $keyword,$mostrarAcabados)
    {

        if ($request->type && $request->order) {
            $productos = Producto::where([
                [$stype, 'like', '%' . $keyword . '%'],
                ['acabado','<=',$mostrarAcabados]
                ])->orderBy($request->type, $request->order)
                ->simplePaginate(10);
        } else {
            $productos = Producto::where([
                [$stype, 'like', '%' . $keyword . '%'],
                ['acabado','<=',$mostrarAcabados]
                ])->orderBy('idproductos', 'desc')
                ->simplePaginate(10);
        }

        return view('productos.index', compact('productos'));
    }

    // BUSCADOR POR RANGO

    public function searchFormRange(Request $request)
    {
        $rtype  = $request->rtype;
        $inicio = $request->inicio;
        $fin = $request->fin;
        if($request->mostrarAcabados == 'on'){
            $mostrarAcabados = Producto::SIACABADO;
        }else{
        $mostrarAcabados = Producto::NOACABADO;
        }
        return redirect()->route('productos.searchRangos',
        ['rtype' => $rtype,'inicio' => $inicio,'fin' => $fin,'mostrarAcabados' => $mostrarAcabados]);
    }

    public function searchRangos(Request $request, $rtype, $inicio,$fin,$mostrarAcabados )
    {

        if ($request->type && $request->order) {
            $productos = Producto::whereBetween($rtype, [ $inicio, $fin])
            ->where('acabado','<=',$mostrarAcabados)
            ->orderBy($request->type, $request->order)->simplePaginate(10);
        } else {
            $productos = Producto::whereBetween($rtype, [ $inicio, $fin])
            ->where('acabado','<=',$mostrarAcabados)
            ->orderBy('idproductos', 'desc')->simplePaginate(10);
        }

        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'proveedor' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'color' => 'required',
            'costo' => 'required',
            'precio_unitario' => 'required',
            'stock' => 'required',
            'fecha_adquisicion' => 'required',
        ]);

        $codigoFecha = date('ymd', strtotime($validated['fecha_adquisicion']));

        $producto = Producto::create($validated +
        ['idproveedores' => $validated['proveedor']]+
        ['idmarcas' => $validated['marca']]
        );

        if($validated['stock'] == '0'){
            $producto->acabado = Producto::SIACABADO;
        };

        $producto->barcode = $producto->idproductos . $producto->proveedor->codigo .
        $producto->marca->codigo . $codigoFecha;

        $producto->save();

        return redirect()->route('productos.index')
            ->with('success', 'Producto creado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $validated = $request->validate([
            'proveedor' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'color' => 'required',
            'costo' => 'required',
            'precio_unitario' => 'required',
            'stock' => 'required',
            'fecha_adquisicion' => 'required',
        ]);

        $codigoFecha = date('ymd', strtotime($validated['fecha_adquisicion']));

        $producto->update($validated +
        ['idproveedores' => $validated['proveedor']]+
        ['idmarcas' => $validated['marca']]
        );

        $validated['stock'] == '0' ? 
        $producto->acabado = Producto::SIACABADO : 
        $producto->acabado = Producto::NOACABADO ;
        

        $producto->barcode = $producto->idproductos . $producto->proveedor->codigo .
        $producto->marca->codigo . $codigoFecha;

        $producto->save();

        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado!');
    }

    // EXPORTAR A EXCEL

    public function excelAll()
    {
        return Excel::download(new ProductosExport, 'Productos.xlsx');
    }

    // EXPORTAR A BARCODE
    public function barcode()
    {
        $data['productos'] = Producto::all();
        
        $pdf = PDF::loadView('productos.barcode', $data);
    
        return $pdf->download( 'barcode.pdf');

       //return view('productos.barcode', compact('productos'));
    }
    
    public function barcodeOne(Producto $producto)
    {
        $data['productos'] = collect([$producto]);
        
        $pdf = PDF::loadView('productos.barcode', $data);
    
        return $pdf->download( 'barcode.pdf');

       //return view('productos.barcode', compact('productos'));
    }
}
