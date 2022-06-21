<?php

namespace App\Http\Controllers\Admin;

use App\Laboure;
use App\Project;
use App\ProjectExpense;
use App\ProjectExpenseCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ProjectExpenseController extends Controller
{

    public function index()
    {
        $expenses=ProjectExpense::with('projectName','catName')->get();
        return view('admin.projectExpense.index',compact('expenses'));
    }


    public function create()
    {
        $projects=Project::all()->pluck('name','id')->prepend(trans('global.pleaseSelect'),'');;
        $categories=ProjectExpenseCategory::all()->pluck('name','id')->prepend(trans('global.pleaseSelect'),'');;
        $labourers=Laboure::all()->pluck('name','id')->prepend(trans('global.pleaseSelect'),'');;
        return view('admin.projectExpense.create',compact('projects','categories','labourers'));
    }


    public function store(Request $request)
    {
        $expense=new ProjectExpense();
        $expense->pro_id=$request->pro_id;
        $expense->cat_id=$request->cat_id;
        $expense->entry_date=$request->entry_date;
        $expense->amount=$request->amount;
        $expense->bank_name=$request->bank_name;
        $expense->cheque=$request->cheque;
        $expense->note=$request->note;
        $expense->paid_by=Auth::user()->id;
        $expense->received_by=$request->received_by;
        $expense->save();
        return redirect()->route('admin.project-expense.index');
    }

    public function show($id)
    {
        $expense=ProjectExpense::with('projectname','catname','userName')->find($id);
        return view('admin.projectExpense.show',compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expense=ProjectExpense::with('projectname','catname','userName')->find($id);
        //return $expense;
        $projects=Project::all()->pluck('name','id')->prepend(trans('global.pleaseSelect'),'');
        $labourers=Laboure::all()->pluck('name','id')->prepend(trans('global.pleaseSelect'),'');
        $categories=ProjectExpenseCategory::all()->pluck('name','id')->prepend(trans('global.pleaseSelect'),'');
        return view('admin.projectExpense.edit',compact('expense','projects','categories','labourers'));
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
