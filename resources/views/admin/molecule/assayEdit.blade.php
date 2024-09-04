@extends('admin.molecule.layout')

@section('molecules.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('assays.index') }}"> Assays</a></li>
                    <li class="breadcrumb-item">@lang('Edit Page') #{{$assay->id}}</li>
                </ol>
            </div>
            <div class="card-body">
                <form action="{{ route('assays.update', compact('assay')) }}" method="POST" class="m-0 p-0">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Method ID:</label>
                            <input type="text" name="assay_method_id" id="title" class="form-control"
                                   value="{{@old('assay_method_id', $assay->assay_method_id)}}" required/>
                            @if($errors->has('assay_method_id'))
                                <div class='error small text-danger'>{{$errors->first('assay_method_id')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Method Name:</label>
                            <input type="text" name="assay_method_name" id="title" class="form-control"
                                   value="{{@old('assay_method_name', $assay->assay_method_name)}}" required/>
                            @if($errors->has('assay_method_name'))
                                <div class='error small text-danger'>{{$errors->first('assay_method_name')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="assay_method_details" class="form-label">Assay Method Details:</label>
                            <textarea name="assay_method_details"
                                      id="assay_method_details"
                                      class="tinymce form-control"
                            >{{@old('assay_method_details', $assay->assay_method_details)}}</textarea>
                            @if($errors->has('assay_method_details'))
                                <div
                                    class='error small text-danger'>{{$errors->first('assay_method_details')}}</div>
                            @endif
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('assays.index', []) }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-primary">@lang('Update Page')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
    <script>
        $(function () {
            tinymce.init({
                selector: '.tinymce',
                menubar: false,
                extended_valid_elements: 'span',
                content_css: "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css",
                content_css_cors: true,
                height: 200,
                plugins: 'code lists link',
                toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | link ',
                convert_urls: false,
            });
        })
    </script>
@endsection
