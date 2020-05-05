<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Dev; 


class DevController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $query = Dev::query();

        $query->when(isset($request->search), function ($query) use ($request) {
            return $query->where('title', 'like', '%'.trim($request->search).'%'); 
        });

        $devs = $query->paginate(100);
        $devs->appends(request()->query()); 

        return view('devs.list', compact(['devs']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dev = new Dev();

        return view('devs.add', compact(['dev']));
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
            $dev = new Dev();
        } else {
            // editing  existing record
            $dev = Dev::find($request->id); // fetch a single record from db 
        }

        //DB table col name/////////// HTML form input name/////////
        $dev->name          = $request->name; 
        $dev->email           = $request->email; 
        ////////////////////////
        $dev->save(); 

        return redirect(route('devs.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dev = Dev::find($id);

        return view('devs.view', compact(['dev']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dev = Dev::find($id); // getting a record using primary key 
        
        return view('devs.add', compact(['dev']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $dev = Dev::find($id);

        if (!empty($dev->id)) {

            $dev->delete();

        }

        return redirect(route('devs.index'));
    }
    
}
