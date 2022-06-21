@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ $project->name ?? '' }}
        </div>

        <div class="card-body">
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.project.title') }}
                        </th>
                        <td>
                            {{ $project->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.contract') }}
                        </th>
                        <td>
                            {{ $project->contract ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.start_date') }}
                        </th>
                        <td>
                            {{ $project->start_date ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.end_date') }}
                        </th>
                        <td>
                            {{ $project->end_date ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.appr_amount') }}
                        </th>
                        <td>
                            {{ $project->appr_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.cost_amount') }}
                        </th>
                        <td>
                            {{ $project->cost_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.description') }}
                        </th>
                        <td>
                            {{ $project->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.status') }}
                        </th>
                        <td>
                            {{ $project->status ?? '' }}
                        </td>
                    </tr>

                    </tbody>
                </table>
                <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>


        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Expense List
                </div>

                <div class="card-body">
                    <div class="mb-2">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>

                                <th>
                                    {{ trans('cruds.project_expense_category.title') }}
                                </th>
                                <th>
                                    {{ trans('cruds.projectExpense.fields.amount') }}
                                </th>
                                <th>Date</th>
                                <th>Paid By</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($project->expense as $cost)
                                <tr>
                                    <td>
                                        <a href="{{route('admin.project-expense.show',$cost->id)}}"> {{ $cost->catName->name }}</a>
                                    </td>
                                    <td>
                                        {{ $cost->amount }}
                                    </td>
                                    <td>
                                        {{ $cost->entry_date }}
                                    </td>
                                    <td>
                                        {{ $cost->userName->name }}
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div class="card-header">
                            <b>Total cost</b> = {{$expensesTotal}}
                        </div>
                        <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Received List
                </div>

                <div class="card-body">
                    <div class="mb-2">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>
                                    {{ trans('cruds.projectReceived.fields.entry_date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.projectReceived.fields.amount') }}
                                </th>
                                <th>
                                    {{ trans('cruds.projectReceived.fields.paid') }}
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($project->received as $cost)
                                <tr>
                                    <td>
                                        {{ $cost->entry_date}}
                                    </td>

                                    <td>
                                        <a href="{{route('admin.project-received.show',$cost->id)}}"> {{$cost->amount}}</a>
                                    </td>
                                    <td>
                                        {{ $cost->user->name }}
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div class="card-header">
                            <b>Total Received</b> = {{$receivedTotal}}
                        </div>
                        <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <b>Profit = {{$profit}}</b>
        </div>
    </div>
@endsection
