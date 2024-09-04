<div class="tab-pane fade shadow rounded bg-white p-3"
     id="v-pills-transcript" role="tabpanel"
     aria-labelledby="v-pills-transcript-tab">
    <h4 class="font-italic mb-4">Transcript</h4>
    <hr>
    <div class="mb-3">
        <label for="molecule_transcript_sequence_links"
               class="form-label">Transcript sequence links:</label>
        <textarea name="molecule_transcript_sequence_links"
                  id="molecule_transcript_sequence_links"
                  class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_transcript_sequence_links', $molecule->molecule_transcript_sequence_links)}}</textarea>
        @if($errors->has('molecule_transcript_sequence_links'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_transcript_sequence_links')}}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="molecule_post_translational_modification"
               class="form-label">Post-transcriptional
            modification:</label>
        <textarea name="molecule_post_translational_modification"
                  id="molecule_post_translational_modification"
                  class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_post_translational_modification', $molecule->molecule_post_translational_modification)}}</textarea>
        @if($errors->has('molecule_post_translational_modification'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_post_translational_modification')}}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="molecule_transcript_annotation" class="form-label">Transcript
            annotation:</label>
        <textarea name="molecule_transcript_annotation"
                  id="molecule_transcript_annotation"
                  class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_transcript_annotation', $molecule->molecule_transcript_annotation)}}</textarea>
        @if($errors->has('molecule_transcript_annotation'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_transcript_annotation')}}</div>
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
@push('tab-scripts')
    <script>

    </script>
@endpush
