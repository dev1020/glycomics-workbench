<div class="tab-pane fade shadow rounded bg-white p-3"
     id="v-pills-references" role="tabpanel"
     aria-labelledby="v-pills-references-tab">
    <h4 class="font-italic mb-4">References</h4>
    <hr>
    <div class="mb-3">
        <label for="molecule_reference_reviews" class="form-label">Reviews:</label>
        <textarea name="molecule_reference_reviews" placeholder="After each reference, insert the next one in the next line; select most recent 5 refs."
                  id="molecule_reference_reviews"
                  class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_reference_reviews', $molecule->molecule_reference_reviews)}}</textarea>
        @if($errors->has('molecule_reference_reviews'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_reference_reviews')}}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="molecule_reference_primary_citations" class="form-label">Primary citations:</label>
        <textarea name="molecule_reference_primary_citations" placeholder="After each reference, insert the next one in the next line; select most recent 15 refs."
                  id="molecule_reference_primary_citations"
                  class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_reference_primary_citations', $molecule->molecule_reference_primary_citations)}}</textarea>
        @if($errors->has('molecule_reference_primary_citations'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_reference_primary_citations')}}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="molecule_reference_www_resources" class="form-label">WWW resources:</label>
        <textarea name="molecule_reference_www_resources"
                  id="molecule_reference_www_resources"
                  class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_reference_www_resources', $molecule->molecule_reference_www_resources)}}</textarea>
        @if($errors->has('molecule_reference_www_resources'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_reference_www_resources')}}</div>
        @endif
    </div>

</div>
