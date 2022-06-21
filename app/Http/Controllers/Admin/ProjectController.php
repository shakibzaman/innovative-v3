<?php

namespace App\Http\Controllers\Admin;

use App\Project;
use App\Laboure;
use App\ProjectExpense;
use App\ProjectExpenseCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ProjectController extends Controller
{

    public function index()
    {
        $projects=Project::all();
        return view('admin.projects.index',compact('projects'));
    }


    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $project=Project::create($request->all());
        return redirect()->route('admin.projects.index');
    }

    public function show($id)
    {
        $project=Project::with('expense.catName','expense.userName','received.user')->find($id);
        $projectCat=DB::table('laboures')
            ->join('project_expenses','laboures.id','=','project_expenses.received_by')
            ->join('projects','projects.id','=','project_expenses.pro_id')
            ->join('project_expense_categories','project_expense_categories.id','=','project_expenses.cat_id')
            ->select('project_expense_categories.*','project_expenses.*')
            ->where('projects.id','=',$id)
            ->get();

//        $laboures=Project::with('receivedBy')->find($id);
        $expensesTotal   = $project->expense()->sum('amount');
       $receivedTotal   = $project->received()->sum('amount');
       $profit          = $receivedTotal-$expensesTotal;
        return view('admin.projects.show',compact('project','expensesTotal','receivedTotal','profit','projectCat'));
    }

    public function edit($id)
    {
        $project=Project::find($id);
        return view('admin.projects.edit',compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project=Project::find($id);
        $project->name=$request->name;
        $project->contract=$request->contract;
        $project->start_date=$request->start_date;
        $project->end_date=$request->end_date;
        $project->appr_amount=$request->appr_amount;
        $project->cost_amount=$request->cost_amount;
        $project->description=$request->description;
        $project->status=$request->status;
        $project->save();
        return view('admin.projects.index',compact('project'));
    }

    public function destroy($id)
    {
        //
    }
}
