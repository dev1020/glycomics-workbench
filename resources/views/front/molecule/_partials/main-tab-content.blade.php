
<div class="tab-pane fade shadow rounded bg-white p-3"
     id="v-pills-main" role="tabpanel"
     aria-labelledby="v-pills-main-tab">
    <h4 class="font-italic mb-4">Molecule ID - {{$molecule->id}}</h4>
    <hr>
    <div class="mb-3">
        <label for="meta_keywords" class="form-label">Main
            Title:</label>
        <input type="text" name="molecule_main_title"
               id="molecule_main_title" class="form-control track"
               value="{{@old('molecule_main_title',$molecule->molecule_main_title)}}"
               required/>
        @if($errors->has('molecule_main_title'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_main_title')}}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="meta_description" class="form-label">Molecule
            Author:</label>
        <input type="text" name="molecule_author" id="molecule_author"
               class="form-control track"
               value="{{@old('molecule_author',$molecule->molecule_author)}}"
               required/>
        @if($errors->has('molecule_author'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_author')}}</div>
        @endif
    </div>

    <div class="mb-3">
        <label for="body" class="form-label">Reviewers:</label>
        <input type="text" name="molecule_reviewers"
               id="molecule_reviewers"
               class="form-control track"
               value="{{@old('molecule_reviewers',$molecule->molecule_reviewers)}}"
               required/>
        @if($errors->has('molecule_reviewers'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_reviewers')}}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="body" class="form-label">GW ID: (By Admin)</label>
        <input disabled type="text" name="molecule_gw_id"
               id="molecule_gw_id"
               class="form-control"
               value="{{@old('molecule_gw_id',$molecule->molecule_gw_id)}}"
               />
        @if($errors->has('molecule_gw_id'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_gw_id')}}</div>
        @endif
    </div>
    <div class="">
        <div class="col-lg-3 offset-9">
            <a class="btn btn-primary btnNext px-lg-5">Next <i
                    class="fa fa-arrow-right-long"></i></a>

        </div>

    </div>
</div>
