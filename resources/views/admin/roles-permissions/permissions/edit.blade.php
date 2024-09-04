@extends('admin.roles-permissions.permissions.layout')

@section('permissions.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','permissions']) }}"> Permissions</a></li>
                    <li class="breadcrumb-item">@lang('Edit Permission') #{{$permission->id}}</li>
                </ol>
            </div>
            <div class="card-body">
                <form action="{{ route('permissions.update', compact('permission')) }}" method="POST" class="m-0 p-0">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" name="name" id="name" class="form-control" value="{{@old('name', $permission->name)}}" required/>
        @if($errors->has('name'))
			<div class='error small text-danger'>{{$errors->first('name')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="guard_name" class="form-label">Guard Name:</label>
        <input type="text" name="guard_name" id="guard_name" class="form-control" value="{{@old('guard_name', $permission->guard_name)}}" required/>
        @if($errors->has('guard_name'))
			<div class='error small text-danger'>{{$errors->first('guard_name')}}</div>
		@endif
    </div>

                    </div>
                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('permissions.index', []) }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-primary">@lang('Update Permission')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
