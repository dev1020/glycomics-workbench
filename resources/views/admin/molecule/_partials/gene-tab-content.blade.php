<div class="tab-pane fade shadow rounded bg-white p-3"
     id="v-pills-gene" role="tabpanel"
     aria-labelledby="v-pills-gene-tab">
    <h4 class="font-italic mb-4">Gene</h4>
    <hr>
    <div class="mb-3">
        <label for="molecule_gene_sequence_links" class="form-label">Gene
            Sequence Links:</label>
        <textarea name="molecule_gene_sequence_links"
                  id="molecule_gene_sequence_links"
                  class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_gene_sequence_links', $molecule->molecule_gene_sequence_links)}}</textarea>
        @if($errors->has('molecule_gene_sequence_links'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_gene_sequence_links')}}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="molecule_chromosomal_location" class="form-label">Chromosomal
            Locations:</label>
        <textarea name="molecule_chromosomal_location"
                  id="molecule_chromosomal_location"
                  class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_chromosomal_location', $molecule->molecule_chromosomal_location)}}</textarea>
        @if($errors->has('molecule_chromosomal_location'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_chromosomal_location')}}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="molecule_gene_polymorphism" class="form-label">Gene
            Polymorphism:</label>
        <textarea name="molecule_gene_polymorphism"
                  id="molecule_gene_polymorphism"
                  class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_gene_polymorphism', $molecule->molecule_gene_polymorphism)}}</textarea>
        @if($errors->has('molecule_gene_polymorphism'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_gene_polymorphism')}}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="molecule_gene_annotation" class="form-label">Gene
            Annotation:</label>
        <textarea name="molecule_gene_annotation"
                  id="molecule_gene_annotation"
                  class="tinymce-editor form-control track-textarea"
        >{{@old('molecule_gene_annotation', $molecule->molecule_gene_annotation)}}</textarea>
        @if($errors->has('molecule_gene_annotation'))
            <div
                class='error small text-danger'>{{$errors->first('molecule_gene_annotation')}}</div>
        @endif
    </div>
    <div class="mb-5">

        <label class="form-label">Transcription regulating
            molecules:</label>
        <input type="hidden" name="regulator" class="track regulator" value="{{count($molecule->transcriptionregulators)>0?count($molecule->transcriptionregulators):''}}" >
        <table id="table-transcriptions" class="table table-striped table-responsive table-hover">
            <thead role="rowgroup" class="thead-dark">
            <tr role="row">

                <th role='columnheader'>Factor</th>
                <th role='columnheader'>Comments</th>
                <th role='columnheader'>References</th>
                <th scope="col" data-label="Actions"
                    style="width:100px">Actions
                </th>
            </tr>
            </thead>
            <tbody>
            @if(count($molecule->transcriptionregulators)>0)

                @foreach($molecule->transcriptionregulators as $regulator)

                    <tr data-regulator-id="{{$regulator->id}}">
                        <td>{{$regulator->transcription_factors}}</td>
                        <td>{!! $regulator->transcription_comments !!}</td>
                        <td>{!! $regulator->transcription_references !!}</td>
                        <td>
                            <a
                                data-regulator-id="{{$regulator->id}}"
                                class="regulator-edit btn btn-sm btn-success">
                                <i class="fa fa-edit"></i></a>
                            <a
                                data-regulator-id="{{$regulator->id}}"
                                class="regulator-delete btn btn-sm btn-danger">
                                <i class="fa fa-times-circle"></i>
                            </a>
                        </td>
                    </tr>

                @endforeach
            @else
                <tr class="regulator-empty">
                    <td colspan="4" class="text-center">No data to
                        show
                    </td>
                </tr>
            @endif

            </tbody>
            <tfoot>
            <tr>
                <td colspan="5" class="text-center">
                    <a id="regulator-entry" data-bs-toggle="modal"
                       data-bs-target="#regulatorModal"
                       class="btn btn-info">Add Entry
                    </a>
                </td>
            </tr>
            </tfoot>
        </table>
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

            function resetTranscriptionModalForm() {
                $("input[name=transcription_factors]").val('');
                $("input[name=transcription_id]").val('');
                tinymce.get("transcription_comments").setContent('');
                tinymce.get("transcription_references").setContent('');
                $('#regulatorModal .regulator-msg').html('');
            }

            $('#regulatorModal').on('hidden.bs.modal', function () {
                resetTranscriptionModalForm();
            })
            $('#btn-save-transcriptions').on('click', function (e) {
                e.preventDefault();
                var token = $("input[name=_token]").val(); // The CSRF token
                var transcription_id = $("input[name=transcription_id]").val(); // The CSRF token
                var transcription_references = tinymce.get("transcription_references").getContent();
                var transcription_factors = $("input[name=transcription_factors]").val();
                var transcription_comments = tinymce.get("transcription_comments").getContent();
                var molecule_id = "<?= $molecule->id ?>";
                if (transcription_id == '') {

                    $.ajax({
                        type: "POST",
                        url: '<?= url('/molecules/saveTranscription') ?>',
                        data: {
                            _token: token,
                            molecule_id: molecule_id,
                            transcription_references: transcription_references,
                            transcription_factors: transcription_factors,
                            transcription_comments: transcription_comments
                        },
                        dataType: 'json',
                        success: function (response) {
                            if (response.status === 'done') {
                                $('.regulator-empty').remove();
                                resetTranscriptionModalForm();

                                var content = buildTableRow(response);
                                $("#table-transcriptions").find('tbody')
                                    .append(content);
                                $('#regulatorModal').modal('hide');
                                $('.regulator').val(1);
                                update_progress();
                            }
                        },
                        error: function (res) {
                            $('#regulatorModal .regulator-msg').html('<span class="text-danger">'+res.responseJSON.message+'</span>')
                        }
                    });
                } else {
                    var rowIndex = $('#table-transcriptions >tbody >tr[data-regulator-id="' + transcription_id + '"]').index();
                    $.ajax({
                        type: "POST",
                        url: '<?= url('/molecules/saveTranscription') ?>',
                        data: {
                            _token: token,
                            transcription_id: transcription_id,
                            molecule_id: molecule_id,
                            transcription_references: transcription_references,
                            transcription_factors: transcription_factors,
                            transcription_comments: transcription_comments
                        },
                        dataType: 'json',
                        success: function (response) {
                            if (response.status === 'done') {
                                resetTranscriptionModalForm();
                                var tableRow = $('#table-transcriptions >tbody >tr').eq(rowIndex);
                                var content = buildTableRow(response);
                                tableRow.after(content);
                                tableRow.remove();
                                $('#regulatorModal').modal('hide');
                            }
                        },
                        error: function (res) {
                            //console.log(res.responseJSON.message)
                            //alert(res.responseJSON.message);
                            $('#regulatorModal .regulator-msg').html('<span class="text-danger">'+res.responseJSON.message+'</span>')
                        }
                    });
                }
                return false;
            });

            function buildTableRow(response) {
                var content = `<tr data-regulator-id="${response.transcription.id}">
                                    <td>${response.transcription.transcription_factors}</td>
                                    <td>${response.transcription.transcription_comments}</td>
                                    <td>${(response.transcription.transcription_references != null) ? response.transcription.transcription_references : ''}</td>
                                    <td>
                                        <a
                                            data-regulator-id="${response.transcription.id}"
                                            class="regulator-edit btn btn-sm btn-success">
                                            <i class="fa fa-edit"></i></a>
                                        <a
                                            data-regulator-id="${response.transcription.id}"
                                            class="regulator-delete btn btn-sm btn-danger">
                                            <i class="fa fa-times-circle"></i>
                                        </a>
                                    </td>
                                    </tr>`;
                return content;
            }

            $('body').on('click', 'a.regulator-edit', function (e) {
                e.preventDefault();
                let regulatorId = $(this).attr('data-regulator-id');

                $.get('<?= url('/molecules/getTranscription') ?>/' + regulatorId, function (data, status) {
                    if (data.status === 'done') {
                        $('#regulatorModal').modal('show').find('.modal-title').text('Edit The Transcription #' + regulatorId);
                        $("input[name=transcription_factors]").val(data.transcription.transcription_factors);
                        $("input[name=transcription_id]").val(data.transcription.id);
                        tinymce.get("transcription_comments").setContent(data.transcription.transcription_comments);
                        tinymce.get("transcription_references").setContent(data.transcription.transcription_references);
                    }
                });
            })
            $('body').on('click', 'a.regulator-delete', function (e) {
                e.preventDefault();
                let regulatorId = $(this).attr('data-regulator-id');
                var confirmation = confirm("are you sure you want to remove the item?");
                var rowIndex = $('#table-transcriptions >tbody >tr[data-regulator-id="' + regulatorId + '"]').index();
                if (confirmation) {
                    $.ajax({
                        type: "DELETE",
                        url: '<?= url('/molecules/deleteTranscription') ?>/'+regulatorId,
                        data: {
                            'transcription_id': regulatorId,
                            '_token': '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function (response) {
                            if (response.status === 'deleted') {

                                var tableRow = $('#table-transcriptions >tbody >tr').eq(rowIndex);
                                tableRow.remove();
                                tableRowLength = $('#table-transcriptions >tbody >tr').length;
                                if(tableRowLength===0){
                                    var content = `
                                    <tr class="regulator-empty">
                                        <td colspan="4" class="text-center">No data to
                                            show
                                        </td>
                                    </tr>`
                                    $("#table-transcriptions").find('tbody')
                                        .append(content);
                                    $('.regulator').val('');
                                    update_progress();
                                }
                                alert('Transcription Deleted')
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
