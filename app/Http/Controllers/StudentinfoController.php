<?php

namespace App\Http\Controllers;

use App\Models\studentinfo;
use Illuminate\Http\Request;

class StudentinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('docent.studentinfo');
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
     * @param  \App\Models\studentinfo  $studentinfo
     * @return \Illuminate\Http\Response
     */
    public function show(studentinfo $studentinfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\studentinfo  $studentinfo
     * @return \Illuminate\Http\Response
     */
    public function edit(studentinfo $studentinfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\studentinfo  $studentinfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, studentinfo $studentinfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\studentinfo  $studentinfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(studentinfo $studentinfo)
    {
        //
    }
}
