@extends('admin.molecule.layout')

@section('molecules.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                <ol class="breadcrumb m-0 p-0 flex-grow-1 mb-2 mb-md-0">
                    <li class="breadcrumb-item"><a href="{{ route('assays.index') }}"> Assay Methods</a>
                    </li>
                </ol>

                <form action="{{ route('assays.index', []) }}" method="GET" class="m-0 p-0">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm me-2" name="search"
                               placeholder="Search Assay Methods..." value="{{ request()->search }}">
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-sm" type="submit"><i class="fa fa-search"></i> @lang('Go!')</button>
                        </span>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-striped table-responsive table-hover">
                    <thead role="rowgroup">
                    <tr role="row">
                        <th role='columnheader'>Method ID</th>
                        <th role='columnheader'>Method Name</th>
                        <th role='columnheader'>Created By</th>
                        <th scope="col" data-label="Actions">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($assay as $assaySingle)
                        <tr>
                            <td >{{ $assaySingle->assay_method_id ?: "(blank)" }}</td>
                            <td >{{ $assaySingle->assay_method_name ?: "(blank)" }}</td>
                            <td >{{ $assaySingle->userCreatedBy->name ?: "(blank)" }}</td>

                            <td data-label="Actions:" class="text-nowrap">
                                <a class="btn btn-success"
                                   href="{{route('assays.edit', $assaySingle->id)}}">@lang('Edit')</a>
                                <form action="{{route('assays.destroy', $assaySingle->id)}}" method="POST"
                                      style="display: inline;" class="m-0 p-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">@lang('Delete')</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
            <div class="text-center my-2">
                <a href="{{ route('assays.create', []) }}" class="btn btn-primary"><i
                        class="fa fa-plus"></i> @lang('Create new Assay Method')</a>
            </div>
        </div>
    </div>
@endsection
