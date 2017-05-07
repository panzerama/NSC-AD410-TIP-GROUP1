<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminReportController extends Controller
{
    /**
     * Displays default tips dashboard, with default report
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //write the sql query for the default info
        $tips = DB::table('TIPS')->get()->toJson();
        
        //return response
        return view('reports.index', $tips);
    }
    
    /**
     * Given an incoming Request, pass into tips fucntion and pass the results
     * of the db call into view.
     *
     * @param  Request $search
     * @return \Illuminate\Http\Response
     */
    public function show($request)
    {
        //From the data in the request, run a search
        //TipsSearch::apply($request)
        //Conditions for empty results sets
        //          for filters not being set or no post data
        //          for issues contacting DB or errors upstream
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
