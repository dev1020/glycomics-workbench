@extends('admin.users.layout')

@section('users.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','users']) }}"> Users</a></li>
                    <li class="breadcrumb-item">@lang('Edit User') #{{$user->id}}</li>
                </ol>
            </div>
            <div class="card-body">
                <form action="{{ route('users.update', compact('user')) }}" method="POST" class="m-0 p-0">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" name="name" id="name" class="form-control"
                                   value="{{@old('name', $user->name)}}" required/>
                            @if($errors->has('name'))
                                <div class='error small text-danger'>{{$errors->first('name')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" name="email" id="email" class="form-control"
                                   value="{{@old('email', $user->email)}}" required/>
                            @if($errors->has('email'))
                                <div class='error small text-danger'>{{$errors->first('email')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Two Factor Auth:</label>
                        <select name="two_factor_auth" id="page_layout" class="form-control form-select" required>

                                    @foreach(["yes" => "Yes", "no" => "No"] as $value => $label )
                                        <option value="{{ $value }}" {{ @old('two_factor_auth') == $value ? "selected" : "" }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('two_factor_auth'))
                                    <div class='error small text-danger'>{{$errors->first('two_factor_auth')}}</div>
                                @endif
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('users.index', []) }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-primary">@lang('Update User')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
