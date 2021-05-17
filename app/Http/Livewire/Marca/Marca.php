<?php

namespace App\Http\Livewire\Marca;

use App\Models\Marca as ModelsMarca;
use Livewire\Component;
use Livewire\WithPagination;

class Marca extends Component
{
    protected $paginationTheme = 'bootstrap';
    use WithPagination;

    public $view = 'crear';
    public $nombre;
    public $marcaId;

    public function render()
    {
        $marcas = ModelsMarca::orderBy('idmarcas', 'desc')->paginate(8);

        return view('livewire.marca.marca', compact('marcas'));
    }

    public function store()
    {
        $this->validate(['nombre' => 'required']);

        $marca = ModelsMarca::create([
            'nombre' => $this->nombre,
        ]);

        $marca->codigo = str_pad($marca->idmarcas,2,'0',STR_PAD_LEFT);
        $marca->save();

        $this->edit($marca->idmarcas);
    }

    public function edit($id)
    {
        $marca = ModelsMarca::where('idmarcas','=',$id)->first();

        $this->nombre = $marca->nombre;
        $this->marcaId = $marca->idmarcas;

        $this->view = 'edit';

    }
    public function update()
    {
        $this->validate(['nombre' => 'required']);

        $marca = ModelsMarca::where('idmarcas','=',$this->marcaId)->first();

        $marca->update([
            'nombre' => $this->nombre,
        ]);
        $marca->save();
    }

    public function default()
    {
        $this->nombre = '';

        $this->view = 'crear';

    }

    public function destroy($id)
    {
        ModelsMarca::where('idmarcas','=',$id)->delete();
    }


}
