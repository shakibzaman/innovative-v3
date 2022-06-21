@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.projectExpense.title') }}
        </div>

        <div class="card-body">
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.projectExpense.fields.id') }}
                        </th>
                        <td>
                            {{ $expense->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.title_singular') }}
                        </th>
                        <td>
                            {{ $expense->projectName->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expenseCategory.title_singular') }}
                        </th>
                        <td>
                            {{ $expense->catName->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projectExpense.fields.entry_date') }}
                        </th>
                        <td>
                            {{ $expense->entry_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projectExpense.fields.amount') }}
                        </th>
                        <td>
                            {{ $expense->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projectExpense.fields.bank_name') }}
                        </th>
                        <td>
                            {{ $expense->bank_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projectExpense.fields.cheque') }}
                        </th>
                        <td>
                            {{ $expense->cheque }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projectExpense.fields.paid') }}
                        </th>
                        <td>
                            {{ $expense->userName->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projectExpense.fields.received_by') }}
                        </th>
                        <td>
                            {{ $expense->received_by }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projectExpense.fields.note') }}
                        </th>
                        <td>
                            {{ $expense->note }}
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
@endsection
