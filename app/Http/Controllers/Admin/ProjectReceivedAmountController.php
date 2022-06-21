<?php

namespace App\Http\Controllers\Admin;

use App\Contracter;
use App\Project;
use App\ProjectAmountReceive;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProjectReceivedAmountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receiveds = ProjectAmountReceive::with('contractor','projectName')->get();
//        return $receiveds;
        return view('admin.projectReceivedAmount.index',compact('receiveds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all();
        $contracts = Contracter::all();
        return view('admin.projectReceivedAmount.create',compact('contracts','projects'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $received = new ProjectAmountReceive();
        $received->pro_id = $request->pro_id;
        $received->entry_date = $request->entry_date;
        $received->amount = $request->amount;
        $received->bank_name = $request->bank_name;
        $received->cheque = $request->cheque;
        $received->note = $request->note;
        $received->paid_by = $request->paid_by;
        $received->received = Auth::user()->id;
        $receivedStore = $received->save();
        if($receivedStore)
        {
            Session::flash('message', 'Project Amount Received successfully.');
            return redirect()->route('admin.project-received.index');
        }
        else{
            Session::flash('errorMessage', 'Project Amount Received Failed');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $received = ProjectAmountReceive::with('contractor','projectName','user')->find($id);
        return view('admin.projectReceivedAmount.show',compact('received'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projects = Project::all();
        $contracts = Contracter::all();
        $received = ProjectAmountReceive::with('contractor','projectName','user')->find($id);
        return view('admin.projectReceivedAmount.edit',compact('received','projects','contracts'));

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
        $received = ProjectAmountReceive::with('contractor','projectName','user')->find($id);
        $received->pro_id = $request->pro_id;
        $received->entry_date = $request->entry_date;
        $received->amount = $request->amount;
        $received->bank_name = $request->bank_name;
        $received->cheque = $request->cheque;
        $received->note = $request->note;
        $received->updated_by = Auth::user()->id;
        $receivedStore = $received->save();
        if($receivedStore)
        {
            Session::flash('message', 'Project Amount Update successfully.');
            return redirect()->route('admin.project-received.index');
        }
        else{
            Session::flash('errorMessage', 'Project Amount Received Failed');
            return redirect()->back();
        }
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
