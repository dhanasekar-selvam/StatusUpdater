<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Task; 
use App\Dev; 

class TaskController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $query = Task::query();

        $query->when(isset($request->search), function ($query) use ($request) {
            return $query->where('title', 'like', '%'.trim($request->search).'%'); 
        });
        // $query->when( isset($request->status), function ($query) use ($request) {
        //     return $query->where('status', '=', (int) $request->status);
        // });

        $tasks = $query->paginate(100);
        $tasks->appends(request()->query()); 

        foreach($tasks as $task){
             
             $dev = Dev::find($task->assigned_to);
             if($dev!=null){
                $task->assigned_to_name = $dev->name;
             } else{
                 $task->assigned_to_name = '';
             }
             
        }

        return view('tasks.list', compact(['tasks']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task();

        // TODO: get the devs from db 
        // 1. fetch from db
        $devs = Dev::all();

        // 2. set in views

        return view('tasks.add', compact(['task','devs']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 
        if (empty($request->id)) {
            // new recornd
            $task = new Task();
        } else {
            // editing  existing record
            $task = Task::find($request->id); // fetch a single record from db 
        }

        //DB table col name/////////// HTML form input name/////////
        $task->dev_id         = $request->dev_id;   
        $task->project_id     = $request->project_id;  
        $task->title          = $request->title; 
        $task->desc           = $request->desc; 
        $task->status         = $request->status;  
        $task->eta            = $request->eta;  
        ////////////////////////
        $task->save(); 

        return redirect(route('tasks.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);

        return view('tasks.view', compact(['task']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id); // getting a record using primary key 
        
        // TODO: get the devs from db 
        // 1. fetch from db
        $devs = Dev::all();

        // 2. set in views
        return view('tasks.add', compact(['task','devs']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $task = Task::find($id);

        if (!empty($task->id)) {

            $task->delete();

        }

        return redirect(route('tasks.index'));
    }
    
}
