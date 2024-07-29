@extends('todos.layout')

<div class="nav-item dropdown" style="text-align: right; margin:40px">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }}
    </a>

    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>

@section('content')

<div class="row m-1 p-4">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="p-1 mb-2 h1 text-primary d-inline-flex">
                    <u>All Your Todo-s</u>
                    <a href="/todos/create" class="btn btn-outline-primary m-2" style="border: none !important; background-color: transparent !important;">
                        <span class="fas fa-plus-circle fa-lg" ></span>
                    </a>
                </div>
                @include('todos.message')
            </div>
        </div>
    </div>
    <div class="container">
        <div class="p-2 mx-4 border-black-25 border-bottom mb-4"></div>
        <table class="table table-borderless">
            @foreach ($todos as $todo)
                <tr>
                    <td class="h5 d-inline-flex" style="background-color: transparent">
                        @include('todos.complete')
                        @if ($todo->completed)
                            <span style="text-decoration-line: line-through">{{$todo->title}}</span>
                        @else
                            <span>{{$todo->title}}</span>
                        @endif 
                    </td>
                    <td style="background-color: transparent; text-align:right;">

                        <a href="{{route('todos.show',$todo->id)}}"><span class="fas fa-eye " style="cursor: pointer; color:cadetblue"></span></a>

                        <a href="{{route('todos.edit',$todo->id)}}"><span class="fas fa-pen px-2 " style="color: rgb(253, 146, 71);"></span></a>
                        
                        <span class="fas fa-xmark fa-lg" style="color:rgb(241, 65, 65); cursor: pointer;"
                            onclick="
                                if(confirm('Are you sure you want to delete this to-do?'))
                                    document.getElementById('delete-{{$todo->id}}').submit();" >
                            <form action="{{route('todos.destroy',$todo->id)}}" method="post" id="{{'delete-'.$todo->id}}" style="display: none">
                            @csrf
                            @method('delete')
                            </form>
                        </span>

                    </td>
                </tr>
            @endforeach
        </table>  
    </div>        
</div>
@endsection





    
