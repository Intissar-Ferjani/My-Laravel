@extends('todos.layout')

@section('content')
<!-- App title section -->
<div class="row m-1 p-4">
    <div class="col">
        <div class="p-1 mb-2 h1 text-primary text-center mx-auto display-inline-block">
            <u>Update my Todo</u>
        </div>
    </div>
</div>
<!-- message area -->
<div style="text-align:center">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    {{$error}}
                @endforeach
            </ul>
        </div>
    @endif
</div>
<!-- end message area -->

<!-- Create todo section -->
<form action="{{route('todos.update', $todo->id)}}" method="post">
    @csrf
    @method('put')
    <div class="row m-1 p-3">
        <div class="col col-11 mx-auto">
            <label for="" class="mb-3 h5">Title</label>
            <div class="row bg-white rounded shadow-sm p-2 align-items-center justify-content-center">
                <div class="col">
                    <input class="form-control form-control-lg border-0 add-todo-input bg-transparent rounded" type="text" name="title" value="{{$todo->title}}">
                </div>
            </div>
        </div>
    </div>

    {{-- edit description area --}}
    <div class="row p-2">
        <div class="col col-11 mx-auto">
            <div class="row p-2 align-items-center justify-content-center">
                <div class="col">
                    <label for="" class="m-3 h5">Description</label>
                    <div class=" shadow-sm">
                        <textarea class="form-control" name="description" value="{{$todo->description}}">{{$todo->description}}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- edit steps area --}}
    @if ($todo->steps)
        @livewire('edit-step', ['steps' => $todo->steps])
    @endif
    

    <div class="container text-center d-inline">
        <div class="col-auto px-0 mx-0 large">
            <input type="submit" class="btn btn-outline-primary" value="Update"/>
        </div>
        <a href="/todos"><span class="fas fa-arrow-left fa-lg" style="color: darkgrey"></span></a>
    </div>
</form>
@endsection