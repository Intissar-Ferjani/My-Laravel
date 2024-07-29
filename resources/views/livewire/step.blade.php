<div class="row p-2">
    <div class="col col-11 mx-auto">
        <div class="row p-2">
            <div class="col d-flex">
                <h5>Add steps </h5><span class="fas fa-shoe-prints px-2 py-1"></span>
                <div class="ms-auto">
                    <div>
                        <span class="fas fa-plus" style="cursor: pointer" wire:click="increment"></span>
                    </div>
                </div>                        
            </div>
        </div>

        <div class="row p-2 align-items-center justify-content-center">
            <div class="col">
                @foreach($steps as $step)
                <div class="d-flex" wire:key="{{$step}}">
                    <input class="form-control mb-2" placeholder="Describe step {{$step+1}}" name="step[]" > 
                    <span class="fas fa-minus py-2 px-2" style="color: red ; cursor: pointer;" wire:click="remove({{$step}})"></span>  
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
