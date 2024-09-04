@extends('admin.sliders.layout')

@section('slider.content')
    <div class="row">
        <div class="container">

            <div class="card">
            <div class="card-header d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                <ol class="breadcrumb m-0 p-0 flex-grow-1 mb-2 mb-md-0">
                    <li class="breadcrumb-item"><a href="{{ route('sliders.index', compact([])) }}"> Slider</a></li>
                </ol>

                <form action="{{ route('sliders.index', []) }}" method="GET" class="m-0 p-0">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm me-2" name="search" placeholder="Search Slider..." value="{{ request()->search }}">
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
                    <th role='columnheader'>Image</th>
                    <th role='columnheader'>Thumb</th>
                    <th role='columnheader'>Title</th>
                    <th role='columnheader'>Author</th>
                    <th role='columnheader'>Topic</th>
                    <th role='columnheader'>Description</th>
                    <th role='columnheader'>Read More Url</th>
                    <th role='columnheader'>IsVisible</th>
                <th scope="col" data-label="Actions">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($slider as $slider)
        <tr>
                            <td data-label="Slider Image"><img src="{{asset($slider->slider_image ?: "(blank)" )}}" style="width:80px"></td>
                            <td data-label="Slider Thumbnail"><img src="{{asset($slider->slider_thumbnail ?: "(blank)" )}}" style="width:40px"></td>
                            <td data-label="Title">{{ $slider->title ?: "(blank)" }}</td>
                            <td data-label="Author">{{ $slider->author ?: "(blank)" }}</td>
                            <td data-label="Topic">{{ $slider->topic ?: "(blank)" }}</td>

                            <td data-label="Description">{{ Str::limit($slider->description, 50) ?: "(blank)"}}</td>
                            <td data-label="Read More Url">{{ $slider->read_more_url ?: "(blank)" }}</td>
                            <td data-label="Slider Visible">{{ $slider->slider_visible ?: "(blank)" }}</td>

            <td data-label="Actions:" class="text-nowrap">
                                   <a href="{{route('sliders.show', compact('slider'))}}" type="button" class="btn btn-primary btn-sm me-1">@lang('Show')</a>
<div class="btn-group btn-group-sm">
    <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i></button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{route('sliders.edit', compact('slider'))}}">@lang('Edit')</a></li>
        <li>
            <form action="{{route('sliders.destroy', compact('slider'))}}" method="POST" style="display: inline;" class="m-0 p-0">
                @csrf
                @method('DELETE')
                <button type="submit" class="dropdown-item">@lang('Delete')</button>
            </form>
        </li>
    </ul>
</div>

                            </td>
        </tr>
    @endforeach
    </tbody>
</table>


            </div>
            <div class="text-center my-2">
                <a href="{{ route('sliders.create', []) }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('Create new Slider')</a>
            </div>
        </div>

        </div>
    </div>
@endsection
