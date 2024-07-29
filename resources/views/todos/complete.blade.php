@if ($todo->completed)
    <span class="fa-regular fa-circle-check px-3 py-2 fa-lg m-1" style="color: rgb(53, 208, 53); cursor: pointer;"
        onclick="document.getElementById('incomplete-{{$todo->id}}').submit()">
    </span>
    <form action="{{route('todos.incomplete', $todo->id)}}" id="{{'incomplete-'.$todo->id}}" method="post" style="display: hidden">
        @csrf
        @method('put')
    </form>
@else
    <span class="fa-regular fa-circle-check px-3 py-2 fa-lg m-1" style="color:darkgrey; cursor: pointer;"
        onclick="document.getElementById('complete-{{$todo->id}}').submit()">
    </span>
    <form action="{{route('todos.complete', $todo->id)}}" id="{{'complete-'.$todo->id}}" method="post" style="display: hidden">
        @csrf
        @method('put')
    </form>
@endif