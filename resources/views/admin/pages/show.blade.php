@extends('admin.pages.layout')

@section('pages.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','pages']) }}"> Pages</a></li>
                    <li class="breadcrumb-item">@lang('Page') #{{$page->id}}</li>
                </ol>

                <a href="{{ route('pages.index', []) }}" class="btn btn-light"><i class="fa fa-caret-left"></i> Back</a>
            </div>

            <div class="card-body">
                <table class="table table-striped">
    <tbody>
    <tr>
        <th scope="row">ID:</th>
        <td>{{$page->id}}</td>
    </tr>
            <tr>
            <th scope="row">Title:</th>
            <td>{{ $page->title ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Meta Keywords:</th>
            <td>{{ $page->meta_keywords ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Meta Description:</th>
            <td>{{ $page->meta_description ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Slug:</th>
            <td>{{ $page->slug ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Body:</th>
            <td>{{ Str::limit($page->body, 50) ?: "(blank)"}}</td>
        </tr>
                <tr>
            <th scope="row">Created at</th>
            <td>{{Carbon\Carbon::parse($page->created_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        <tr>
            <th scope="row">Updated at</th>
            <td>{{Carbon\Carbon::parse($page->updated_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        </tbody>
</table>

            </div>

            <div class="card-footer d-flex flex-column flex-md-row align-items-center justify-content-end">
                <a href="{{ route('pages.edit', compact('page')) }}" class="btn btn-info text-nowrap me-1"><i class="fa fa-edit"></i> @lang('Edit')</a>
                <form action="{{ route('pages.destroy', compact('page')) }}" method="POST" class="m-0 p-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger text-nowrap"><i class="fa fa-trash"></i> @lang('Delete')</button>
                </form>
            </div>
        </div>
    </div>
@endsection
