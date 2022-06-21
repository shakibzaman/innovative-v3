@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.projectExpense.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route("admin.project-expense.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('project_name') ? 'has-error' : '' }}">
                    <label for="expense_category">{{ trans('cruds.project.title') }}</label>
                    <select name="pro_id" id="pro_id" class="form-control select2">
                        @foreach($projects as $id => $project)
                            <option value="{{ $id }}" >{{ $project }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('project_name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('project_name') }}
                        </em>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('cat_name') ? 'has-error' : '' }}">
                    <label for="expense_category">{{ trans('cruds.project_expense_category.title') }}</label>
                    <select name="cat_id" id="cat_id" class="form-control select2">
                        @foreach($categories as $id => $category)
                            <option value="{{ $id }} " >{{ $category }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('cat_name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('cat_name') }}
                        </em>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('entry_date') ? 'has-error' : '' }}">
                    <label for="entry_date">{{ trans('cruds.projectExpense.fields.entry_date') }}*</label>
                    <input type="text" id="entry_date" name="entry_date" class="form-control date" required>
                    @if($errors->has('entry_date'))
                        <em class="invalid-feedback">
                            {{ $errors->first('entry_date') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.expense.fields.entry_date_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
                    <label for="amount">{{ trans('cruds.projectExpense.fields.amount') }}*</label>
                    <input type="number" id="amount" name="amount" class="form-control" value="{{ old('amount', isset($expense) ? $expense->amount : '') }}" step="0.01" required>
                    @if($errors->has('amount'))
                        <em class="invalid-feedback">
                            {{ $errors->first('amount') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.expense.fields.amount_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('bank_name') ? 'has-error' : '' }}">
                    <label for="bank_name">{{ trans('cruds.projectExpense.fields.bank_name') }}</label>
                    <input type="text" id="bank_name" name="bank_name" class="form-control" >
                    @if($errors->has('bank_name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('bank_name') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.expense.fields.description_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('cheque') ? 'has-error' : '' }}">
                    <label for="cheque">{{ trans('cruds.projectExpense.fields.cheque') }}</label>
                    <input type="text" id="cheque" name="cheque" class="form-control" >
                    @if($errors->has('cheque'))
                        <em class="invalid-feedback">
                            {{ $errors->first('cheque') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.expense.fields.description_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('note') ? 'has-error' : '' }}">
                    <label for="note">{{ trans('cruds.projectExpense.fields.note') }}</label>
                    <input type="text" id="note" name="note" class="form-control" >
                    @if($errors->has('note'))
                        <em class="invalid-feedback">
                            {{ $errors->first('note') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.expense.fields.description_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('received_by') ? 'has-error' : '' }}">
                    <label for="received_by">{{ trans('cruds.projectExpense.fields.received_by') }}</label>
                    <select name="received_by" id="received_by" class="form-control select2">
                        @foreach($labourers as $id => $labourer)
                            <option value="{{ $id }}" >{{ $labourer }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('received_by'))
                        <em class="invalid-feedback">
                            {{ $errors->first('received_by') }}
                        </em>
                    @endif
                </div>
                <div class="form-group ">
                    <label for="paid_by"></label>
                    <input type="hidden" id="paid_by" name="paid_by" class="form-control">
                </div>
                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>


        </div>
    </div>
@endsection
