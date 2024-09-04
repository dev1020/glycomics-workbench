@extends('front.molecule.layout')
@section('molecule.content')
    <div class=" h-custom">
        <div class="row d-flex justify-content-center h-100">

            <!-- Main Content Area -->
            <main class="col-md-9 col-lg-12 px-md-4" style="min-height: 50vh">

                <div class="pt-3 pb-2 mb-3 border-bottom">
                    <ol class="breadcrumb m-0 p-0 flex-grow-1 mb-2 mb-md-0">
                        <li class="breadcrumb-item"><a href="{{ implode('/', ['','home']) }}"> Home
                            </a></li>
                        <li class="breadcrumb-item"> Molecule List</li>
                    </ol>

                </div>

                <div class="card">
                    <div class="card-header d-flex flex-column flex-md-row align-items-md-center justify-content-between">

                        <h3>Molecule List </h3>
                        <form action="{{ route('molecules.index', []) }}" method="GET" class="m-0 p-0">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm me-2" name="search"
                                       placeholder="Search Molecules..." value="{{ request()->search }}">
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
                                <th role='columnheader'>Authors</th>
                                <th role='columnheader'>Reviewers</th>
                                <th role='columnheader'>GW-ID</th>
                                <th role='columnheader'>Created At</th>
                                <th role='columnheader'>Status</th>
                                <th scope="col" data-label="Actions">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($molecules)>0)
                            @foreach($molecules as $molecule)
                                <tr>
                                    <td data-label="Title">{{ $molecule->molecule_main_title ?: "(blank)" }}</td>
                                    <td data-label="Authors">{{ $molecule->molecule_author ?: "(blank)" }}</td>
                                    <td data-label="Reviewers">{{ $molecule->molecule_reviewers ?: "(blank)" }}</td>
                                    <td data-label="GW-ID">{{ $molecule->molecule_gw_id ?: "(blank)" }}</td>
                                    <td data-label="Created">{!! date('jS \<b>M Y\</b> ', strtotime($molecule->created_at)) !!}</td>
                                    <td data-label="Status">{{ $molecule->molecule_status ?: "(blank)" }}</td>

                                    <td data-label="Actions:" class="text-nowrap">
                                        @if($molecule->trashed())
                                            <form action="{{ route('pages.restore', ['molecule' => $molecule]) }}" method="POST"
                                                  class="d-inline-block me-2">
                                                @csrf
                                                @method('PUT')
                                                <input type="submit" name="restore" value="@lang('Restore')"
                                                       class="btn btn-success btn-sm"/>
                                            </form>
                                            <form action="{{ route('pages.purge', ['molecule' => $molecule]) }}" method="POST"
                                                  class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" name="purge" value="@lang('Purge')"
                                                       class="btn btn-danger btn-sm"/>
                                            </form>
                                        @else
                                            <a href="{{route('molecules.show', compact('molecule'))}}" type="button"
                                               class="btn btn-primary btn-sm me-1">@lang('Show')</a>
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" class="btn btn-light dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="fa fa-cog"></i></button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item"
                                                           href="{{route('molecules.edit', compact('molecule'))}}">@lang('Edit')</a>
                                                    </li>
                                                    <li>
                                                        <form action="{{route('molecules.destroy', compact('molecule'))}}" method="POST"
                                                              style="display: inline;" class="m-0 p-0">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item">@lang('Delete')</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                            <a target="_blank" href="{{route('molecules.showPdf', compact('molecule'))}}" type="button"
                                               class="btn btn-primary btn-sm me-1"><i class="fa fa-download"></i></a>

                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5" class="text-center">No Data to show</td>
                            </tr>
                            @endif
                            </tbody>
                        </table>


                    </div>
                    <div class="text-center my-2">
                        <a href="{{ route('molecules.create', []) }}" class="btn btn-primary"><i
                                class="fa fa-plus"></i> @lang('Create new Molecule')</a>
                    </div>
                </div>
            </main>

        </div>
    </div>
@endsection



