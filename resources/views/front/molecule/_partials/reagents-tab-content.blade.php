<style>
    .select2-selection__placeholder{
        color:#373636 !important;
    }
</style>
<div class="tab-pane fade shadow rounded bg-white p-3"
     id="v-pills-reagents" role="tabpanel"
     aria-labelledby="v-pills-reagents-tab">
    <h4 class="font-italic mb-4">Reagents</h4>
    <hr>
    <div class="mb-5">
        <label class="form-label">Model Animal Strains:</label>
        <input type="hidden" name="strains" class="track strain"
               value="{{count($molecule->moleculestrains)>0?count($molecule->moleculestrains):''}}">
        <table id="table-strains" class="table table-striped table-responsive table-hover">
            <thead role="rowgroup" class="thead-dark">
            <tr role="row">
                <th role='columnheader'>Species or Strain</th>
                <th role='columnheader'>Supplier</th>
                <th role='columnheader'>Comment</th>
                <th scope="col" data-label="Actions"
                    style="width:100px">Actions
                </th>
            </tr>
            </thead>
            <tbody>
            @if(count($molecule->moleculestrains)>0)
                @foreach($molecule->moleculestrains as $strain)
                    <tr data-strain-id="{{$strain->id}}">
                        <td>{{$strain->molecule_species_or_strain}}</td>
                        <td>{!! $strain->molecule_strain_supplier !!}</td>
                        <td>{!! $strain->molecule_strain_comment !!}</td>
                        <td>
                            <a
                                data-strain-id="{{$strain->id}}"
                                class="strain-edit btn btn-sm btn-success">
                                <i class="fa fa-edit"></i></a>
                            <a
                                data-strain-id="{{$strain->id}}"
                                class="strain-delete btn btn-sm btn-danger">
                                <i class="fa fa-times-circle"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr class="strain-empty">
                    <td colspan="4" class="text-center">No data to
                        show
                    </td>
                </tr>
            @endif
            </tbody>
            <tfoot>
            <tr>
                <td colspan="5" class="text-center">
                    <a id="strain-entry" data-bs-toggle="modal"
                       data-bs-target="#strainsModal"
                       class="btn btn-info">Add Entry
                    </a>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="mb-3">
        <label for="molecule_monoclonal_antibodies" class="form-label">Monoclonal antibodies:</label>
        <textarea name="molecule_monoclonal_antibodies"
                  id="molecule_monoclonal_antibodies"
                  class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_monoclonal_antibodies', $molecule->molecule_monoclonal_antibodies)}}</textarea>
        @if($errors->has('molecule_monoclonal_antibodies'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_monoclonal_antibodies')}}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="molecule_polyclonal_antibodies" class="form-label">Polyclonal antibodies:</label>
        <textarea name="molecule_polyclonal_antibodies"
                  id="molecule_polyclonal_antibodies"
                  class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_polyclonal_antibodies', $molecule->molecule_polyclonal_antibodies)}}</textarea>
        @if($errors->has('molecule_polyclonal_antibodies'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_polyclonal_antibodies')}}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="molecule_drug_small_molecules" class="form-label">Small molecule inhibitors:</label>
        <textarea name="molecule_drug_small_molecules"
                  id="molecule_drug_small_molecules"
                  class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_drug_small_molecules', $molecule->molecule_drug_small_molecules)}}</textarea>
        @if($errors->has('molecule_drug_small_molecules'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_drug_small_molecules')}}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="molecule_genetic_constructs" class="form-label">Genetic constructs:</label>
        <textarea name="molecule_genetic_constructs"
                  id="molecule_genetic_constructs"
                  class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_genetic_constructs', $molecule->molecule_genetic_constructs)}}</textarea>
        @if($errors->has('molecule_genetic_constructs'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_genetic_constructs')}}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="molecule_purified_protein" class="form-label">Purified protein:</label>
        <textarea name="molecule_purified_protein"
                  id="molecule_purified_protein"
                  class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_purified_protein', $molecule->molecule_purified_protein)}}</textarea>
        @if($errors->has('molecule_purified_protein'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_purified_protein')}}</div>
        @endif
    </div>
    <div class="mb-5">
        <label class="form-label">Reagents Misc.:</label>
        <input type="hidden" name="reagents" class="track reagent"
               value="{{count($molecule->moleculereagents)>0?count($molecule->moleculereagents):''}}">
        <table id="table-reagents" class="table table-striped table-responsive table-hover">
            <thead role="rowgroup" class="thead-dark">
            <tr role="row">
                <th role='columnheader'>Reagent</th>
                <th role='columnheader'>Supplier</th>
                <th role='columnheader'>Comment</th>
                <th scope="col" data-label="Actions"
                    style="width:100px">Actions
                </th>
            </tr>
            </thead>
            <tbody>
            @if(count($molecule->moleculereagents)>0)
                @foreach($molecule->moleculereagents as $reagent)
                    <tr data-reagent-id="{{$reagent->id}}">
                        <td>{{$reagent->molecule_reagent}}</td>
                        <td>{!! $reagent->molecule_reagent_supplier !!}</td>
                        <td>{!! $reagent->molecule_reagent_comment !!}</td>
                        <td>
                            <a
                                data-reagent-id="{{$reagent->id}}"
                                class="reagent-edit btn btn-sm btn-success">
                                <i class="fa fa-edit"></i></a>
                            <a
                                data-reagent-id="{{$reagent->id}}"
                                class="reagent-delete btn btn-sm btn-danger">
                                <i class="fa fa-times-circle"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr class="reagent-empty">
                    <td colspan="4" class="text-center">No data to
                        show
                    </td>
                </tr>
            @endif
            </tbody>
            <tfoot>
            <tr>
                <td colspan="5" class="text-center">
                    <a id="reagent-entry" data-bs-toggle="modal"
                       data-bs-target="#reagentsModal"
                       class="btn btn-info">Add Entry
                    </a>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="mb-5">
        <label for="molecule_assay_methodid" class="form-label">Assay method ID:</label>
        <select id="molecule_assay_methodid" class="form-control" name="molecule_assay_methodid"></select>

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
    {{--    For The reagent Modal --}}
    <script>
        let moleculeAssayId = '{{$molecule->molecule_assay_methodid}}';
        let moleculeAssayMethod = '{{($molecule->moleculeAssay !==null) ? $molecule->moleculeAssay->assay_method_id : ''}}';
        var moleculeAssayMethodName = '{{($molecule->moleculeAssay !==null)? $molecule->moleculeAssay->assay_method_name : ''}}';
        $(function () {

            $('#molecule_assay_methodid').select2({
                theme: "classic",
                placeholder: "Choose Assay Methods",
                minimumInputLength: 3,
                //allowClear: true,
                ajax: {
                    url: '<?= url('/molecules/listAssays') ?>',
                    type:'get',
                    delay:250,
                    dataType: 'json',
                    data: function (params) {
                        return {
                            searchItem:params.term,
                            page:params.page
                        };
                    },
                    processResults: function (data,params) {
                        params.page = params.page||1;
                        return {
                            results:data.data,
                            pagination:{
                                more:data.last_page!==params.page
                            }
                        };
                    },
                    cache: true
                },
                templateResult:function (data){
                    if(data.loading){
                        return data.text;
                    }
                    return data.assay_method_id+'-'+data.assay_method_name;
                },
                templateSelection:function(data){
                    if(!data.id) {
                        if(moleculeAssayId!==''){
                            data.id = moleculeAssayId;
                            data.text = moleculeAssayMethod+'-'+moleculeAssayMethodName;
                        }

                        // return `text` for placeholder
                        return data.text;
                    }
                    else {
                        return data.assay_method_id+'-'+data.assay_method_name;
                    }
                }
            });


            function resetReagentModalForm() {
                $("input[name=molecule_reagent]").val('');
                $("input[name=reagent_id]").val('');
                tinymce.get("molecule_reagent_supplier").setContent('');
                tinymce.get("molecule_reagent_comment").setContent('');
                $('#reagentsModal .reagents-msg').html('');
            }

            $('#reagentsModal').on('hidden.bs.modal', function () {
                resetReagentModalForm();
            })
            $('#btn-save-reagents').on('click', function (e) {
                e.preventDefault();
                var token = $("input[name=_token]").val(); // The CSRF token
                var reagent_id = $("input[name=reagent_id]").val(); // The CSRF token
                var molecule_reagent_supplier = tinymce.get("molecule_reagent_supplier").getContent();
                var molecule_reagent = $("input[name=molecule_reagent]").val();
                var molecule_reagent_comment = tinymce.get("molecule_reagent_comment").getContent();
                var molecule_id = "<?= $molecule->id ?>";
                if (reagent_id == '') {

                    $.ajax({
                        type: "POST",
                        url: '<?= url('/molecules/saveReagent') ?>',
                        data: {
                            _token: token,
                            molecule_id: molecule_id,
                            molecule_reagent_supplier: molecule_reagent_supplier,
                            molecule_reagent: molecule_reagent,
                            molecule_reagent_comment: molecule_reagent_comment
                        },
                        dataType: 'json',
                        success: function (response) {
                            if (response.status === 'done') {
                                $('.reagent-empty').remove();
                                resetReagentModalForm();

                                var content = buildTableRow(response);
                                $("#table-reagents").find('tbody')
                                    .append(content);
                                $('#reagentsModal').modal('hide');
                                $('.reagent').val(1);
                                update_progress();
                            }
                        },
                        error: function (res) {
                            $('#reagentsModal .reagents-msg').html('<span class="text-danger">' + res.responseJSON.message + '</span>')
                        }
                    });
                } else {
                    var rowIndex = $('#table-reagents >tbody >tr[data-reagent-id="' + reagent_id + '"]').index();
                    $.ajax({
                        type: "POST",
                        url: '<?= url('/molecules/saveReagent') ?>',
                        data: {
                            _token: token,
                            reagent_id: reagent_id,
                            molecule_id: molecule_id,
                            molecule_reagent: molecule_reagent,
                            molecule_reagent_supplier: molecule_reagent_supplier,
                            molecule_reagent_comment: molecule_reagent_comment
                        },
                        dataType: 'json',
                        success: function (response) {
                            if (response.status === 'done') {
                                resetReagentModalForm();
                                var tableRow = $('#table-reagents >tbody >tr').eq(rowIndex);
                                var content = buildTableRow(response);
                                tableRow.after(content);
                                tableRow.remove();
                                $('#reagentsModal').modal('hide');
                            }
                        },
                        error: function (res) {
                            //console.log(res.responseJSON.message)
                            //alert(res.responseJSON.message);
                            $('#reagentsModal .reagents-msg').html('<span class="text-danger">' + res.responseJSON.message + '</span>')
                        }
                    });
                }
                return false;
            });

            function buildTableRow(response) {
                var content = `<tr data-reagent-id="${response.reagent.id}">
                                    <td>${response.reagent.molecule_reagent}</td>
                                    <td>${response.reagent.molecule_reagent_supplier}</td>
                                    <td>${(response.reagent.molecule_reagent_comment != null) ? response.reagent.molecule_reagent_comment : ''}</td>
                                    <td>
                                        <a
                                            data-reagent-id="${response.reagent.id}"
                                            class="reagent-edit btn btn-sm btn-success">
                                            <i class="fa fa-edit"></i></a>
                                        <a
                                            data-reagent-id="${response.reagent.id}"
                                            class="reagent-delete btn btn-sm btn-danger">
                                            <i class="fa fa-times-circle"></i>
                                        </a>
                                    </td>
                                    </tr>`;
                return content;
            }

            $('body').on('click', 'a.reagent-edit', function (e) {
                e.preventDefault();
                let reagentId = $(this).attr('data-reagent-id');

                $.get('<?= url('/molecules/getReagent') ?>/' + reagentId, function (data, status) {
                    if (data.status === 'done') {
                        $('#reagentsModal').modal('show').find('.modal-title').text('Edit The Reagent #' + reagentId);
                        $("input[name=molecule_reagent]").val(data.reagent.molecule_reagent);
                        $("input[name=reagent_id]").val(data.reagent.id);
                        tinymce.get("molecule_reagent_supplier").setContent(data.reagent.molecule_reagent_supplier);
                        tinymce.get("molecule_reagent_comment").setContent(data.reagent.molecule_reagent_comment);
                    }
                });
            })
            $('body').on('click', 'a.reagent-delete', function (e) {
                e.preventDefault();
                let reagentId = $(this).attr('data-reagent-id');
                var confirmation = confirm("are you sure you want to remove the item?");
                var rowIndex = $('#table-reagents >tbody >tr[data-reagent-id="' + reagentId + '"]').index();
                if (confirmation) {
                    $.ajax({
                        type: "DELETE",
                        url: '<?= url('/molecules/deleteReagent') ?>/' + reagentId,
                        data: {
                            'reagent_id': reagentId,
                            '_token': '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function (response) {
                            if (response.status === 'deleted') {

                                var tableRow = $('#table-reagents >tbody >tr').eq(rowIndex);
                                tableRow.remove();
                                tableRowLength = $('#table-reagents >tbody >tr').length;
                                if (tableRowLength === 0) {
                                    var content = `
                                    <tr class="reagent-empty">
                                        <td colspan="4" class="text-center">No data to
                                            show
                                        </td>
                                    </tr>`
                                    $("#table-reagents").find('tbody')
                                        .append(content);
                                    $('.reagent').val('');
                                    update_progress();
                                }
                                alert('Reagent Deleted')
                            }
                        },
                        error: function (res) {
                            //console.log(res.responseJSON.message)
                            alert(res.responseJSON.message);
                        }
                    });

                }
            })
        });
    </script>
    {{--    For The Animal Strain --}}
    <script>
        $(function () {


            function resetStrainsModalForm() {
                $("input[name=strain_id]").val('');
                $("input[name=molecule_species_or_strain]").val('');
                tinymce.get("molecule_strain_supplier").setContent('');
                tinymce.get("molecule_strain_comment").setContent('');
                $('#strainsModal .strains-msg').html('');
            }

            $('#strainsModal').on('hidden.bs.modal', function () {
                resetStrainsModalForm();
            })
            $('#btn-save-strains').on('click', function (e) {
                e.preventDefault();
                var token = $("input[name=_token]").val(); // The CSRF token
                var strain_id = $("input[name=strain_id]").val(); // The CSRF token
                var molecule_species_or_strain = $("input[name=molecule_species_or_strain]").val();
                var molecule_strain_supplier = tinymce.get("molecule_strain_supplier").getContent();
                var molecule_strain_comment = tinymce.get("molecule_strain_comment").getContent();
                var molecule_id = "<?= $molecule->id ?>";
                if (strain_id == '') {

                    $.ajax({
                        type: "POST",
                        url: '<?= url('/molecules/saveStrain') ?>',
                        data: {
                            _token: token,
                            molecule_id: molecule_id,
                            molecule_species_or_strain: molecule_species_or_strain,
                            molecule_strain_supplier: molecule_strain_supplier,
                            molecule_strain_comment: molecule_strain_comment
                        },
                        dataType: 'json',
                        success: function (response) {
                            if (response.status === 'done') {
                                $('.strain-empty').remove();
                                resetStrainsModalForm();

                                var content = buildTableRow(response);
                                $("#table-strains").find('tbody')
                                    .append(content);
                                $('#strainsModal').modal('hide');
                                $('.strain').val(1);
                                update_progress();
                            }
                        },
                        error: function (res) {
                            $('#strainsModal .strains-msg').html('<span class="text-danger">' + res.responseJSON.message + '</span>')
                        }
                    });
                } else {
                    var rowIndex = $('#table-reagents >tbody >tr[data-strain-id="' + strain_id + '"]').index();
                    $.ajax({
                        type: "POST",
                        url: '<?= url('/molecules/saveStrain') ?>',
                        data: {
                            _token: token,
                            strain_id: strain_id,
                            molecule_id: molecule_id,
                            molecule_species_or_strain: molecule_species_or_strain,
                            molecule_strain_supplier: molecule_strain_supplier,
                            molecule_strain_comment: molecule_strain_comment
                        },
                        dataType: 'json',
                        success: function (response) {
                            if (response.status === 'done') {
                                resetStrainsModalForm();
                                var tableRow = $('#table-strains >tbody >tr').eq(rowIndex);
                                var content = buildTableRow(response);
                                tableRow.after(content);
                                tableRow.remove();
                                $('#strainsModal').modal('hide');
                            }
                        },
                        error: function (res) {
                            //console.log(res.responseJSON.message)
                            //alert(res.responseJSON.message);
                            $('#strainsModal .strains-msg').html('<span class="text-danger">' + res.responseJSON.message + '</span>')
                        }
                    });
                }
                return false;
            });

            function buildTableRow(response) {
                var content = `<tr data-reagent-id="${response.strain.id}">
                                    <td>${response.strain.molecule_species_or_strain}</td>
                                    <td>${response.strain.molecule_strain_supplier}</td>
                                    <td>${(response.strain.molecule_strain_comment != null) ? response.strain.molecule_strain_comment : ''}</td>
                                    <td>
                                        <a
                                            data-strain-id="${response.strain.id}"
                                            class="strain-edit btn btn-sm btn-success">
                                            <i class="fa fa-edit"></i></a>
                                        <a
                                            data-strain-id="${response.strain.id}"
                                            class="strain-delete btn btn-sm btn-danger">
                                            <i class="fa fa-times-circle"></i>
                                        </a>
                                    </td>
                                    </tr>`;
                return content;
            }

            $('body').on('click', 'a.strain-edit', function (e) {
                e.preventDefault();
                let strainId = $(this).attr('data-strain-id');

                $.get('<?= url('/molecules/getStrain') ?>/' + strainId, function (data, status) {
                    if (data.status === 'done') {
                        $('#strainsModal').modal('show').find('.modal-title').text('Edit The Strain #' + strainId);
                        $("input[name=strain_id]").val(data.strain.id);
                        $("input[name=molecule_species_or_strain]").val(data.strain.molecule_species_or_strain);
                        tinymce.get("molecule_strain_supplier").setContent(data.strain.molecule_strain_supplier);
                        tinymce.get("molecule_strain_comment").setContent(data.strain.molecule_strain_comment);
                    }
                });
            })
            $('body').on('click', 'a.strain-delete', function (e) {
                e.preventDefault();
                let strainId = $(this).attr('data-strain-id');
                var confirmation = confirm("are you sure you want to remove the item?");
                var rowIndex = $('#table-strains >tbody >tr[data-strain-id="' + strainId + '"]').index();
                if (confirmation) {
                    $.ajax({
                        type: "DELETE",
                        url: '<?= url('/molecules/deleteStrain') ?>/' + strainId,
                        data: {
                            'strain_id': strainId,
                            '_token': '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function (response) {
                            if (response.status === 'deleted') {

                                var tableRow = $('#table-strains >tbody >tr').eq(rowIndex);
                                tableRow.remove();
                                tableRowLength = $('#table-strains >tbody >tr').length;
                                if (tableRowLength === 0) {
                                    var content = `
                                    <tr class="strain-empty">
                                        <td colspan="4" class="text-center">No data to
                                            show
                                        </td>
                                    </tr>`
                                    $("#table-strains").find('tbody')
                                        .append(content);
                                    $('.strain').val('');
                                    update_progress();
                                }
                                alert('Strain Deleted')
                            }
                        },
                        error: function (res) {
                            //console.log(res.responseJSON.message)
                            alert(res.responseJSON.message);
                        }
                    });

                }
            })
        });
    </script>
@endpush
