<?php

namespace App\Http\Controllers\Admin;

use App\Project;
use App\ProjectExpenseCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Gate;

class ProjectExpenseCategoryController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('project_expense_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $projectsExpenseCategories=ProjectExpenseCategory::all();
        return view('admin.projectExpenseCategory.index',compact('projectsExpenseCategories'));
    }


    public function create()
    {
        abort_if(Gate::denies('project_expense_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.projectExpenseCategory.create');
    }


    public function store(Request $request)
    {
        abort_if(Gate::denies('project_expense_category_store'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $projectsExpenseCategories=ProjectExpenseCategory::create($request->all());
        return redirect()->route('admin.project-expense-category.index');
    }

    public function show($id)
    {
    $projectExpenseCategory=ProjectExpenseCategory::find($id);
    //return $projectExpenseCategory;
    return view('admin.projectExpenseCategory.show',compact('projectExpenseCategory'));
    }

    public function edit($id)
    {
        abort_if(Gate::denies('project_expense_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $projectsExpenseCategories=ProjectExpenseCategory::find($id);
        return view('admin.projectExpenseCategory.edit',compact('projectsExpenseCategories'));



    }

    public function update(Request $request, $id)
    {
        abort_if(Gate::denies('project_expense_category_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $projectsExpenseCategories=ProjectExpenseCategory::find($id);
        $projectsExpenseCategories->name=$request->name;
        $projectsExpenseCategories->save();
        return redirect()->route('admin.project-expense-category.index');


    }


    public function destroy($id)
    {
        //
    }
}
