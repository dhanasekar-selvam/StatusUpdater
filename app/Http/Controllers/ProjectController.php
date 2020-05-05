<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Project; 


class ProjectController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $query = Project::query();

        $query->when(isset($request->search), function ($query) use ($request) {
            return $query->where('title', 'like', '%'.trim($request->search).'%'); 
        });

        $projects = $query->paginate(100);
        $projects->appends(request()->query()); 

        return view('projects.list', compact(['projects']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project = new Project();

        return view('projects.add', compact(['project']));
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
            $project = new Project();
        } else {
            // editing  existing record
            $project = Project::find($request->id); // fetch a single record from db 
        }

        //DB table col name/////////// HTML form input name/////////
        $project->title          = $request->title; 
        $project->desc         = $request->desc; 
        $project->client_id      = $request->client_id; 
        ////////////////////////
        $project->save(); 

        return redirect(route('projects.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);

        return view('projects.view', compact(['project']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id); // getting a record using primary key 
        
        return view('projects.add', compact(['project']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $project = Project::find($id);

        if (!empty($project->id)) {

            $project->delete();

        }

        return redirect(route('projects.index'));
    }
    
}
