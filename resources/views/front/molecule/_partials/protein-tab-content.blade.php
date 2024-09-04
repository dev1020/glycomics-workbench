<div class="tab-pane fade shadow rounded bg-white p-3"
     id="v-pills-protein" role="tabpanel"
     aria-labelledby="v-pills-protein-tab">
    <h4 class="font-italic mb-4">Protein</h4>
    <hr>
    <div class="mb-3">
        <label for="molecule_biochemical_activity" class="form-label">Biochemical Activities:</label>
        <textarea name="molecule_biochemical_activity"
                  id="molecule_biochemical_activity"
                  class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_biochemical_activity', $molecule->molecule_biochemical_activity)}}</textarea>
        @if($errors->has('molecule_biochemical_activity'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_biochemical_activity')}}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="molecule_protein_sequence_links" class="form-label">Protein sequence links:</label>
        <textarea name="molecule_protein_sequence_links"
                  id="molecule_protein_sequence_links"
                  class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_protein_sequence_links', $molecule->molecule_protein_sequence_links)}}</textarea>
        @if($errors->has('molecule_protein_sequence_links'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_protein_sequence_links')}}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="molecule_protein_sequence_annotation" class="form-label">Protein Sequence Annotation:</label>
        <textarea name="molecule_protein_sequence_annotation"
                  id="molecule_protein_sequence_annotation"
                  class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_protein_sequence_annotation', $molecule->molecule_protein_sequence_annotation)}}</textarea>
        @if($errors->has('molecule_protein_sequence_annotation'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_protein_sequence_annotation')}}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="molecule_protein_polymorphism" class="form-label">Protein polymorphism:</label>
        <textarea name="molecule_protein_polymorphism"
                  id="molecule_protein_polymorphism"
                  class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_protein_polymorphism', $molecule->molecule_protein_polymorphism)}}</textarea>
        @if($errors->has('molecule_protein_polymorphism'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_protein_polymorphism')}}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="molecule_protein_properties" class="form-label">Protein physical properties:</label>
        <textarea name="molecule_protein_properties"
                  id="molecule_protein_properties"
                  class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_protein_properties', $molecule->molecule_protein_properties)}}</textarea>
        @if($errors->has('molecule_protein_properties'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_protein_properties')}}</div>
        @endif
    </div>

    <div class="mb-3 ">
        <label class="form-label">Protein Modification:</label>
        <div class="p-3 card">
            <div class="row">
                <div class="col-lg-3">
                    <label for="molecule_protein_glycosylation" class="form-label">Glycosylation:</label>
                    <select name="molecule_protein_glycosylation" id="molecule_protein_glycosylation" class="form-control form-select track" >

                        @foreach([""=>"Select","yes" => "Yes", "no" => "No","dont" => "Don't Know"] as $value => $label )
                            <option value="{{ $value }}" {{ @old('molecule_protein_glycosylation',$molecule->molecule_protein_glycosylation) == $value ? "selected" : "" }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('molecule_protein_glycosylation'))
                        <div class='error small text-danger'>{{$errors->first('molecule_protein_glycosylation')}}</div>
                    @endif
                </div>
                <div class="col-lg-3">
                    <label for="molecule_protein_phosphorylation" class="form-label">Phosphorylation:</label>
                    <select name="molecule_protein_phosphorylation" id="molecule_protein_phosphorylation" class="form-control form-select track" >

                        @foreach([""=>"Select","yes" => "Yes", "no" => "No","dont" => "Don't Know"] as $value => $label )
                            <option value="{{ $value }}" {{ @old('molecule_protein_phosphorylation',$molecule->molecule_protein_phosphorylation) == $value ? "selected" : "" }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('molecule_protein_phosphorylation'))
                        <div class='error small text-danger'>{{$errors->first('molecule_protein_phosphorylation')}}</div>
                    @endif
                </div>
                <div class="col-lg-3">
                    <label for="molecule_protein_sulfation" class="form-label">Sulfation:</label>
                    <select name="molecule_protein_sulfation" id="molecule_protein_sulfation" class="form-control form-select track" >

                        @foreach([""=>"Select","yes" => "Yes", "no" => "No","dont" => "Don't Know"] as $value => $label )
                            <option value="{{ $value }}" {{ @old('molecule_protein_sulfation',$molecule->molecule_protein_sulfation) == $value ? "selected" : "" }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('molecule_protein_sulfation'))
                        <div class='error small text-danger'>{{$errors->first('molecule_protein_sulfation')}}</div>
                    @endif
                </div>
                <div class="col-lg-3">
                    <label for="molecule_protein_nitrosylation" class="form-label">Nitrosylation:</label>
                    <select name="molecule_protein_nitrosylation" id="molecule_protein_nitrosylation" class="form-control form-select track" >

                        @foreach([""=>"Select","yes" => "Yes", "no" => "No","dont" => "Don't Know"] as $value => $label )
                            <option value="{{ $value }}" {{ @old('molecule_protein_nitrosylation', $molecule->molecule_protein_nitrosylation) == $value ? "selected" : "" }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('molecule_protein_nitrosylation'))
                        <div class='error small text-danger'>{{$errors->first('molecule_protein_nitrosylation')}}</div>
                    @endif
                </div>

                <div class="col-lg-12 mt-3 ">
                    <label for="molecule_protein_other" class="form-label">Other:</label>
                    <textarea name="molecule_protein_other"
                              id="molecule_protein_other"
                              class="tinymce-editor form-control track-textarea"
                    >{{@old('molecule_protein_other', $molecule->molecule_protein_other)}}</textarea>
                    @if($errors->has('molecule_protein_other'))
                        <div
                            class='error small text-danger'>{{$errors->first('molecule_protein_other')}}</div>
                    @endif
                </div>
                <div class="col-lg-12 mt-3 ">
                    <label for="molecule_protein_comments_with_reference" class="form-label">Comments with reference:</label>
                    <textarea name="molecule_protein_comments_with_reference"
                              id="molecule_protein_comments_with_reference"
                              class="tinymce-editor form-control track-textarea"
                    >{{@old('molecule_protein_comments_with_reference', $molecule->molecule_protein_comments_with_reference)}}</textarea>
                    @if($errors->has('molecule_protein_comments_with_reference'))
                        <div
                            class='error small text-danger'>{{$errors->first('molecule_protein_comments_with_reference')}}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="mb-3 ">
        <label class="form-label">Protein structure links:</label>
        <div class="p-3 card">
            <div class="row">
                <div class="col-lg-6">
                    <label for="molecule_protein_pbdid" class="form-label">PBD ID/s :</label>
                    <input type="text" name="molecule_protein_pbdid" id="molecule_protein_pbdid"
                           class="form-control track"
                           value="{{@old('molecule_protein_pbdid',$molecule->molecule_protein_pbdid)}}"
                    />
                    @if($errors->has('molecule_protein_pbdid'))
                        <div
                            class='error small text-danger'>{{$errors->first('molecule_protein_pbdid')}}</div>
                    @endif
                </div>
                <div class="col-lg-6">
                    <label for="molecule_protein_pbdlink" class="form-label">PBD Link :</label>
                    <input type="text" name="molecule_protein_pbdlink" id="molecule_protein_pbdlink"
                           class="form-control track"
                           value="{{@old('molecule_protein_pbdlink',$molecule->molecule_protein_pbdlink)}}"
                    />
                    @if($errors->has('molecule_protein_pbdlink'))
                        <div
                            class='error small text-danger'>{{$errors->first('molecule_protein_pbdlink')}}</div>
                    @endif
                </div>
                <div class="col-lg-6">
                    <label for="molecule_protein_cazylink" class="form-label">CAZY link :</label>
                    <input type="text" name="molecule_protein_cazylink" id="molecule_protein_cazylink"
                           class="form-control track"
                           value="{{@old('molecule_protein_cazylink',$molecule->molecule_protein_cazylink)}}"
                    />
                    @if($errors->has('molecule_protein_cazylink'))
                        <div
                            class='error small text-danger'>{{$errors->first('molecule_protein_cazylink')}}</div>
                    @endif
                </div>
                <div class="col-lg-6">
                    <label for="molecule_protein_otherlink" class="form-label">Other Link :</label>
                    <input type="text" name="molecule_protein_otherlink" id="molecule_protein_otherlink"
                           class="form-control track"
                           value="{{@old('molecule_protein_otherlink',$molecule->molecule_protein_otherlink)}}"
                    />
                    @if($errors->has('molecule_protein_otherlink'))
                        <div
                            class='error small text-danger'>{{$errors->first('molecule_protein_otherlink')}}</div>
                    @endif
                </div>
            </div>
        </div>
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
