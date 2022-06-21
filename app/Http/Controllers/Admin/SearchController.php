<?php

namespace App\Http\Controllers\Admin;

use App\Project;
use App\ProjectExpenseCategory;
use App\ProjectExpense;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects=Project::all();
        return view('admin.search.searchByCat',compact('projects'));
    }

    public function findCatName(Request $id){

        //dd( $id );
        //dd( $_POST('id') ); 
        // $postID = $id;
        $postID = $_GET['id'];
        // $postID = 1;
        //exit;
        DB::enableQueryLog();
        $data=DB::table('project_expense_categories')
            ->join('project_expenses','project_expense_categories.id','=','project_expenses.cat_id')
            ->join('projects','projects.id','=','project_expenses.pro_id')
            //->join('project_expense_categories','project_expense_categories.id','=','project_expenses.cat_id')
            ->select('project_expense_categories.*','project_expenses.*')
            ->where('projects.id','=',$postID)
            ->get();

            // dd(DB::getQueryLog());
        

            return response()->json($data);
    }
    public function findExpName(Request $id){

        //dd( $id );
        //dd( $_POST('id') ); 
        // $postID = $id;
         $postID = $_GET['id'];
        // return $postID;
        // exit;
        $data=ProjectExpense::select('*')->where('cat_id','=',$postID)->get();
        //return ($data) ;

            return response()->json($data);
    }

}
