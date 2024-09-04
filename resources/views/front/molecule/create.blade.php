@extends('front.molecule.layout')

@section('molecule.content')
    <div class="container">
        <div class=" h-custom">
            <div class="row d-flex justify-content-center h-100">

                <!-- Main Content Area -->
                <main class="col-md-9 col-lg-12 px-md-4" style="min-height: 50vh">

                    <div class="pt-3 pb-2 mb-3 border-bottom">
                        <ol class="breadcrumb m-0 p-0 flex-grow-1 mb-2 mb-md-0">
                            <li class="breadcrumb-item"><a href="{{ implode('/', ['','home']) }}"> Home
                                </a></li>
                            <li class="breadcrumb-item"><a href="{{ implode('/', ['','molecule']) }}"> Molecule
                                    List</a></li>
                        </ol>

                    </div>
                    <div class="card">
                        <div class="card-header d-flex flex-row align-items-center justify-content-between">
                            <h3>New Molecule Entry</h3>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('molecules.store', []) }}" method="POST" class="m-0 p-0">
                                <div class="card-body">
                                    @csrf


                                    <div class="mb-3">
                                        <label for="meta_keywords" class="form-label">Main Title:</label>
                                        <input type="text" name="molecule_main_title" id="molecule_main_title" class="form-control"
                                               value="{{@old('molecule_main_title')}}" required/>
                                        @if($errors->has('molecule_main_title'))
                                            <div
                                                class='error small text-danger'>{{$errors->first('molecule_main_title')}}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="meta_description" class="form-label">Molecule Author:</label>
                                        <input type="text" name="molecule_author" id="molecule_author"
                                               class="form-control"
                                               value="{{@old('molecule_author')}}" required/>
                                        @if($errors->has('molecule_author'))
                                            <div
                                                class='error small text-danger'>{{$errors->first('molecule_author')}}</div>
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="body" class="form-label">Reviewers:</label>
                                        <input type="text" name="molecule_reviewers" id="molecule_reviewers"
                                               class="form-control"
                                               value="{{@old('molecule_reviewers')}}" required/>
                                        @if($errors->has('molecule_reviewers'))
                                            <div
                                                class='error small text-danger'>{{$errors->first('molecule_reviewers')}}</div>
                                        @endif
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <div class="d-flex flex-row align-items-center justify-content-between">
                                        <a href="{{ route('pages.index', []) }}"
                                           class="btn btn-light">@lang('Cancel')</a>
                                        <button type="submit" class="btn btn-primary">@lang('Save Molecule and Edit Details')</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

@endsection
