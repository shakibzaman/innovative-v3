@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.projectReceived.title_singular') }}
        </div>
        <div class="card-body">
            <form action="{{ route("admin.project-received.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('project_name') ? 'has-error' : '' }}">
                    <label for="expense_category">{{ trans('cruds.project.title') }}</label>
                    <select name="pro_id" id="pro_id" class="form-control select2">
                        @foreach($projects as $id => $project)
                            <option value="{{ $project->id }}" {{ $received->pro_id == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('project_name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('project_name') }}
                        </em>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('entry_date') ? 'has-error' : '' }}">
                    <label for="entry_date">{{ trans('cruds.projectReceived.fields.entry_date') }}*</label>
                    <input type="date" id="entry_date" name="entry_date" value="{{ old('entry_date', isset($received) ? $received->entry_date : '') }}" class="form-control date" required>
                    @if($errors->has('entry_date'))
                        <em class="invalid-feedback">
                            {{ $errors->first('entry_date') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.projectReceived.fields.entry_date_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
                    <label for="amount">{{ trans('cruds.projectReceived.fields.amount') }}*</label>
                    <input type="number" id="amount" name="amount" class="form-control" value="{{ old('amount', isset($received) ? $received->amount : '') }}" step="1" required>
                    @if($errors->has('amount'))
                        <em class="invalid-feedback">
                            {{ $errors->first('amount') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.projectReceived.fields.amount_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('bank_name') ? 'has-error' : '' }}">
                    <label for="bank_name">{{ trans('cruds.projectReceived.fields.bank_name') }}</label>
                    <input type="text" id="bank_name" name="bank_name" class="form-control" value="{{ old('bank_name', isset($received) ? $received->bank_name : '') }}">
                    @if($errors->has('bank_name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('bank_name') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.projectReceived.fields.bank_name_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('cheque') ? 'has-error' : '' }}">
                    <label for="cheque">{{ trans('cruds.projectReceived.fields.cheque') }}</label>
                    <input type="text" id="cheque" name="cheque" class="form-control" value="{{ old('cheque', isset($received) ? $received->cheque : '') }}">
                    @if($errors->has('cheque'))
                        <em class="invalid-feedback">
                            {{ $errors->first('cheque') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.projectReceived.fields.cheque_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('note') ? 'has-error' : '' }}">
                    <label for="note">{{ trans('cruds.projectReceived.fields.note') }}</label>
                    <input type="text" id="note" name="note" class="form-control" value="{{ old('note', isset($received) ? $received->note : '') }}">
                    @if($errors->has('note'))
                        <em class="invalid-feedback">
                            {{ $errors->first('note') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.projectReceived.fields.note_helper') }}
                    </p>
                </div>
                <div class="form-group ">
                    <label for="received"></label>
                    <input type="hidden" id="received" name="received" class="form-control">
                </div>
                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>


        </div>
    </div>
@endsection
