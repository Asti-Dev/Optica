
<div class="card col-11 my-2 p-0">
    <div class="card-header col py-2 d-flex justify-content-between">
        <h4>Monturas</h4>
        <a style="cursor: pointer" wire:click="addProduct"><i style="font-size: 2rem; color:green"
                class="fas fa-plus"></i></a>
    </div>
    <div style="background: honeydew" class="card-body w-100 d-flex flex-column align-items-center">
        @foreach ($orderProducts as $index => $orderProduct)

            @livewire('producto-detalle-guia-form', ['orderProduct'=> $orderProduct , 'index' => $index], key($index))
            <div class="col-12 row d-flex justify-content-end">
                <a style="cursor: pointer" wire:click.prevent="removeProduct({{$index}})">
                    <i style="font-size: 2rem; color:red" class="fas fa-window-close"></i>
                </a>
            </div>
            <hr class="w-100" style="height:1rem; color: black">

        @endforeach
    </div>
</div>

