<?php

namespace App\Http\Livewire\Proveedor;

use App\Models\Marca;
use App\Models\Proveedor as ModelsProveedor;
use Livewire\Component;
use Livewire\WithPagination;

class Proveedor extends Component
{
    protected $paginationTheme = 'bootstrap';
    use WithPagination;

    public $view = 'crear';
    public $nombresMarca = [];
    public $marcasSelect = [];
    public $marcas =[];
    public $nombre;
    public $proveedorId;
    protected $listeners = ['findMarcas'];

    public function mount()
    {
        $this->marcasSelect = Marca::all();
    }


    public function render()
    {
        $proveedores = ModelsProveedor::orderBy('idproveedores', 'desc')->paginate(8);

        return view('livewire.proveedor.proveedor', compact('proveedores') );
    }

    public function store()
    {
        $this->validate(['nombre' => 'required']);

        $proveedor = ModelsProveedor::create([
            'nombre' => $this->nombre,
        ]);

        $proveedor->codigo = str_pad($proveedor->idproveedores,2,'0',STR_PAD_LEFT);
        $proveedor->save();

        if($this->nombresMarca != []){
            for ($i = 0; $i < count($this->nombresMarca); $i++) {
                if ($this->nombresMarca[$i] != '') {
                    $proveedor->marcas()->attach(
                        $this->nombresMarca[$i]
                    );
                    $proveedor->save();
                }
            }
        }

        $this->edit($proveedor->idproveedores);

    }

    public function edit($id)
    {
        $proveedor = ModelsProveedor::where('idproveedores','=',$id)->first();

        $this->nombre = $proveedor->nombre;
        $this->proveedorId = $proveedor->idproveedores;
        $this->nombresMarca = [];
        $indexCount = 0;
            foreach ($proveedor->marcas as $marca) {
                $this->nombresMarca[$indexCount] =
                    $marca->idmarcas;
                $indexCount++;

            }

        $this->view = 'edit';

    }

    public function show($id)
    {
        $proveedor = ModelsProveedor::where('idproveedores','=',$id)->first();

        $this->nombre = $proveedor->nombre;
        $this->marcas = $proveedor->marcas()->get();

        $this->view = 'show';



    }

    public function update(){
        $this->validate(['nombre' => 'required']);

        $proveedor = ModelsProveedor::where('idproveedores','=',$this->proveedorId)->first();

        $proveedor->update([
            'nombre' => $this->nombre,
        ]);
        $proveedor->save();

        $proveedor->marcas()->detach();

        if($this->nombresMarca != []){
            for ($i = 0; $i < count($this->nombresMarca); $i++) {
                if ($this->nombresMarca[$i] != '') {
                    $proveedor->marcas()->attach(
                        $this->nombresMarca[$i]
                    );
                    $proveedor->save();
                }
            }
        }


    }

    public function default()
    {
        $this->nombre = '';
        $this->nombresMarca = [];

        $this->view = 'crear';

    }

    public function destroy($id)
    {
        ModelsProveedor::where('idproveedores','=',$id)->delete();
    }
}
