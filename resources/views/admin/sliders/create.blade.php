@extends('admin.sliders.layout')

@section('slider.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('sliders.index', compact([])) }}"> Slider</a></li>
                    <li class="breadcrumb-item">@lang('Create new')</li>
                </ol>
            </div>

            <div class="card-body">
                <form action="{{ route('sliders.store', []) }}" method="POST" class="m-0 p-0" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        <div class="mb-3">
        <label for="title" class="form-label">Title:</label>
        <input type="text" name="title" id="title" class="form-control" value="{{@old('title')}}" required/>
        @if($errors->has('title'))
			<div class='error small text-danger'>{{$errors->first('title')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="author" class="form-label">Author:</label>
        <input type="text" name="author" id="author" class="form-control" value="{{@old('author')}}" required/>
        @if($errors->has('author'))
			<div class='error small text-danger'>{{$errors->first('author')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="topic" class="form-label">Topic:</label>
        <input type="text" name="topic" id="topic" class="form-control" value="{{@old('topic')}}" required/>
        @if($errors->has('topic'))
			<div class='error small text-danger'>{{$errors->first('topic')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="slider_image" class="form-label">Slider Image:(1500x840)</label>
        <input type="file" name="slider_image" id="slider_image" class="form-control" />
        @if($errors->has('slider_image'))
			<div class='error small text-danger'>{{$errors->first('slider_image')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="slider_thumbnail" class="form-label">Slider Thumbnail:(200x200)</label>
        <input type="file" name="slider_thumbnail" id="slider_thumbnail" class="form-control" />
        @if($errors->has('slider_thumbnail'))
			<div class='error small text-danger'>{{$errors->first('slider_thumbnail')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description:</label>
        <textarea name="description" id="description" class="tinymce-editor form-control" required>{{@old('description')}}</textarea>
        @if($errors->has('description'))
			<div class='error small text-danger'>{{$errors->first('description')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="read_more_url" class="form-label">Read More Url:</label>
        <input type="text" name="read_more_url" id="read_more_url" class="form-control" value="{{@old('read_more_url')}}" required/>
        @if($errors->has('read_more_url'))
			<div class='error small text-danger'>{{$errors->first('read_more_url')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="slider_visible" class="form-label">Slider Visible:</label>
        <select name="slider_visible" id="slider_visible" class="form-control form-select" required>

    @foreach(["yes" => "Yes", "no" => "No"] as $value => $label )
        <option value="{{ $value }}" {{ @old('slider_visible') == $value ? "selected" : "" }}>{{ $label }}</option>
    @endforeach
</select>
        @if($errors->has('slider_visible'))
			<div class='error small text-danger'>{{$errors->first('slider_visible')}}</div>
		@endif
    </div>

                    </div>

                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('sliders.index', []) }}" class="btn btn-light">@lang('Cancel')</a>
                            <button type="submit" class="btn btn-primary">@lang('Create new Slider')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdn.tiny.cloud/1/nxaat0k12qrac7emabulkowje3bf6qe34hdcndf55dv4zkru/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',

            image_class_list: [
                {title: 'img-responsive', value: 'img-responsive'},
            ],
            height: 500,
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
            },
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste imagetools"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image ",

            image_title: true,
            automatic_uploads: true,
            images_upload_url: '/upload',
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                };
                input.click();
            }
        });
    </script>
@endsection
