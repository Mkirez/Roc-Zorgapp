<?php

namespace App\Http\Controllers;

use App\Models\Studentgegevens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentgegevensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // docent.inzagepunt is de url die het opzoekt. 
    // inzagepunt is wat het gaat gebruiken in de blade.
    
    public function index()
    {
        $studentgegevens = Studentgegevens::all();

        return view('docent.studentgegevens', ['studentgegevens' => $studentgegevens]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Studentgegevens  $studentgegevens
     * @return \Illuminate\Http\Response
     */
    public function show(Studentgegevens $studentgegevens)
    {
        $studentgegevens = Studentgegevens::all()->where('Studentgegevensid',$studentgegevens);

        return view('docent.studentinfo',['studentinfo' => $studentgegevens]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Studentgegevens  $studentgegevens
     * @return \Illuminate\Http\Response
     */
    public function edit(Studentgegevens $studentgegevens)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Studentgegevens  $studentgegevens
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Studentgegevens $studentgegevens)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Studentgegevens  $studentgegevens
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sql = "DELETE FROM studentgegevens WHERE id=$id";

        $profile = DB::update($sql);
        
        return redirect('studentgegevens');
    }
}
