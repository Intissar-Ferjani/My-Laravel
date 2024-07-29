@extends('todos.layout')

@section('content')
    <!-- App title section -->
    <div class="row m-1 p-4">
        <div class="col">
            <div class="p-1 mb-2 h1 text-primary text-center mx-auto display-inline-block">
                <u>My Todo-s</u>
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
            @elseif(session()->has('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
            @endif
        </div>
        
    </div>

    <!-- Create todo section -->
    <form action="{{route('todos.store')}}" method="post">
        @csrf
        <div class="row m-1 p-3">
            <div class="col col-11 mx-auto">
                <div class="row bg-white rounded shadow-sm p-2 align-items-center justify-content-center">
                    <div class="col">
                        <input class="form-control form-control-lg border-0 add-todo-input bg-transparent rounded" type="text" name="title" placeholder="Enter new title">
                    </div>
                    <div class="col-auto px-0 mx-0 mr-2">
                        <input type="submit" class="btn btn-primary" value="Add"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-2">
            <div class="col col-11 mx-auto">
                <div class="row p-2 align-items-center justify-content-center">
                    <div class="col">
                        <div class="form-floating shadow-sm">
                            <textarea class="form-control" placeholder="Leave a description here" name="description" id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">To-do Description</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-2 mx-4 border-black-25 border-bottom mb-4"></div>

        {{-- Steps area --}}  
        
        @livewire('step')   

    </form>
    <div class="container text-center">
        <a href="{{route('todos.index')}}"><span class="fas fa-arrow-left fa-lg" style="color: darkgrey"></span></a>
    </div>
    
@endsection