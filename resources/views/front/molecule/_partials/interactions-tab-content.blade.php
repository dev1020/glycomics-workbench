<div class="tab-pane fade shadow rounded bg-white p-3"
     id="v-pills-interaction" role="tabpanel"
     aria-labelledby="v-pills-interaction-tab">
    <h4 class="font-italic mb-4">Interactions</h4>
    <hr>
    <div class="mb-3">
        <label for="molecule_molecular_pathways" class="form-label">Molecular pathways:</label>
        <textarea name="molecule_molecular_pathways"
                  id="molecule_molecular_pathways"
                  class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_molecular_pathways', $molecule->molecule_molecular_pathways)}}</textarea>
        @if($errors->has('molecule_molecular_pathways'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_molecular_pathways')}}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="molecule_enzymes_substrate" class="form-label">Enzymes for which this is a substrate:</label>
        <textarea name="molecule_enzymes_substrate"
                  id="molecule_enzymes_substrate"
                  class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_enzymes_substrate', $molecule->molecule_enzymes_substrate)}}</textarea>
        @if($errors->has('molecule_enzymes_substrate'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_enzymes_substrate')}}</div>
        @endif
    </div>
    <div class="mb-5">
        <label class="form-label">Substrates:</label>
        <input type="hidden" name="substrate" class="track substrate" value="{{count($molecule->moleculesubstrates)>0?count($molecule->moleculesubstrates):''}}">
        <table id="table-substrates" class="table table-striped table-responsive table-hover">
            <thead role="rowgroup" class="thead-dark">
            <tr role="row">
                <th role='columnheader'>Substrate</th>
                <th role='columnheader'>Comments</th>
                <th role='columnheader'>References</th>
                <th scope="col" data-label="Actions"
                    style="width:100px">Actions
                </th>
            </tr>
            </thead>
            <tbody>
                @if(count($molecule->moleculesubstrates)>0)
                    @foreach($molecule->moleculesubstrates as $substrate)
                        <tr data-substrate-id="{{$substrate->id}}">
                            <td>{{$substrate->molecular_substrate}}</td>
                            <td>{!! $substrate->substrate_comments !!}</td>
                            <td>{!! $substrate->substrate_references !!}</td>
                            <td>
                                <a
                                    data-substrate-id="{{$substrate->id}}"
                                    class="substrate-edit btn btn-sm btn-success">
                                    <i class="fa fa-edit"></i></a>
                                <a
                                    data-substrate-id="{{$substrate->id}}"
                                    class="substrate-delete btn btn-sm btn-danger">
                                    <i class="fa fa-times-circle"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="substrate-empty">
                        <td colspan="4" class="text-center">No data to
                            show
                        </td>
                    </tr>
                @endif
            </tbody>
            <tfoot>
            <tr>
                <td colspan="5" class="text-center">
                    <a id="substrate-entry" data-bs-toggle="modal"
                       data-bs-target="#substratesModal"
                       class="btn btn-info">Add Entry
                    </a>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

    <div class="mb-3">
        <label for="molecule_other_ligands_associated_molecules" class="form-label">Other ligands and associated molecules:</label>
        <textarea name="molecule_other_ligands_associated_molecules"
                  id="molecule_other_ligands_associated_molecules"
                  class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_other_ligands_associated_molecules', $molecule->molecule_other_ligands_associated_molecules)}}</textarea>
        @if($errors->has('molecule_other_ligands_associated_molecules'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_other_ligands_associated_molecules')}}</div>
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
            function resetSubstrateModalForm() {
                $("input[name=molecular_substrate]").val('');
                $("input[name=substrate_id]").val('');
                tinymce.get("substrate_comments").setContent('');
                tinymce.get("substrate_references").setContent('');
                $('#substratesModal .substrate-msg').html('');
            }

            $('#substratesModal').on('hidden.bs.modal', function () {
                resetSubstrateModalForm();
            })
            $('#btn-save-substrates').on('click', function (e) {
                e.preventDefault();
                var token = $("input[name=_token]").val(); // The CSRF token
                var substrate_id = $("input[name=substrate_id]").val(); // The CSRF token
                var substrate_references = tinymce.get("substrate_references").getContent();
                var molecular_substrate = $("input[name=molecular_substrate]").val();
                var substrate_comments = tinymce.get("substrate_comments").getContent();
                var molecule_id = "<?= $molecule->id ?>";
                if (substrate_id == '') {

                    $.ajax({
                        type: "POST",
                        url: '<?= url('/molecules/saveSubstrate') ?>',
                        data: {
                            _token: token,
                            molecule_id: molecule_id,
                            substrate_references: substrate_references,
                            molecular_substrate: molecular_substrate,
                            substrate_comments: substrate_comments
                        },
                        dataType: 'json',
                        success: function (response) {
                            if (response.status === 'done') {
                                $('.substrate-empty').remove();
                                resetSubstrateModalForm();

                                var content = buildTableRow(response);
                                $("#table-substrates").find('tbody')
                                    .append(content);
                                $('#substratesModal').modal('hide');
                                $('.substrate').val(1);
                                update_progress();
                            }
                        },
                        error: function (res) {
                            $('#substratesModal .substrate-msg').html('<span class="text-danger">'+res.responseJSON.message+'</span>')
                        }
                    });
                } else {
                    var rowIndex = $('#table-substrates >tbody >tr[data-substrate-id="' + substrate_id + '"]').index();
                    $.ajax({
                        type: "POST",
                        url: '<?= url('/molecules/saveSubstrate') ?>',
                        data: {
                            _token: token,
                            substrate_id: substrate_id,
                            molecule_id: molecule_id,
                            substrate_references: substrate_references,
                            molecular_substrate: molecular_substrate,
                            substrate_comments: substrate_comments
                        },
                        dataType: 'json',
                        success: function (response) {
                            if (response.status === 'done') {
                                resetSubstrateModalForm();
                                var tableRow = $('#table-substrates >tbody >tr').eq(rowIndex);
                                var content = buildTableRow(response);
                                tableRow.after(content);
                                tableRow.remove();
                                $('#substratesModal').modal('hide');
                            }
                        },
                        error: function (res) {
                            //console.log(res.responseJSON.message)
                            //alert(res.responseJSON.message);
                            $('#substratesModal .substrate-msg').html('<span class="text-danger">'+res.responseJSON.message+'</span>')
                        }
                    });
                }
                return false;
            });

            function buildTableRow(response) {
                var content = `<tr data-substrate-id="${response.substrate.id}">
                                    <td>${response.substrate.molecular_substrate}</td>
                                    <td>${response.substrate.substrate_comments}</td>
                                    <td>${(response.substrate.substrate_references != null) ? response.substrate.substrate_references : ''}</td>
                                    <td>
                                        <a
                                            data-substrate-id="${response.substrate.id}"
                                            class="substrate-edit btn btn-sm btn-success">
                                            <i class="fa fa-edit"></i></a>
                                        <a
                                            data-substrate-id="${response.substrate.id}"
                                            class="substrate-delete btn btn-sm btn-danger">
                                            <i class="fa fa-times-circle"></i>
                                        </a>
                                    </td>
                                    </tr>`;
                return content;
            }

            $('body').on('click', 'a.substrate-edit', function (e) {
                e.preventDefault();
                let substrateId = $(this).attr('data-substrate-id');

                $.get('<?= url('/molecules/getSubstrate') ?>/' + substrateId, function (data, status) {
                    if (data.status === 'done') {
                        $('#substratesModal').modal('show').find('.modal-title').text('Edit The Substrate #' + substrateId);
                        $("input[name=molecular_substrate]").val(data.substrate.molecular_substrate);
                        $("input[name=substrate_id]").val(data.substrate.id);
                        tinymce.get("substrate_comments").setContent(data.substrate.substrate_comments);
                        tinymce.get("substrate_references").setContent(data.substrate.substrate_references);
                    }
                });
            })
            $('body').on('click', 'a.substrate-delete', function (e) {
                e.preventDefault();
                let substrateId = $(this).attr('data-substrate-id');
                var confirmation = confirm("are you sure you want to remove the item?");
                var rowIndex = $('#table-substrates >tbody >tr[data-substrate-id="' + substrateId + '"]').index();
                if (confirmation) {
                    $.ajax({
                        type: "DELETE",
                        url: '<?= url('/molecules/deleteSubstrate') ?>/'+substrateId,
                        data: {
                            'substrate_id': substrateId,
                            '_token': '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function (response) {
                            if (response.status === 'deleted') {

                                var tableRow = $('#table-substrates >tbody >tr').eq(rowIndex);
                                tableRow.remove();
                                tableRowLength = $('#table-substrates >tbody >tr').length;
                                if(tableRowLength===0){
                                    var content = `
                                    <tr class="substrate-empty">
                                        <td colspan="4" class="text-center">No data to
                                            show
                                        </td>
                                    </tr>`
                                    $("#table-substrates").find('tbody')
                                        .append(content);
                                    $('.substrate').val('');
                                    update_progress();
                                }
                                alert('Substrate Deleted')
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
