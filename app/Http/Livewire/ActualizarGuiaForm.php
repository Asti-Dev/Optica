<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use Livewire\Component;

class ActualizarGuiaForm extends Component
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
    public $guia;
    protected $listeners = ['updatedNombre'];

    public function mount($guia)
    {
            $this->nombre = $guia->cliente->nombre_apellido;
            $this->telefono = $guia->cliente->telefono;
            $this->direccion = $guia->cliente->direccion;
            $this->od_sph = $guia->od_sph;
            $this->od_cil = $guia->od_cil;
            $this->od_eje = $guia->od_eje;
            $this->oi_sph = $guia->oi_sph;
            $this->oi_cil = $guia->oi_cil;
            $this->oi_eje = $guia->oi_eje;
            $this->add1 = $guia->add1;
            $this->add2 = $guia->add2;
            $this->dip1 = $guia->dip1;
            $this->dip2 = $guia->dip2;
            $this->nombre_lente = $guia->nombre_lente;
            $this->precio_lente = $guia->precio_lente;
            $this->precio_otros = $guia->precio_otros;
            $this->subtotal = $guia->subtotal;
            $this->descuento = $guia->descuento;
            $this->total = $guia->total;
            $this->cta = $guia->cta;
            $this->saldo = $guia->saldo;
            $this->observaciones = $guia->observaciones;
            $this->moneda = $guia->moneda;
            $this->estado = $guia->estado;
            $this->situacion = $guia->situacion;
            $this->fecha = $guia->fecha;
            $this->fecha_entrega_aprox = $guia->fecha_entrega_aprox;
            $this->fecha_entrega = $guia->fecha_entrega;
    }

    public function updatedNombre()
    {
        if($this->nombre != ""){
        $this->clientes = Cliente::where("nombre_apellido", "like","%" . trim($this->nombre) . "%")
            ->take(5)
            ->get();

            $check = Cliente::where('nombre_apellido', '=',  $this->nombre)
        ->get();
        if (isset($check[0])) {
            $this->nombre = $check[0]['nombre_apellido'];
            $this->telefono = $check[0]['telefono'];
            $this->direccion = $check[0]['direccion'];
        }
        }else{
            $this->clientes = [];
        }

    }


    public function render()
    {
        return view('livewire.actualizar-guia-form');
    }
}
