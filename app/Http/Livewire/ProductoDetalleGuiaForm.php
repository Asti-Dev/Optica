<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;

class ProductoDetalleGuiaForm extends Component
{
    public $index;
    public $count;
    public $orderProduct;
    public $product =[];

    public function mount($orderProduct, $index)
    {
        $this->count = $index;
        $this->product = [
            'idproductos' => $orderProduct['idproductos'],
            'barcode' => $orderProduct['barcode'],
            'producto_descripcion' => $orderProduct['producto_descripcion'],
            'cantidad' => $orderProduct['cantidad'],
            'precio_unitario' => $orderProduct['precio_unitario'],
            'precio' => $orderProduct['precio'],
        ];
    }

    public function encontrarProducto()
    {
        $producto = Producto::where("barcode", "=", trim($this->product['barcode']))
            ->first();
        if ($producto) {
            $this->product = [
                'idproductos' => $producto->idproductos,
                'barcode' => $producto->barcode,
                'producto_descripcion' => $producto->marca->nombre . " " . $producto->modelo,
                'cantidad' => '1',
                'precio_unitario' => $producto->precio_unitario,
            ];
        } else{
            $this->product = [
                'idproductos' => "",
                'barcode' => $this->product['barcode'],
                'producto_descripcion' => "",
                'cantidad' => 1,
                'precio_unitario' => 0,
                "precio" => ""
            ];
        };
    }

    public function totalProducto()
    {
        $check = $this->product['cantidad'];
        $check2 = $this->product['precio_unitario'];

        if (is_numeric($check) && is_numeric($check2)) {
            $this->product = [
                'idproductos' => $this->product['idproductos'],
                'barcode' => $this->product['barcode'],
                'producto_descripcion' => $this->product['producto_descripcion'],
                'cantidad' => $this->product['cantidad'],
                'precio_unitario' => $this->product['precio_unitario'],
                "precio" => $this->product['cantidad'] * $this->product['precio_unitario']
            ];

        } else {
            $this->product = [
                'idproductos' => $this->product['idproductos'],
                'barcode' => $this->product['barcode'],
                'producto_descripcion' => $this->product['producto_descripcion'],
                'cantidad' => $this->product['cantidad'],
                'precio_unitario' => $this->product['precio_unitario'],
                "precio" => ""
            ];
        }
    }


    public function render()
    {
        return view('livewire.producto-detalle-guia-form');
    }
}
