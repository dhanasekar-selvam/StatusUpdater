<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Client; 
use App\User; 

class ClientController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $query = Client::query();

        $query->when(isset($request->search), function ($query) use ($request) {
            return $query->where('name', 'like', '%'.trim($request->search).'%'); 
        });

        $clients = $query->paginate(100);
        $clients->appends(request()->query()); 

        return view('clients.list', compact(['clients']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = new Client();

        return view('clients.add', compact(['client']));
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
            $client = new Client();
        } else {
            // editing  existing record
            $client = Client::find($request->id); // fetch a single record from db 
        }

        //DB table col name/////////// HTML form input name/////////
        $client->name          = $request->name; 
        $client->email         = $request->email; 
        ////////////////////////
        $client->save(); 

        return redirect(route('clients.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);

        return view('clients.view', compact(['client']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id); // getting a record using primary key 
        
        return view('clients.add', compact(['client']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $client = Client::find($id);

        if (!empty($client->id)) {

            $client->delete();

        }

        return redirect(route('clients.index'));
    }
    
}
