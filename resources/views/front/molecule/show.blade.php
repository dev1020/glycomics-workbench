@extends('front.molecule.layout')
@section('molecule.content')
    <style>
        .molecule-header h1,.molecule-header h4{
            margin:0
        }
        .molecule-header h4 label{
            font-weight: normal;
        }
        .molecule-show hr{
            border: 1px solid #0b0b0b;
            opacity: 1;
        }
        .molecule-show .card-text{
            text-align: justify;
        }
    </style>
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <ol class="breadcrumb m-0 p-0 flex-grow-1 mb-2 mb-md-0">
            <li class="breadcrumb-item"><a href="{{ implode('/', ['','home']) }}"> Home
                </a></li>
            <li class="breadcrumb-item"> Molecule List</li>
        </ol>

    </div>
    <div class="container mt-5 molecule-show">
        <div class="header-container">
            <div class="molecule-header mt-5">
                <h1 class="text-center">{{$molecule->molecule_main_title}}</h1>
                <h4 class="text-center">Author: <label>{{$molecule->molecule_author}}</label></h4>
                <h4 class="text-center">Reviewers: <label>{{$molecule->molecule_reviewers}}</label></h4>
                <h3 class="text-center">{{$molecule->molecule_gw_id}}</h3>
            </div>
        </div>
        <hr>
        <h4 class="text-center">OVERVIEW</h4>
        <!-- Summary Sentence -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Summary Sentence</h5>
                <div class="card-text">{!! $molecule->molecule_summary_sentence !!}</div>
            </div>
        </div>

        <!-- Abstract -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Abstract</h5>
                <div class="card-text">{!! $molecule->molecule_abstract !!}</div>
            </div>
        </div>

        <!-- Molecular Families -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Molecular Families</h5>
                <div class="card-text">{!! $molecule->molecule_families !!}</div>
            </div>
        </div>

        <!-- Names -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Names</h5>
                <div class="card-text">
                    <ul>
                        <li>{{$molecule->molecule_name1}}</li>
                        <li>{{$molecule->molecule_name2}}</li>
                        <li>{{$molecule->molecule_name3}}</li>
                        <li>{{$molecule->molecule_name4}}</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Major Links -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Major Links</h5>
                <p class="card-text">
                    <strong>Families in which hST6gal 1 is a member</strong><br>
                    hST6gal 1 &rarr; sialyltransferase &rarr; glycosyltransferase
                </p>
            </div>
        </div>
        <!-- Author's Additional Insights -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Author's Additional Insights</h5>
                <p class="card-text">
                    <strong>Families in which hST6gal 1 is a member</strong><br>
                    hST6gal 1 &rarr; sialyltransferase &rarr; glycosyltransferase
                </p>
            </div>
        </div>

        <hr>
        <h4 class="text-center">SYSTEM VIEW</h4>

        <!-- Disease relevance/Function in vivo -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Disease relevance/Function in vivo</h5>
                <p class="card-text">
                    <strong>Families in which hST6gal 1 is a member</strong><br>
                    hST6gal 1 &rarr; sialyltransferase &rarr; glycosyltransferase
                </p>
            </div>
        </div>
        <!-- Cellular Function -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Cellular Function</h5>
                <p class="card-text">
                    <strong>Families in which hST6gal 1 is a member</strong><br>
                    hST6gal 1 &rarr; sialyltransferase &rarr; glycosyltransferase
                </p>
            </div>
        </div>
        <!-- Protein Location -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Protein Location</h5>
                <p class="card-text">
                    <strong>Families in which hST6gal 1 is a member</strong><br>
                    hST6gal 1 &rarr; sialyltransferase &rarr; glycosyltransferase
                </p>
            </div>
        </div>
        <!-- Cellular Expression -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Cellular Expression</h5>
                <p class="card-text">
                    <strong>Families in which hST6gal 1 is a member</strong><br>
                    hST6gal 1 &rarr; sialyltransferase &rarr; glycosyltransferase
                </p>
            </div>
        </div>

        <hr>
        <h4 class="text-center">GENE</h4>

        <!-- Gene sequence links -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Gene sequence links</h5>
                <p class="card-text">
                    <strong>Families in which hST6gal 1 is a member</strong><br>
                    hST6gal 1 &rarr; sialyltransferase &rarr; glycosyltransferase
                </p>
            </div>
        </div>
        <!-- Chromosomal location -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Chromosomal location</h5>
                <p class="card-text">
                    <strong>Families in which hST6gal 1 is a member</strong><br>
                    hST6gal 1 &rarr; sialyltransferase &rarr; glycosyltransferase
                </p>
            </div>
        </div>
        <!-- Gene polymorphism -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Gene polymorphism</h5>
                <p class="card-text">
                    <strong>Families in which hST6gal 1 is a member</strong><br>
                    hST6gal 1 &rarr; sialyltransferase &rarr; glycosyltransferase
                </p>
            </div>
        </div>
        <!-- Transcription regulating molecules -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Transcription regulating
                    molecules</h5>
                <table id="table-transcriptions" class="table table-bordered table-responsive ">
                    <thead role="rowgroup" class="thead-dark">
                    <tr role="row">

                        <th role='columnheader'>Transcription Factor'</th>
                        <th role='columnheader'>Comments</th>
                        <th role='columnheader'>References</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($molecule->transcriptionregulators)>0)

                        @foreach($molecule->transcriptionregulators as $regulator)

                            <tr data-regulator-id="{{$regulator->id}}">
                                <td>{{$regulator->transcription_factors}}</td>
                                <td>{!! $regulator->transcription_comments !!}</td>
                                <td>{!! $regulator->transcription_references !!}</td>
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
                </table>
            </div>
        </div>
        <!-- Gene Annotation -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Gene Annotation</h5>
                <p class="card-text">
                    <strong>Families in which hST6gal 1 is a member</strong><br>
                    hST6gal 1 &rarr; sialyltransferase &rarr; glycosyltransferase
                </p>
            </div>
        </div>

        <hr>
        <h4 class="text-center">TRANSCRIPT</h4>

        <!-- Transcript Sequence Links -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Transcript Sequence Links</h5>
                <p class="card-text">
                    <strong>Families in which hST6gal 1 is a member</strong><br>
                    hST6gal 1 &rarr; sialyltransferase &rarr; glycosyltransferase
                </p>
            </div>
        </div>
        <!-- Post-transcriptional Modification -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Post-transcriptional Modification</h5>
                <p class="card-text">
                    <strong>Families in which hST6gal 1 is a member</strong><br>
                    hST6gal 1 &rarr; sialyltransferase &rarr; glycosyltransferase
                </p>
            </div>
        </div>
        <!-- Transcript Annotation -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Transcript Annotation</h5>
                <p class="card-text">
                    <strong>Families in which hST6gal 1 is a member</strong><br>
                    hST6gal 1 &rarr; sialyltransferase &rarr; glycosyltransferase
                </p>
            </div>
        </div>

        <hr>
        <h4 class="text-center">PROTEIN</h4>

        <!-- Biochemical Activity -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Biochemical Activity</h5>
                <p class="card-text">
                    <strong>Families in which hST6gal 1 is a member</strong><br>
                    hST6gal 1 &rarr; sialyltransferase &rarr; glycosyltransferase
                </p>
            </div>
        </div>
        <!-- Protein Sequence Links -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Protein Sequence Links</h5>
                <p class="card-text">
                    <strong>Families in which hST6gal 1 is a member</strong><br>
                    hST6gal 1 &rarr; sialyltransferase &rarr; glycosyltransferase
                </p>
            </div>
        </div>
        <!-- Protein Sequence Annotation -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Protein Sequence Annotation</h5>
                <p class="card-text">
                    <strong>Families in which hST6gal 1 is a member</strong><br>
                    hST6gal 1 &rarr; sialyltransferase &rarr; glycosyltransferase
                </p>
            </div>
        </div>
        <!-- Protein Polymorphism -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Protein Polymorphism</h5>
                <p class="card-text">
                    <strong>Families in which hST6gal 1 is a member</strong><br>
                    hST6gal 1 &rarr; sialyltransferase &rarr; glycosyltransferase
                </p>
            </div>
        </div>
        <!-- Protein Physical Properties -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Protein Physical Properties</h5>
                <p class="card-text">
                    <strong>Families in which hST6gal 1 is a member</strong><br>
                    hST6gal 1 &rarr; sialyltransferase &rarr; glycosyltransferase
                </p>
            </div>
        </div>
        <!-- Post-translational Modification -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Protein Physical Properties</h5>
                <p class="card-text">
                    <strong>Families in which hST6gal 1 is a member</strong><br>
                    hST6gal 1 &rarr; sialyltransferase &rarr; glycosyltransferase
                </p>
            </div>
        </div>
        <!-- Protein Structure Links -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Protein Physical Properties</h5>
                <p class="card-text">
                    <strong>Families in which hST6gal 1 is a member</strong><br>
                    hST6gal 1 &rarr; sialyltransferase &rarr; glycosyltransferase
                </p>
            </div>
        </div>

        <hr>
        <h4 class="text-center">MOLECULAR INTERACTIONS</h4>

        <!-- Protein Structure Links -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Molecular Pathways</h5>
                <p class="card-text">
                    <strong>Families in which hST6gal 1 is a member</strong><br>
                    hST6gal 1 &rarr; sialyltransferase &rarr; glycosyltransferase
                </p>
            </div>
        </div>
        <!-- Protein Structure Links -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Enzymes for which this is a Substrate</h5>
                <p class="card-text">
                    <strong>Families in which hST6gal 1 is a member</strong><br>
                    hST6gal 1 &rarr; sialyltransferase &rarr; glycosyltransferase
                </p>
            </div>
        </div>
        <!-- Substrates -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Substrates</h5>
                <table id="table-substrates" class="table table-bordered table-responsive">
                    <thead role="rowgroup" class="thead-dark">
                    <tr role="row">
                        <th role='columnheader'>Substrate</th>
                        <th role='columnheader'>Comments</th>
                        <th role='columnheader'>References</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($molecule->moleculesubstrates)>0)
                        @foreach($molecule->moleculesubstrates as $substrate)
                            <tr data-substrate-id="{{$substrate->id}}">
                                <td>{{$substrate->molecular_substrate}}</td>
                                <td>{!! $substrate->substrate_comments !!}</td>
                                <td>{!! $substrate->substrate_references !!}</td>

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
                </table>
            </div>
        </div>
        <!-- Other Ligands and Associated Molecules -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Other Ligands and Associated Molecules</h5>
                <p class="card-text">
                    <strong>Families in which hST6gal 1 is a member</strong><br>
                    hST6gal 1 &rarr; sialyltransferase &rarr; glycosyltransferase
                </p>
            </div>
        </div>

        <hr>
        <h4 class="text-center">REAGENTS</h4>
    </div>


@endsection
