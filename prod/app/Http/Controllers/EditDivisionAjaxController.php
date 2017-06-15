<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use DB;
use App\division;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class EditDivisionAjaxController extends Controller
{
    
    public function index(){
        return  division::where('is_active',true)->get();
    }
    
    public function show($id){
        //$answers = answer::withoutGlobalScopes()->where('question_id',$id)->where('is_active',false)->get();
        return $answers;
    }
    
    public function store(Request $request){
        $division_id = request('division_id');
        $division_name = request('division_name');
        $abbr = request('abbr');
        
        DB::table('divisions')->insert(['division_id' => $division_id,
                                      'division_name' => $division_name,
                                      'abbr' => $abbr,
                                      'is_active'   => true]);
    }    
    
    
    
    public function update(Request $request){
        $division_id = request('division_id');
        $division_name = request('division_name');
        $abbr = request('abbr');

        DB::table('divisions')->where('division_id',$division_id)->update(['division_name' => $division_name, 'abbr' => $abbr]);
    
    }
    
    public function destroy(Request $request){
        $division_id = request('division_id');
        DB::table('divisions')->where('division_id',$division_id)->update(['is_active' => false]);    
    }
}
