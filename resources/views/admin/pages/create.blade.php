@extends('admin.pages.layout')

@section('pages.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','pages']) }}"> Pages</a></li>
                    <li class="breadcrumb-item">@lang('Create new')</li>
                </ol>
            </div>

            <div class="card-body">
                <form action="{{ route('pages.store', []) }}" method="POST" class="m-0 p-0">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-8">
                                <label for="title" class="form-label">Title:</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{@old('title')}}"
                                       required/>
                                @if($errors->has('title'))
                                    <div class='error small text-danger'>{{$errors->first('title')}}</div>
                                @endif
                            </div>
                            <div class="mb-3 col-4">
                                <label for="page_layout" class="form-label">Page Layout:</label>
                                <select name="page_layout" id="page_layout" class="form-control form-select" required>

                                    @foreach(["blank-page" => "Blank", "sidebar-left" => "Left Sidebar","sidebar-right" => "Right Sidebar","home" => "Home layout"] as $value => $label )
                                        <option value="{{ $value }}" {{ @old('slider_visible') == $value ? "selected" : "" }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('page_layout'))
                                    <div class='error small text-danger'>{{$errors->first('page_layout')}}</div>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="meta_keywords" class="form-label">Meta Keywords:</label>
                            <input type="text" name="meta_keywords" id="meta_keywords" class="form-control"
                                   value="{{@old('meta_keywords')}}" required/>
                            @if($errors->has('meta_keywords'))
                                <div class='error small text-danger'>{{$errors->first('meta_keywords')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="meta_description" class="form-label">Meta Description:</label>
                            <input type="text" name="meta_description" id="meta_description" class="form-control"
                                   value="{{@old('meta_description')}}" required/>
                            @if($errors->has('meta_description'))
                                <div class='error small text-danger'>{{$errors->first('meta_description')}}</div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="body" class="form-label">Body:</label>
                            <textarea name="body" id="body" class=" tinymce-editor form-control" required>{{@old('body')}}</textarea>
                            @if($errors->has('body'))
                                <div class='error small text-danger'>{{$errors->first('body')}}</div>
                            @endif
                        </div>



                    </div>

                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('pages.index', []) }}" class="btn btn-light">@lang('Cancel')</a>
                            <button type="submit" class="btn btn-primary">@lang('Create new Page')</button>
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
            extended_valid_elements: 'span',
            image_class_list: [
                {title: 'img-responsive', value: 'img-responsive'},
            ],
            height: 500,
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
            },
            content_css: "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css",
            content_css_cors: true,
            plugins: [
                "template",
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste imagetools"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | template",
            templates: [{
                "title": "2 columns",
                "description": "Insert on the page, 2 columns with the same width",
                "content": "<div class=\"row\"><div class=\"col-4\">Column 1</div><div class=\"col-8\">Column 2</div></div>"
            },
                {
                    "title": "3 columns",
                    "description": "Insert on the page, 3 columns with the same width",
                    "content": "<div class=\"row\"><div class=\"col\">Column 1</div><div class=\"col\">Column 2</div><div class=\"col\">Column 3</div></div>"
                },

            ],
            relative_urls: false,
            remove_script_host: true,
            image_title: true,
            automatic_uploads: true,
            images_upload_url: '<?= url('/admin/pages/uploadImagesTinymce') ?>',
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
