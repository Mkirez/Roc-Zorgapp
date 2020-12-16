<?php

namespace App\Http\Controllers;

use App\Models\urenregistratie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UrenregistratieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ureninfo = Urenregistratie::all();

        return view('student.urenregistratie', ['ureninfo' => $ureninfo]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     echo'yo';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $input = $request->all();

        // print_r($input);

        // exit();

        Urenregistratie::create($this->validateProject());
        

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\urenregistratie  $urenregistratie
     * @return \Illuminate\Http\Response
     */
    public function show(urenregistratie $ureninfo)
    {
        $ureninfo = Urenregistratie::all()->where('ureninfoid',$ureninfo);

        return view('student.urenregistratie',['urenregistraties' => $ureninfo]);
        
    }

    /** 
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\urenregistratie  $urenregistratie
     * @return \Illuminate\Http\Response
     */
    public function edit(urenregistratie $ureninfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\urenregistratie  $urenregistratie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, urenregistratie $ureninfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\urenregistratie  $urenregistratie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sql = "DELETE FROM urenregistraties WHERE id=$id";

        $profile = DB::update($sql);
        
        return back();
        
    }

    protected function validateProject()
    {
        return request()->validate([
            'description' => 'required',
            'time' => 'required',
            'date' => 'required',
            
        ]);
        
    }
}
