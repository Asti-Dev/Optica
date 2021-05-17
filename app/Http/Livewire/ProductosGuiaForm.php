<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductosGuiaForm extends Component
{
    public $orderProducts = [];
    public $indexCount;
    public $guia;

    public function mount()
    {
        $this->indexCount = 0;
        if ($this->guia) {
            foreach ($this->guia->productos as $producto) {
                $indexCount = $this->indexCount++;
                $this->orderProducts[$indexCount] = [
                    'idproductos' => $producto->idproductos,
                    'barcode' => $producto->barcode,
                    'producto_descripcion' => $producto->marcaproveedor()->marca()->nombre . " " . $producto->modelo,
                    'cantidad' => $producto->pivot->cantidad,
                    'precio_unitario' => $producto->precio_unitario,
                    "precio" => $producto->pivot->precio
                ];
            }
        }
    }

    public function addProduct()
    {
            $this->indexCount++;
            $this->orderProducts[] = [
                'idproductos' => "",
                'barcode' => '',
                'producto_descripcion' => "",
                'cantidad' => 1,
                'precio_unitario' => 0,
                "precio" => ""
            ];

    }

    public function removeProduct($index)
    {
        if ($this->indexCount > 1) {
            $this->indexCount--;
            unset($this->orderProducts[$index]);
        } else {
            $this->indexCount--;
            $this->orderProducts=[];
        }
    }



    public function render()
    {
        return view('livewire.productos-guia-form');
    }
}
