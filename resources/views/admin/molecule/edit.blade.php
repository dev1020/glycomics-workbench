@extends('admin.molecule.layout')

@section('molecules.content')
    <style>

        .molecule-page .nav-link {
            background-color: #85ab2f;
            color: #ffffff;
        }
        .molecule-page tbody td p{
            margin:0;padding: 0;
        }

        .molecule-page .nav-link:hover {
            border-radius: 6px;
            background-color: #0665d0;
        }

        .molecule-page .nav-pills .nav-link.active {
            border-radius: 6px;
        }

        .molecule-page .form-label {
            font-weight: bold;
        }
        .track-progress{
            width:50%;background-color: #e2f0e2;border-radius: 15px;border:2px solid darkgreen;
        }
        .track-progress .meter{
            display:block;background:green;color:green;width:0;height: 21px;border-radius: 20px;margin: 1px;
        }
        .track-progress .perc{
            position: absolute;top: 0px;right: 45%;color: #414240;font-weight: bold;
        }
        .track-progress .ctask{
            position: absolute;top: 0px;right: 5%;color: #414240;font-weight: bold;
        }
        .deleteMoleculeImage {
            margin-left: -20px;height: 30px;margin-top: 5px;
        }
        .deleteMoleculeImage .fa {
            font-size: 20px;
        }
    </style>
    <div class="container">
        <div class=" h-custom">
            <div class="row d-flex justify-content-center h-100">

                <!-- Main Content Area -->
                <main class="col-md-9 col-lg-12 px-md-4" style="min-height: 50vh">

                    <div class="pt-3 pb-2 mb-3 border-bottom">
                        <ol class="breadcrumb m-0 p-0 flex-grow-1 mb-2 mb-md-0">
                            <li class="breadcrumb-item"><a href="{{ implode('/', ['','home']) }}"> Home
                                </a></li>
                            <li class="breadcrumb-item"><a href="{{ implode('/', ['','molecule']) }}"> Molecule
                                    List</a></li>
                        </ol>

                    </div>
                    <div class="card molecule-page">
                        <div class="card-header d-flex flex-row align-items-center justify-content-between">
                            <h3>Edit Molecule</h3>
                            <div class="track-progress">
                                <span class="meter"></span>
                                <span class="perc"></span>
                                <span class="ctask"></span>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('molecules.update', compact('molecule')) }}" method="POST"
                                  enctype="multipart/form-data" class="m-0 p-0" autocomplete="off">
                                @method('PUT')
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <!-- Tabs nav -->
                                            <ul class="nav flex-column nav-pills nav-pills-custom"
                                                data-molecule-id="{{$molecule->id}}" id="v-pills-tab"
                                                role="tablist" aria-orientation="vertical">
                                                <li>
                                                    <a class="nav-link mb-1 p-3 shadow " id="v-pills-main-tab"
                                                       data-bs-toggle="pill" href="#v-pills-main" role="tab"
                                                       aria-controls="v-pills-home" aria-selected="true">
                                                        <i class="fa fa-user-circle-o mr-2"></i>
                                                        <span class="font-weight-bold small text-uppercase">Main</span></a>
                                                </li>


                                                <li><a class="nav-link mb-1 p-3 shadow" id="v-pills-overview-tab"
                                                       data-bs-toggle="pill" href="#v-pills-overview" role="tab"
                                                       aria-controls="v-pills-profile" aria-selected="false">
                                                        <i class="fa fa-calendar-minus-o mr-2"></i>
                                                        <span
                                                            class="font-weight-bold small text-uppercase">Overview</span></a>
                                                </li>

                                                <li><a class="nav-link mb-1 p-3 shadow" id="v-pills-systemview-tab"
                                                       data-bs-toggle="pill" href="#v-pills-systemview" role="tab"
                                                       aria-controls="v-pills-messages" aria-selected="false">

                                                    <span
                                                        class="font-weight-bold small text-uppercase">System View</span></a>
                                                </li>

                                                <li><a class="nav-link mb-1 p-3 shadow" id="v-pills-gene-tab"
                                                       data-bs-toggle="pill" href="#v-pills-gene" role="tab"
                                                       aria-controls="v-pills-settings" aria-selected="false">

                                                        <span class="font-weight-bold small text-uppercase">Gene</span></a>
                                                </li>
                                                <li><a class="nav-link mb-1 p-3 shadow" id="v-pills-transcript-tab"
                                                       data-bs-toggle="pill" href="#v-pills-transcript" role="tab"
                                                       aria-controls="v-pills-settings" aria-selected="false">
                                                        <span
                                                            class="font-weight-bold small text-uppercase">Transcript</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="nav-link mb-1 p-3 shadow" id="v-pills-protein-tab"
                                                       data-bs-toggle="pill" href="#v-pills-protein" role="tab"
                                                       aria-controls="v-pills-settings" aria-selected="false">

                                                    <span
                                                        class="font-weight-bold small text-uppercase">Protein</span></a>
                                                </li>
                                                <li>
                                                    <a class="nav-link mb-1 p-3 shadow" id="v-pills-interaction-tab"
                                                       data-bs-toggle="pill" href="#v-pills-interaction" role="tab"
                                                       aria-controls="v-pills-settings" aria-selected="false">

                                                        <span class="font-weight-bold small text-uppercase">Molecular Interactions</span></a>
                                                </li>
                                                <li>
                                                    <a class="nav-link mb-1 p-3 shadow" id="v-pills-reagents-tab"
                                                       data-bs-toggle="pill" href="#v-pills-reagents" role="tab"
                                                       aria-controls="v-pills-settings" aria-selected="false">

                                                        <span
                                                            class="font-weight-bold small text-uppercase">Reagents</span></a>
                                                </li>
                                                <li>
                                                    <a class="nav-link mb-1 p-3 shadow" id="v-pills-references-tab"
                                                       data-bs-toggle="pill" href="#v-pills-references" role="tab"
                                                       aria-controls="v-pills-settings" aria-selected="false">

                                                    <span
                                                        class="font-weight-bold small text-uppercase">References</span></a>
                                                </li>
                                            </ul>
                                        </div>


                                        <div class="col-md-9">
                                            <!-- Tabs content -->
                                            <div class="tab-content" id="v-pills-tabContent">
                                                @include('admin.molecule._partials.main-tab-content')
                                                @include('admin.molecule._partials.overview-tab-content')
                                                @include('admin.molecule._partials.sysytemview-tab-content')
                                                @include('admin.molecule._partials.gene-tab-content')
                                                @include('admin.molecule._partials.transcript-tab-content')
                                                @include('admin.molecule._partials.protein-tab-content')
                                                @include('admin.molecule._partials.interactions-tab-content')
                                                @include('admin.molecule._partials.reagents-tab-content')
                                                @include('admin.molecule._partials.references-tab-content')
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="card-footer">
                                    <div class="d-flex flex-row align-items-center">
                                        <a href="{{ route('pages.index', []) }}"
                                           class="btn btn-light px-5"><i class="fa fa-close"></i> @lang('Cancel')</a>
                                        <button type="submit"
                                                class="btn btn-primary mx-2 px-5"><i class="fa fa-save"></i> @lang('Save')</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
    @include('admin.molecule._partials.molecule-modals')


    <script>

        const pillsTab = document.querySelector('#v-pills-tab');
        const pills = pillsTab.querySelectorAll('a[data-bs-toggle="pill"]');
        const moleculeID = pillsTab.getAttribute('data-molecule-id');

        $(function () {
            pills.forEach(pill => {
                pill.addEventListener('shown.bs.tab', (event) => {
                    const {target} = event;
                    const {id: targetId} = target;

                    savePillId(targetId);
                });
            });

            const savePillId = (selector) => {
                localStorage.setItem('activePillId' + moleculeID, selector);
            };

            const getPillId = () => {
                const activePillId = localStorage.getItem('activePillId' + moleculeID);

                // if local storage item is null, show default tab
                if (!activePillId) {
                    var defaultTabTriggerEl = document.querySelector('#v-pills-main-tab')
                    var defaultTab = new bootstrap.Tab(defaultTabTriggerEl)
                    defaultTab.show()
                }

                // call 'show' function
                const someTabTriggerEl = document.querySelector(`#${activePillId}`)
                const tab = new bootstrap.Tab(someTabTriggerEl);

                tab.show();
            };

            // get pill id on load
            getPillId();

            $('.btnNext').click(function () {
                const nextTabLinkEl = $('.nav-pills .active').closest('li').next('li').find('a')[0];
                const nextTab = new bootstrap.Tab(nextTabLinkEl);
                nextTab.show();
                $("html, body").animate({scrollTop: 50}, "slow");
                return false;
            });

            $('.btnPrev').click(function () {
                const prevTabLinkEl = $('.nav-pills .active').closest('li').prev('li').find('a')[0];
                const prevTab = new bootstrap.Tab(prevTabLinkEl);
                prevTab.show();
                $("html, body").animate({scrollTop: 50}, "slow");
                return false;
            });
        });


    </script>


    <script type="text/javascript" src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
    <script>
        // tinymce.init({
        //     selector: 'textarea',
        //     menubar: false,
        //     extended_valid_elements: 'span',
        //     content_css: "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css",
        //     content_css_cors: true,
        //     height: 200,
        //     plugins: 'code lists',
        //     toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist ',
        //     convert_urls: false,
        // });
        const textAreaTrackerList = [];
        const textAreaTrackerCompletedList = [];


    $(function () {
        document.querySelectorAll('.track-textarea').forEach(element => {
            tinymce.init({
                selector: '#' + element.id,
                menubar: false,
                extended_valid_elements: 'span',
                content_css: "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css",
                content_css_cors: true,
                min_height:200,
                autoresize_overflow_padding:10,
                //resize:true,
                plugins: 'code lists autoresize link',
                toolbar: 'undo redo code | blocks visualblocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | link ',
                convert_urls: false,
                setup: function (editor) {
                    editor.on('init', function () {
                        var indexTextarea = textAreaTrackerCompletedList.indexOf(element.id);
                        if(tinymce.get(element.id).getContent()!==''){
                            if(indexTextarea ===-1){
                                textAreaTrackerCompletedList.push(element.id);
                            }
                        }
                    update_progress()
                    });
                    editor.on('change', function (e) {
                        var indexTextarea = textAreaTrackerCompletedList.indexOf(element.id);
                        if($.trim(tinymce.get(element.id).getContent({format: 'text'})).length ===0){
                            tinymce.get(element.id).setContent('');
                            if(indexTextarea !==-1){
                                textAreaTrackerCompletedList.splice(indexTextarea,1);
                            }
                        }else{
                            if(indexTextarea ===-1){
                                textAreaTrackerCompletedList.push(element.id);
                            }
                        }
                    update_progress();
                    });
                }
            });
            textAreaTrackerList.push(element.id);
        });
        $('.track').change(function(e) {
            update_progress();
        });

// supports any number of inputs and calculates done as %

    })
        function update_progress() {
            var inputCount = $('.track').length;
            var textAreaCount = textAreaTrackerList.length;
            var count = inputCount+textAreaCount;
            var inputCompleted = $('.track').filter(function() {
                return this.value;
            }).length;
            var allCompleted = inputCompleted+textAreaTrackerCompletedList.length
            var done = Math.floor(allCompleted * (100 / count));
            $('.perc').text(done+'%');
            $('.meter').width(done+'%');
            $('.ctask').text(allCompleted+'/'+count);
        }
    </script>



    @stack('tab-scripts')
@endsection

