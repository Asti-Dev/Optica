<?php

namespace App\Http\Livewire\Productos;

use App\Models\Proveedor;
use Livewire\Component;

class Create extends Component
{
    public $proveedor;
    public $marca;
    public $marcas =[];

    public function render()
    {
        $proveedores = Proveedor::all();

        if(!empty($this->proveedor)) {
            $this->marcas = Proveedor::where('idproveedores', $this->proveedor)
            ->first()->marcas()->get();
        }
        return view('livewire.productos.create', compact('proveedores'));
    }
}
