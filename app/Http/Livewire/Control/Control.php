<?php

namespace App\Http\Livewire\Control;

use App\Models\Producto;
use Livewire\Component;

class Control extends Component
{
    public $buscar;
    public $producto;
    public $productos = []; // productos escaneados
    public $almacenProductos = []; // productos en el sistema
    public $almacenProducto;
    public $picked;
    public $almacenProductosExistentes = []; // productos en el sistema no escaneados

    public function mount()
    {
        $this->buscar = "";
        $this->picked = true;
    }

    public function refresh(){
        $this->buscar = '';
        $this->producto = '';
        $this->productos = [];
        $this->almacenProductos = [];
        $this->almacenProducto = '';
        $this->picked = true;
        $this->almacenProductosExistentes = [];
    }

    public function updatedBuscar()
    {
        $this->picked = false;

        $this->validate([
            "buscar" => "required|min:2"
        ]);

        $producto = Producto::where("barcode", trim($this->buscar))->first();

        if ($producto) {
            if (isset($this->productos[$producto->idproductos])) {
                $this->productos[$producto->idproductos]['cantidad']++;
            } else {
                $this->producto = [
                    "barcode" => $producto->barcode,
                    "marca" => $producto->marca->nombre,
                    "proveedor" => $producto->proveedor->nombre,
                    "modelo" => $producto->modelo,
                    "color" => $producto->color,
                    "cantidad" => 1,
                ];
                $this->productos[$producto->idproductos] = $this->producto;
            }
            $this->buscar = "";
            $this->picked = true;
        }
    }

    public function validar()
    {
        // comparar las cantidades del array productos con los que hay en la lista
        foreach ($this->productos as $key => $producto) {
            $almacenProducto = Producto::find($key);

            if ($almacenProducto) {
                $this->almacenProducto = [
                    "barcode" => $almacenProducto->barcode,
                    "marca" => $almacenProducto->marca->nombre,
                    "proveedor" => $almacenProducto->proveedor->nombre,
                    "modelo" => $almacenProducto->modelo,
                    "color" => $almacenProducto->color,
                    "stock" => $almacenProducto->stock,
                    "estado" => ($almacenProducto->stock === $producto['cantidad']) ? 'success' : 'danger',
                ];
                $this->almacenProductos[$almacenProducto->idproductos] = $this->almacenProducto;
            }
        }
        $this->almacenProductosExistentes = Producto::with(['marca','proveedor'])->where('stock', '!=', 0)->get();
        $this->almacenProductosExistentes = collect($this->almacenProductosExistentes)
            ->whereNotIn('idproductos', array_keys($this->almacenProductos))
            ->map(function ($item) {
                $response = collect($item)->only(['idproductos','barcode','stock','color','modelo'])->all();
                $response['marca'] = $item->marca->nombre;
                $response['proveedor'] = $item->proveedor->nombre;
                return $response;
            });       
    }

    public function render()
    {
        return view('livewire.control.control');
    }
}
