<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Step;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\TodoCreateRequest;
 

class TodoController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    // ---------------------------------------------------------------------------
    
    public function index() {
        $todos = auth()->user()->todos->sortBy('completed');
        return view('todos.index')->with(['todos' => $todos]);
    }

    // ---------------------------------------------------------------------------
    
    public function create(){
        return view('todos.create');
    }

    // ---------------------------------------------------------------------------
    
    public function show(Todo $todo) {
        return view('todos.show', compact('todo'));
    }

    // ---------------------------------------------------------------------------
    
    public function store(TodoCreateRequest $request){

        $todo = auth()->user()->todos()->create($request->all());

        if($request->step){
            foreach($request->step as $step){
                $todo->steps()->create(['name' => $step]);
            }
        }
        
        return  redirect()->back()->with('message', 'To-do created successfully');
    }

    // ---------------------------------------------------------------------------
    
    public function edit(Todo $todo){
        return view('todos.edit' , compact('todo'));
    }

    // ---------------------------------------------------------------------------
    
    public function update(TodoCreateRequest $request, Todo $todo) {
        $todo->update(['title' => $request->title, 'description' => $request->description]);

        if($request->stepName){
            foreach($request->stepName as $key => $value){

                $id = $request->stepId[$key];
                $step = Step::find($id);
                if($step){
                    $step->update(['name' => $value]);
                }
                else{
                    $todo->steps()->create(['name' => $value , 'todo_id' => $id]);
                }
                
            }
        }

        return redirect(route('todos.index'))->with('message', 'Updated!');
    }

    // ---------------------------------------------------------------------------
    
    public function complete(Todo $todo) {
        $todo->update(['completed' => 1]);
        return redirect()->back()->with('message', 'Task marked as completed!');
    }

    // ---------------------------------------------------------------------------
    
    public function incomplete(Todo $todo) {
        $todo->update(['completed' => 0]);
        return redirect()->back()->with('message', 'Task marked as incompleted!');;
    }

    // ---------------------------------------------------------------------------
    
    public function destroy(Todo $todo){
        $todo->steps->each->delete();
        $todo->delete();
        return redirect()->back()->with('message', 'Task deleted!');
    }

    
}
