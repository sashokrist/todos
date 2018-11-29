<?php

namespace App\Http\Controllers;

use App\ToDo;
use http\Env\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;

class TodosController extends Controller
{
    public function index(){
        $todos = ToDo::all();
        return view('todos')->with('todos', $todos);
    }

    public function store(Request $request){
        $todo = new ToDo();
        $todo->todo = $request->todo;
        $todo->save();
        Session::flash('success', 'Yor todo was created.');
        return redirect('todos');
    }
    public function delete($id){
        $todo = ToDo::find($id);
        $todo->delete();
        Session::flash('success', 'Yor todo was deleted.');
        return redirect('todos');
    }

    public function update($id){
        $todo = ToDo::find($id);
        return view('update')->with('todo', $todo);
    }

    public function save(Request $request, $id){
        $todo = ToDo::find($id);
        $todo->todo = $request->todo;
        $todo->save();
        Session::flash('success', 'Yor todo was updated.');
        return redirect('todos');
    }

    public function completed($id){
        $todo = ToDo::find($id);
        $todo->completed = 1;
        $todo->save();
        Session::flash('success', 'Yor todo was completed.');
        return redirect('todos');

    }

    public function clear(){
        DB::table('to_dos')->delete();
        Session::flash('success', 'Todo is cleared.');
        return redirect('todos');
    }
}
