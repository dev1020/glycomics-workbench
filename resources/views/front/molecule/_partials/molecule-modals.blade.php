<!-- MODAL REQUIRED FOR Transcription regulating molecules STARTS-->
<div class="modal fade" id="regulatorModal"
     data-bs-backdrop="static" data-bs-keyboard="false"
     tabindex="-1" aria-labelledby="regulatorModalLabel"
     aria-hidden="true">

    <div
        class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="regulatorModalLabel">Add
                    Transcription regulating molecules</h5>
                <button type="button" class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="mtranscriptions">
                    @csrf
                    <input type="hidden" name="transcription_id" value="">
                    <div class="mb-3">
                        <label for="transcription_factors"
                               class="form-label">Transcription factors
                            :</label>
                        <input type="text" name="transcription_factors"
                               id="transcription_factors"
                               class="form-control"
                        />

                    </div>
                    <div class="mb-3">
                        <label for="transcription_comments"
                               class="form-label">Comments:</label>
                        <textarea name="transcription_comments"
                                  id="transcription_comments"
                                  class="tinymce form-control"
                        ></textarea>

                    </div>
                    <div class="mb-3">
                        <label for="transcription_references"
                               class="form-label">References:</label>
                        <textarea name="transcription_references"
                                  id="transcription_references"
                                  class="tinymce form-control"
                        ></textarea>

                    </div>
                    <div class="mb-3 regulator-msg">

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-2 col-sm-2">
                            <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close
                            </button>
                        </div>
                        <div class="col-lg-2 col-sm-2 offset-8">

                            <button id="btn-save-transcriptions" class="btn btn-primary ">Save</button>
                        </div>
                    </div>

                </form>
            </div>

        </div>

    </div>

</div>
<!-- MODAL ENDS-->
<!-- MODAL REQUIRED FOR Interactions Subtracts STARTS-->
<div class="modal fade" id="substratesModal"
     data-bs-backdrop="static" data-bs-keyboard="false"
     tabindex="-1" aria-labelledby="subtractsModalLabel"
     aria-hidden="true">

    <div
        class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="substratesModalLabel">Add
                    Substrates To molecules</h5>
                <button type="button" class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="msubstrates">
                    @csrf
                    <input type="hidden" name="substrate_id" value="">
                    <div class="mb-3">
                        <label for="transcription_factors"
                               class="form-label">Substrate
                            :</label>
                        <input type="text" name="molecular_substrate"
                               id="molecular_substrate"
                               class="form-control"
                        />

                    </div>
                    <div class="mb-3">
                        <label for="substrate_comments"
                               class="form-label">Comments:</label>
                        <textarea name="substrate_comments"
                                  id="substrate_comments"
                                  class="tinymce form-control"
                        ></textarea>

                    </div>
                    <div class="mb-3">
                        <label for="substrate_references"
                               class="form-label">References:</label>
                        <textarea name="substrate_references"
                                  id="substrate_references"
                                  class="tinymce form-control"
                        ></textarea>

                    </div>
                    <div class="mb-3 substrate-msg">

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-2 col-sm-2">
                            <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close
                            </button>
                        </div>
                        <div class="col-lg-2 col-sm-2 offset-8">

                            <button id="btn-save-substrates" class="btn btn-primary ">Save</button>
                        </div>
                    </div>

                </form>
            </div>

        </div>

    </div>

</div>
<!-- MODAL ENDS-->
<!-- MODAL REQUIRED FOR Animal Strains STARTS-->
<div class="modal fade" id="strainsModal"
     data-bs-backdrop="static" data-bs-keyboard="false"
     tabindex="-1" aria-labelledby="strainsModalLabel"
     aria-hidden="true">

    <div
        class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="strainsModalLabel">Add
                    Strains To molecules</h5>
                <button type="button" class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="mstrains">
                    @csrf
                    <input type="hidden" name="strain_id" value="">
                    <div class="mb-3">
                        <label for="molecule_species_or_strain"
                               class="form-label">Species or Strain
                            :</label>
                        <input type="text" name="molecule_species_or_strain"
                               id="molecule_species_or_strain"
                               class="form-control"
                        />

                    </div>
                    <div class="mb-3">
                        <label for="molecule_strain_supplier"
                               class="form-label">Supplier:</label>
                        <textarea name="molecule_strain_supplier"
                                  id="molecule_strain_supplier"
                                  class="tinymce form-control"
                        ></textarea>

                    </div>
                    <div class="mb-3">
                        <label for="molecule_strain_comment"
                               class="form-label">Comments:</label>
                        <textarea name="molecule_strain_comment"
                                  id="molecule_strain_comment"
                                  class="tinymce form-control"
                        ></textarea>

                    </div>
                    <div class="mb-3 strains-msg">

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-2 col-sm-2">
                            <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close
                            </button>
                        </div>
                        <div class="col-lg-2 col-sm-2 offset-8">

                            <button id="btn-save-strains" class="btn btn-primary ">Save</button>
                        </div>
                    </div>

                </form>
            </div>

        </div>

    </div>

</div>
<!-- MODAL ENDS-->
<!-- MODAL REQUIRED FOR Reagents STARTS-->
<div class="modal fade" id="reagentsModal"
     data-bs-backdrop="static" data-bs-keyboard="false"
     tabindex="-1" aria-labelledby="reagentsModalLabel"
     aria-hidden="true">

    <div
        class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="reagentsModalLabel">Add
                    Reagents To molecules</h5>
                <button type="button" class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="mreagents">
                    @csrf
                    <input type="hidden" name="reagent_id" value="">
                    <div class="mb-3">
                        <label for="molecule_reagent"
                               class="form-label">Reagent
                            :</label>
                        <input type="text" name="molecule_reagent"
                               id="molecule_reagent"
                               class="form-control"
                        />

                    </div>
                    <div class="mb-3">
                        <label for="molecule_reagent_supplier"
                               class="form-label">Supplier:</label>
                        <textarea name="molecule_reagent_supplier"
                                  id="molecule_reagent_supplier"
                                  class="tinymce form-control"
                        ></textarea>

                    </div>
                    <div class="mb-3">
                        <label for="molecule_reagent_comment"
                               class="form-label">Comments:</label>
                        <textarea name="molecule_reagent_comment"
                                  id="molecule_reagent_comment"
                                  class="tinymce form-control"
                        ></textarea>

                    </div>
                    <div class="mb-3 reagents-msg">

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-2 col-sm-2">
                            <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close
                            </button>
                        </div>
                        <div class="col-lg-2 col-sm-2 offset-8">

                            <button id="btn-save-reagents" class="btn btn-primary ">Save</button>
                        </div>
                    </div>

                </form>
            </div>

        </div>

    </div>

</div>
<!-- MODAL ENDS-->

@push('tab-scripts')
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
@endpush
