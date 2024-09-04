@extends('admin.pages.layout')

@section('pages.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                <ol class="breadcrumb m-0 p-0 flex-grow-1 mb-2 mb-md-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','pages']) }}"> Pages</a></li>
                </ol>

                <form action="{{ route('pages.index', []) }}" method="GET" class="m-0 p-0">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm me-2" name="search"
                               placeholder="Search Pages..." value="{{ request()->search }}">
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
                        <th role='columnheader'>Title</th>
                        <th role='columnheader'>Meta Keywords</th>
                        <th role='columnheader'>Meta Description</th>
                        <th role='columnheader'>Slug</th>
                        <th role='columnheader'>Body</th>
                        <th scope="col" data-label="Actions">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pages as $page)
                        <tr>
                            <td data-label="Title">{{ $page->title ?: "(blank)" }}</td>
                            <td data-label="Meta Keywords">{{ $page->meta_keywords ?: "(blank)" }}</td>
                            <td data-label="Meta Description">{{ $page->meta_description ?: "(blank)" }}</td>
                            <td data-label="Slug">{{ $page->slug ?: "(blank)" }}</td>
                            <td data-label="Body">{{ Str::limit($page->body, 50) ?: "(blank)"}}</td>

                            <td data-label="Actions:" class="text-nowrap">
                                @if($page->trashed())
                                    <form action="{{ route('pages.restore', ['page' => $page]) }}" method="POST"
                                          class="d-inline-block me-2">
                                        @csrf
                                        @method('PUT')
                                        <input type="submit" name="restore" value="@lang('Restore')"
                                               class="btn btn-success btn-sm"/>
                                    </form>
                                    <form action="{{ route('pages.purge', ['page' => $page]) }}" method="POST"
                                          class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" name="purge" value="@lang('Purge')"
                                               class="btn btn-danger btn-sm"/>
                                    </form>
                                @else
                                    <a href="{{route('pages.show', compact('page'))}}" type="button"
                                       class="btn btn-primary btn-sm me-1">@lang('Show')</a>
                                    <div class="btn-group btn-group-sm">
                                        <button type="button" class="btn btn-light dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="fa fa-cog"></i></button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                   href="{{route('pages.edit', compact('page'))}}">@lang('Edit')</a>
                                            </li>
                                            <li>
                                                <form action="{{route('pages.destroy', compact('page'))}}" method="POST"
                                                      style="display: inline;" class="m-0 p-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item">@lang('Delete')</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>

                                @endif

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $pages->withQueryString()->links() }}
            </div>
            <div class="text-center my-2">
                <a href="{{ route('pages.create', []) }}" class="btn btn-primary"><i
                        class="fa fa-plus"></i> @lang('Create new Page')</a>
            </div>
        </div>
    </div>
@endsection
