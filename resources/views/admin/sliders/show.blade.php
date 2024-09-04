@extends('admin.sliders.layout')

@section('slider.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('sliders.index', compact([])) }}"> Slider</a></li>
                    <li class="breadcrumb-item">@lang('Slider') #{{$slider->id}}</li>
                </ol>

                <a href="{{ route('sliders.index', []) }}" class="btn btn-light"><i class="fa fa-caret-left"></i> Back</a>
            </div>

            <div class="card-body">
                <table class="table table-striped">
    <tbody>
    <tr>
        <th scope="row">ID:</th>
        <td>{{$slider->id}}</td>
    </tr>
    <tr>
        <th scope="row">Slider Image:</th>
        <td><img src="{{asset($slider->slider_image ?: "(blank)" )}}" style="width:80px; border:1px solid #e0e0e0"></td>
    </tr>
    <tr>
        <th scope="row">Slider Thumbnail:</th>
        <td><img src="{{asset($slider->slider_thumbnail ?: "(blank)" )}}" style="width:40px"></td>
    </tr>
            <tr>
            <th scope="row">Title:</th>
            <td>{{ $slider->title ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Author:</th>
            <td>{{ $slider->author ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Topic:</th>
            <td>{{ $slider->topic ?: "(blank)" }}</td>
        </tr>

            <tr>
            <th scope="row">Description:</th>
            <td>{{ Str::limit($slider->description, 50) ?: "(blank)"}}</td>
        </tr>
            <tr>
            <th scope="row">Read More Url:</th>
            <td>{{ $slider->read_more_url ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Slider Visible:</th>
            <td>{{ $slider->slider_visible ?: "(blank)" }}</td>
        </tr>
            </tbody>
</table>

            </div>

            <div class="card-footer d-flex flex-column flex-md-row align-items-center justify-content-end">
                <a href="{{ route('sliders.edit', compact('slider')) }}" class="btn btn-info text-nowrap me-1"><i class="fa fa-edit"></i> @lang('Edit')</a>
                <form action="{{ route('sliders.destroy', compact('slider')) }}" method="POST" class="m-0 p-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger text-nowrap"><i class="fa fa-trash"></i> @lang('Delete')</button>
                </form>
            </div>
        </div>
    </div>
@endsection
