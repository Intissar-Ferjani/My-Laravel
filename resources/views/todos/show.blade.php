@extends('todos.layout')

@section('content')
    <!-- App title section -->
    <div class="row m-1 p-4">
      <div class="col">
        <div class="p-1 mb-2 h2 text-center mx-auto display-inline-block">
          {{$todo->title}}
        </div>
      </div>
    </div>

    <div class="p-2 mx-4 border-black-25 border-bottom mb-4"></div>

    <!-- description_todo section -->
    <div class="row m-1 p-4">
      <div class="col">
        <div class="p-1 mb-2 mx-auto display-inline-block">
          <span class="h5"><ul><li><b>Description</b></li></ul></span>
          <span class="p lead m-3">{{$todo->description}}</span>
        </div>
      </div>
    </div>

    <!-- step_todo section -->
    @if ($todo->steps->count() > 0)
      <div class="row m-1 p-4">
        <div class="col">
          <div class="p-1 mb-2 mx-auto display-inline-block">
            <span class="h5"><ul><li><b>Steps</b></li></ul></span>
            <ol>
              @foreach ($todo->steps as $step)
                <li>
                  <span class="p lead m-3">{{$step->name}}</span>
                </li>
              @endforeach
            </ol>            
          </div>
        </div>
      </div>
    @endif
    

    <!-- back arrow -->
    <div class="container text-center">
        <a href="{{route('todos.index')}}"><span class="fas fa-arrow-left fa-lg" style="color: darkgrey"></span></a>
    </div>
    
@endsection