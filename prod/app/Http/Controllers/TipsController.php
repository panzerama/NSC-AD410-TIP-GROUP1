<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\question;
use App\answer;
use App\tip;
use App\tips_questions;
use App\DB;
class TipsController extends Controller
{

    public function index()
    {
        
        return view('tips/index'); // Returns view for tips/index.blade.php
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = question::all();
        $answers = answer::all();
        // dd($questions);
        // dd($answers);
        return view('tips/create', compact('questions', 'answers')); // Returns view for tips/create.blade.php
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $tip = tip::where('tips_id','=',1)->get();
        $answers = question::all();
        return view('tips/show',compact('tip','answers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
