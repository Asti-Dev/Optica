<?php

namespace App\Http\Livewire\Productos;

use App\Models\Proveedor;
use Livewire\Component;

class Edit extends Component
{
    public $proveedor;
    public $proveedorN;
    public $marca;
    public $marcaN;
    public $marcas =[];
    public $producto;
    protected $listeners = ['marcas'];


    protected $rules = [
        'proveedor' => 'required',
        'marca' => 'required',
    ];

    public function mount($producto)
    {
        $this->proveedorN = $producto->proveedor;
        $this->marcaN = $producto->marca;
        $this->producto = $producto;
    }

    public function marcas(){
    }

    public function render()
    {
        $proveedores = Proveedor::all();

        if(!empty($this->proveedor)) {
            $this->marcas = Proveedor::where('idproveedores', $this->proveedor)
            ->first()->marcas()->get();
        }
        return view('livewire.productos.edit',compact('proveedores'));
    }
}
