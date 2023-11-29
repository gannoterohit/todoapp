<?php

namespace App\Http\Controllers;

use App\Models\todoapp;
use Illuminate\Http\Request;

class todoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = todoapp::query();

        // Check if a status filter has been applied
        if ($request->has('status') && in_array($request->status, ['pending', 'completed','progress'])) {
            $query->where('status', $request->status);
        }
    
        $model = $query->paginate(10); // Adjust the pagination number as needed
    

        return view('tasklist', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->all();
        $model = new todoapp();

        $model->title = $data['title'];
        $model->description = $data['description'];
        $model->due_date = $data['date'];
        $model->status = $data['status'];

        $model->save();

        return view('create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = todoapp::find($id);

        return view('show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = todoapp::find($id);
        // dd($todo);
        return view('edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $data = $request->all();
        // $id = $data['id'];
        $model = todoapp::find($id);

        $model->title = $data['title'];
        $model->description = $data['description'];
        $model->due_date = $data['date'];
        $model->status = $data['status'];

        $model->save();

        return redirect('/todo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = todoapp::find($id);
        $data->delete();
        return redirect('/todo');
    }
}
