@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.key_tool.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route("admin.keys.store") }}" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="form-group {{ $errors->has('machine_name') ? 'has-error' : '' }}">
                    <label for="machine_name">{{ trans('cruds.key_tool.fields.machine_name') }}*</label>
                    <input type="text" id="machine_name" name="machine_name" class="form-control" value="{{ old('machine_name', isset($keys) ? $keys->machine_name : '') }}" required>
                    @if($errors->has('machine_name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('machine_name') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.key_tool.fields.machine_name_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('key') ? 'has-error' : '' }}">
                    <label for="key">{{ trans('cruds.key_tool.fields.key') }}*</label>
                    <input type="text" id="key" name="key" class="form-control" value="{{ old('key', isset($keys) ? $keys->key : '') }}" required>
                    @if($errors->has('key'))
                        <em class="invalid-feedback">
                            {{ $errors->first('key') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.key_tool.fields.key_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
                    <label for="user_id">{{ trans('cruds.key_tool.fields.user') }}*</label>
                    <select class="form-control" name="user_id">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('user_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('user_id') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.key_tool.fields.user_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
                    <label for="is_active">{{ trans('cruds.key_tool.fields.is_active.name') }}*</label>
                    <select class="form-control" name="is_active">
                        <option value="1">{{ trans('cruds.key_tool.fields.is_active.1') }}</option>
                        <option value="0">{{ trans('cruds.key_tool.fields.is_active.0') }}</option>
                    </select>
                    @if($errors->has('is_active'))
                        <em class="invalid-feedback">
                            {{ $errors->first('is_active') }}
                        </em>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('expired_at') ? 'has-error' : '' }}">
                    <label for="is_active">{{ trans('cruds.key_tool.fields.expired_at') }}*</label>
                    <input class="form-control" id="expired_at" type="date" name="expired_at" placeholder="date">
                    @if($errors->has('expired_at'))
                        <em class="invalid-feedback">
                            {{ $errors->first('expired_at') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.key_tool.fields.expired_at_helper') }}
                    </p>
                </div>

                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>
@endsection