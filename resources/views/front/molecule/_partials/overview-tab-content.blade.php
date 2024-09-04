<div class="tab-pane fade shadow rounded bg-white p-3"
     id="v-pills-overview" role="tabpanel"
     aria-labelledby="v-pills-overview-tab">
    <h4 class="font-italic mb-4">Overview</h4>
    <hr>
    <div class="mb-3">
        <label for="molecule_summary_sentence" class="form-label">Summary
            Sentence:</label>
        <textarea name="molecule_summary_sentence"
                  id="molecule_summary_sentence" class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_summary_sentence', $molecule->molecule_summary_sentence)}}</textarea>
        @if($errors->has('molecule_summary_sentence'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_summary_sentence')}}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="molecule_abstract"
               class="form-label">Abstract:</label>
        <textarea name="molecule_abstract" id="molecule_abstract"
                  class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_abstract', $molecule->molecule_abstract)}}</textarea>
        @if($errors->has('molecule_abstract'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_abstract')}}</div>
        @endif
    </div>

    <div class="mb-3">
        <label for="molecule_families" class="form-label">Molecular
            Families:</label>
        <textarea name="molecule_families" id="molecule_families"
                  class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_families', $molecule->molecule_families)}}</textarea>
        @if($errors->has('molecule_families'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_families')}}</div>
        @endif
    </div>
    <div class="row mb-3">
        <div class="col-lg-6">
            <label for="body" class="form-label">Molecule Name
                1:</label>
            <input type="text" name="molecule_name1" id="molecule_name1"
                   class="form-control track"
                   value="{{@old('molecule_name1',$molecule->molecule_name1)}}"
            />
            @if($errors->has('molecule_name1'))
                <div
                    class='error small text-danger'>{{$errors->first('molecule_name1')}}</div>
            @endif
        </div>
        <div class="col-lg-6">
            <label for="body" class="form-label">Molecule Name
                2:</label>
            <input type="text" name="molecule_name2" id="molecule_name2"
                   class="form-control track"
                   value="{{@old('molecule_name2',$molecule->molecule_name2)}}"
            />
            @if($errors->has('molecule_name2'))
                <div
                    class='error small text-danger'>{{$errors->first('molecule_name2')}}</div>
            @endif
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-6">
            <label for="body" class="form-label">Molecule Name
                3:</label>
            <input type="text" name="molecule_name3" id="molecule_name3"
                   class="form-control track"
                   value="{{@old('molecule_name3',$molecule->molecule_name3)}}"
            />
            @if($errors->has('molecule_name3'))
                <div
                    class='error small text-danger'>{{$errors->first('molecule_name3')}}</div>
            @endif
        </div>
        <div class="col-lg-6">
            <label for="body" class="form-label">Molecule Name
                4:</label>
            <input type="text" name="molecule_name4" id="molecule_name4"
                   class="form-control track"
                   value="{{@old('molecule_name4',$molecule->molecule_name4)}}"
            />
            @if($errors->has('molecule_name4'))
                <div
                    class='error small text-danger'>{{$errors->first('molecule_name4')}}</div>
            @endif
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-6">
            <label for="body" class="form-label">Locus Link:</label>
            <input type="text" name="molecule_locus_link"
                   id="molecule_locus_link"
                   class="form-control track"
                   value="{{@old('molecule_locus_link',$molecule->molecule_locus_link)}}"
            />
            @if($errors->has('molecule_locus_link'))
                <div
                    class='error small text-danger'>{{$errors->first('molecule_locus_link')}}</div>
            @endif
        </div>
        <div class="col-lg-6">
            <label for="body" class="form-label">OMIM Link:</label>
            <input type="text" name="molecule_omim_link"
                   id="molecule_omim_link"
                   class="form-control track"
                   value="{{@old('molecule_omim_link',$molecule->molecule_omim_link)}}"
            />
            @if($errors->has('molecule_omim_link'))
                <div
                    class='error small text-danger'>{{$errors->first('molecule_omim_link')}}</div>
            @endif
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-6">
            <label for="body" class="form-label">PBD Link:</label>
            <input type="text" name="molecule_pdb_link"
                   id="molecule_pdb_link"
                   class="form-control track"
                   value="{{@old('molecule_pdb_link',$molecule->molecule_pdb_link)}}"
            />
            @if($errors->has('molecule_pdb_link'))
                <div
                    class='error small text-danger'>{{$errors->first('molecule_pdb_link')}}</div>
            @endif
        </div>
        <div class="col-lg-6">
            <label for="body" class="form-label">Other Link:</label>
            <input type="text" name="molecule_other_link"
                   id="molecule_other_link"
                   class="form-control track"
                   value="{{@old('molecule_other_link',$molecule->molecule_other_link)}}"
            />
            @if($errors->has('molecule_other_link'))
                <div
                    class='error small text-danger'>{{$errors->first('molecule_other_link')}}</div>
            @endif
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-4" style="display: flex">

            <div class="molecule-image-container mt-2"
                 style="width:200px;height:200px;border:1px solid #e0e0e0">

                <img id="moleculeImage" src="{{ URL::asset($molecule->molecule_image) }}" alt="molecule Image" style="width:100%"/>
                <input type="hidden" class="track" value="<?= ($molecule->molecule_image!='')? '1':''?>">
            </div>
            @if($molecule->molecule_image)
                <div class="deleteMoleculeImage">
                    <a id="deleteImage" data-toggle="tooltip" data-placement="right" title="Remove saved Image" class="btn btn-danger btn-sm rounded-circle"><i class="fa fa-times"></i></a>
                </div>
            @endif
        </div>
        <div class="col-lg-6">
            <label for="molecule_image" class="form-label">Molecule
                Image:</label>
            <input type="file" name="molecule_image" id="molecule_image"
                   class="form-control"
            />
            @if($errors->has('molecule_image'))
                <div
                    class='error small text-danger'>{{$errors->first('molecule_image')}}</div>
            @endif
        </div>
        <div class="col-lg-1">
            <label for="image_reset" class="form-label">Reset</label>
            <a id="resetImage" data-toggle="tooltip" data-placement="right" title="Reset The File Input" class="btn btn-primary form-control"><i class="fa fa-refresh"></i></a>
        </div>
    </div>

    <div class="mb-3">
        <label for="molecule_comment" class="form-label">Comment With
            Reference:</label>
        <textarea name="molecule_comment" id="molecule_comment"
                  class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_comment', $molecule->molecule_comment)}}</textarea>
        @if($errors->has('molecule_comment'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_comment')}}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="molecule_authors_insight" class="form-label">Author’s
            additional insight:</label>
        <textarea name="molecule_authors_insight"
                  id="molecule_authors_insight" class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_authors_insight', $molecule->molecule_authors_insight)}}</textarea>
        @if($errors->has('molecule_authors_insight'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_authors_insight')}}</div>
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
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
            var previousImageSrc = moleculeImage.src;
            molecule_image.onchange = evt => {
                const [file] = molecule_image.files
                if (file) {
                    moleculeImage.src = URL.createObjectURL(file)
                }
                $('.deleteMoleculeImage').hide();
            }
            $('#resetImage').on('click', function() {
                moleculeImage.src= previousImageSrc;
                molecule_image.value = '';
                if(previousImageSrc !=='#'){
                    $('.deleteMoleculeImage').show();
                }

            });

            $('body').on('click', '#deleteImage', function (e) {
                e.preventDefault();
                let moleculeId = '{{$molecule->id}}'
                var confirmation = confirm("are you sure you want to remove the Image?");
                if (confirmation) {
                    $.ajax({
                        type: "DELETE",
                        url: '<?= url('/molecules/deleteImage') ?>/'+moleculeId,
                        data: {
                            'moleculeId': moleculeId,
                            '_token': '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function (response) {
                            if (response.status === 'deleted') {
                                moleculeImage.src = "#"
                                alert('Deleted')
                                $('.deleteMoleculeImage').hide();
                            }else{
                                alert('Failed')
                            }
                        },
                        error: function (res) {
                            //console.log(res.responseJSON.message)
                            alert(res.responseJSON.message);
                        }
                    });

                }
            })
        })
    </script>
@endpush
