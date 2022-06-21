@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.project.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route("admin.projects.update", [$project->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group {{ $errors->has('project_name') ? 'has-error' : '' }}">
                    <label for="name">{{ trans('cruds.project.fields.name') }}*</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($project) ? $project->name : '') }}" required>
                    @if($errors->has('name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.project.fields.name_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('contract') ? 'has-error' : '' }}">
                    <label for="contract">{{ trans('cruds.project.fields.contract') }}*</label>
                    <input type="text" id="contract" name="contract" class="form-control" value="{{ old('contract', isset($project) ? $project->contract : '') }}" required>
                    @if($errors->has('contract'))
                        <em class="invalid-feedback">
                            {{ $errors->first('contract') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.project.fields.contract_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('start_date') ? 'has-error' : '' }}">
                    <label for="start_date">{{ trans('cruds.project.fields.start_date') }}*</label>
                    <input type="text" id="start_date" name="start_date" class="form-control date" value="{{ old('start_date', isset($project) ? $project->start_date : '') }}" required>
                    @if($errors->has('start_date'))
                        <em class="invalid-feedback">
                            {{ $errors->first('start_date') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.project.fields.start_date_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('end_date') ? 'has-error' : '' }}">
                    <label for="end_date">{{ trans('cruds.project.fields.end_date') }}*</label>
                    <input type="text" id="end_date" name="end_date" class="form-control date" value="{{ old('end_date', isset($project) ? $project->end_date : '') }}" required>
                    @if($errors->has('end_date'))
                        <em class="invalid-feedback">
                            {{ $errors->first('end_date') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.project.fields.end_date_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('appr_amount') ? 'has-error' : '' }}">
                    <label for="appr_amount">{{ trans('cruds.project.fields.appr_amount') }}*</label>
                    <input type="number" id="appr_amount" name="appr_amount" class="form-control" value="{{ old('appr_amount', isset($project) ? $project->appr_amount : '') }}" required>
                    @if($errors->has('appr_amount'))
                        <em class="invalid-feedback">
                            {{ $errors->first('appr_amount') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.project.fields.appr_amount_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('cost_amount') ? 'has-error' : '' }}">
                    <label for="cost_amount">{{ trans('cruds.project.fields.cost_amount') }}*</label>
                    <input type="number" id="cost_amount" name="cost_amount" class="form-control" value="{{ old('cost_amount', isset($project) ? $project->cost_amount : '') }}" required>
                    @if($errors->has('cost_amount'))
                        <em class="invalid-feedback">
                            {{ $errors->first('cost_amount') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.project.fields.cost_amount_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label for="description">{{ trans('cruds.project.fields.description') }}*</label>
                    <input type="text" id="description" name="description" class="form-control" value="{{ old('description', isset($project) ? $project->description : '') }}" required>
                    @if($errors->has('description'))
                        <em class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.project.fields.description_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                    <label for="status">{{ trans('cruds.project.fields.status') }}*</label>
                    <input type="text" id="status" name="status" class="form-control" value="{{ old('status', isset($project) ? $project->status : '') }}" required>
                    @if($errors->has('status'))
                        <em class="invalid-feedback">
                            {{ $errors->first('status') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.project.fields.status_helper') }}
                    </p>
                </div>
                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>


        </div>
    </div>
@endsection
