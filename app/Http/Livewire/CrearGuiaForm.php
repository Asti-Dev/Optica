<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use Livewire\Component;

class CrearGuiaForm extends Component
{
    public $nombre;
    public $telefono;
    public $direccion;
    public $clientes = [];
    public $od_sph ;
    public $od_cil ;
    public $od_eje ;
    public $oi_sph ;
    public $oi_cil ;
    public $oi_eje ;
    public $add1 ;
    public $add2 ;
    public $dip1 ;
    public $dip2 ;
    public $nombre_lente ;
    public $precio_lente ;
    public $precio_otros ;
    public $subtotal ;
    public $descuento ;
    public $total ;
    public $cta ;
    public $saldo ;
    public $observaciones;
    public $moneda ;
    public $estado ;
    public $situacion ;
    public $fecha ;
    public $fecha_entrega_aprox ;
    public $fecha_entrega ;
    // public $guia;
    protected $listeners = ['updatedNombre'];

    public function mount(){

    }


    public function updatedNombre()
    {
        if($this->nombre != ""){
        $this->clientes = Cliente::where("nombre_apellido", "like","%" . trim($this->nombre) . "%")
            ->take(5)
            ->get();
            $check = Cliente::where('nombre_apellido', '=',  $this->nombre)
        ->first();

        if ($check !== null) {
            $this->nombre = $check->nombre_apellido;
            $this->telefono = $check->telefono;
            $this->direccion = $check->direccion;
        }

        }else{
            $this->clientes = [];
        }


    }

    public function render()
    {
        return view('livewire.crear-guia-form');
    }
}
