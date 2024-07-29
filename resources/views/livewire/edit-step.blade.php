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
                @foreach($steps as $step) {{-- step here is a sub-array --}}
                <div class="d-flex" wire:key="{{$loop->index}}">
                    <input class="form-control mb-2" name="stepName[]" placeholder="Describe step {{($loop->index+1)}}" value="{{$step['name']}}" >
                    <input type="hidden" name="stepId[]" value="{{$step['id']}}" > 
                    <span class="fas fa-minus py-2 px-2" style="color: red ; cursor: pointer;" wire:click="remove({{$loop->index}})"></span>  
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
