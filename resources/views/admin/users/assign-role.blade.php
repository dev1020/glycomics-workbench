@extends('admin.users.layout')

@section('users.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','roles']) }}"> Roles</a></li>
                    <li class="breadcrumb-item">@lang('User') : #{{$user->name}}</li>
                </ol>
            </div>
            <div class="card-body">
                <form action="{{ route('assignRoleToUser',['userId'=>$user->id]) }}" method="POST" class="m-0 p-0">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Assign Roles To <strong>{{$user->name}}</strong>:</label>
                        </div>
                        <div class="row">
                            @foreach($roles as $role)

                                <div class="col-2">
                                    <input type="checkbox"
                                           name="roles[]"
                                           value="{{$role->name}}"
                                        {{in_array($role->id,$userRoles)?'checked':''}}
                                    />
                                    {{$role->name}}
                                </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('roles.index', []) }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-primary">@lang('Save permissions')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
