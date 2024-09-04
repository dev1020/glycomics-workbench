<div class="tab-pane fade shadow rounded bg-white p-3"
     id="v-pills-systemview" role="tabpanel"
     aria-labelledby="v-pills-systemview-tab">
    <h4 class="font-italic mb-4">System View</h4>
    <hr>
    <div class="mb-3">
        <label for="molecule_clinical_significance" class="form-label">Clinical significance:</label>
        <textarea name="molecule_clinical_significance"
                  id="molecule_clinical_significance"
                  class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_clinical_significance', $molecule->molecule_clinical_significance)}}</textarea>
        @if($errors->has('molecule_clinical_significance'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_clinical_significance')}}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="molecule_disease_relevance" class="form-label">Disease
            relevance/Function in vivo:</label>
        <textarea name="molecule_disease_relevance"
                  id="molecule_disease_relevance"
                  class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_disease_relevance', $molecule->molecule_disease_relevance)}}</textarea>
        @if($errors->has('molecule_disease_relevance'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_disease_relevance')}}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="molecule_cellular_function" class="form-label">Cellular
            function:</label>
        <textarea name="molecule_cellular_function"
                  id="molecule_cellular_function"
                  class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_cellular_function', $molecule->molecule_cellular_function)}}</textarea>
        @if($errors->has('molecule_cellular_function'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_cellular_function')}}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="molecule_protein_location" class="form-label">Protein
            location:</label>
        <textarea name="molecule_protein_location"
                  id="molecule_protein_location"
                  class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_protein_location', $molecule->molecule_protein_location)}}</textarea>
        @if($errors->has('molecule_protein_location'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_protein_location')}}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="molecule_cellular_expression" class="form-label">Cellular
            expression:</label>
        <textarea name="molecule_cellular_expression"
                  id="molecule_cellular_expression"
                  class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_cellular_expression', $molecule->molecule_cellular_expression)}}</textarea>
        @if($errors->has('molecule_cellular_expression'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_cellular_expression')}}</div>
        @endif
    </div>

    <div class="row mb-3">
        <div class="col-lg-3 text-center">
            <a class="btn btn-success btnPrev px-lg-5 "><i
                    class="fa fa-arrow-left-long"></i> Prev</a>
        </div>
        <div class="col-lg-3 offset-6 text-center">
            <a class="btn btn-primary btnNext px-lg-5">Next <i
                    class="fa fa-arrow-right-long"></i></a>
        </div>
    </div>
</div>
