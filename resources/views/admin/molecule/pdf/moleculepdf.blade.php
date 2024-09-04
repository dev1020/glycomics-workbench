<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>@yield('title') {{config('app.name')}} </title>

    <meta name="description" content="Glycomics Workbench">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
    <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">
    <!-- Modules -->
    @yield('css')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @yield('js')

</head>

<body>
    <style>
        body{
            font-family: "Roboto", sans-serif;
            font-optical-sizing: auto;
            background-color: #F6F5F5FF;
        }
        table td,table th{font-size: 12px}
        tbody td p{
            margin:0;padding: 0;
        }
        .molecule-header h1,.molecule-header h4{
            margin:0
        }
        .molecule-header h4 label{
            font-weight: normal;
        }
        .header-container{
            background-color: #F6F5F5FF;
            display: flex !important;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height:100vh
        }
        .molecule-header{

            color:blue;
        }
        .molecule-show hr{
            border: 1px solid #0b0b0b;
            opacity: 1;
        }
        .molecule-show .card-text{
            text-align: justify;
        }
        .molecule-show label{
            font-size: 18px;
        }
        .card{break-inside: auto;border: none;background-color: transparent}
        .card-body{padding: 0}
        .card-title{font-size:16px}
        .card-text,.card-text p{font-size:12px}
        .card-text p,.card-text ul{margin: 0}
        hr{page-break-before: always}
        .toc-list, .toc-list ol {
            font-size: 14px;
            text-transform: capitalize;
        }
        .toc-list li{margin:3px}
        .toc-list >li>a{color:#0a0c0d}

        .toc-list a{
            text-decoration: none;
            font-size: 13px;
        }
        .toc-list .sublist .title{
            font-size: 12px;
        }
        .toc-list .sublist li{
            margin: -6px;
        }
        .toc-list ol {
            padding-inline-start: 2ch;
        }


    </style>

    <div class="container molecule-show">
        <div class="header-container">
            <div class="molecule-header mt-5">
                <h1 class="text-center">{{$molecule->molecule_main_title}}</h1>
                <h4 class="text-center">Author: <label>{{$molecule->molecule_author}}</label></h4>
                <h4 class="text-center">Reviewers: <label>{{$molecule->molecule_reviewers}}</label></h4>
                <h3 class="text-center">{{$molecule->molecule_gw_id}}</h3>
            </div>
        </div>
        <hr>
        <h4 class="text-center" id="toc">TABLE OF CONTENTS</h4>
        <ol class="toc-list" role="list">
            <li>
                <a href="#overview">
                    <span class="title">overview</span>
                </a>
                <ol role="list" class="sublist" type="i">
                    <li><a href="#molecule_summary_sentence"><span class="title">Summary Sentence</span></a></li>
                    <li><a href="#molecule_abstract"><span class="title">Abstract</span></a></li>
                    <li><a href="#molecule_families"><span class="title">Molecular Families</span></a></li>
                    <li><a href="#molcule_names"><span class="title">Molecular names</span></a></li>
                    <li><a href="#molcule_major_links"><span class="title">Major Links</span></a></li>
                    <li><a href="#molcule_additional_insights"><span class="title">Additional Insights</span></a></li>
                </ol>
            </li>
            <li>
                <a href="#system-view">
                    <span class="title">system view</span>
                </a>
                <ol role="list" class="sublist" type="i">
                    <li><a href="#molecule_disease_relevance"><span class="title">Disease relevance/Function in vivo</span></a></li>
                    <li><a href="#molecule_cellular_function"><span class="title">Cellular Function</span></a></li>
                    <li><a href="#molecule_protein_location"><span class="title"> Protein location</span></a></li>
                    <li><a href="#molecule_cellular_expression"><span class="title">Cellular expression</span></a></li>

                </ol>
            </li>
            <li>
                <a href="#gene">
                    <span class="title" >Gene</span>
                </a>
                <ol role="list" class="sublist" type="i">
                    <li><a href="#molecule_gene_sequence_links"><span class="title">Gene sequence links</span></a></li>
                    <li><a href="#molecule_chromosomal_location"><span class="title">Chromosomal location</span></a></li>
                    <li><a href="#molecule_gene_polymorphism"><span class="title">Gene polymorphism</span></a></li>
                    <li><a href="#regulating-molecules"><span class="title">Transcription regulating molecules</span></a></li>
                    <li><a href="#molecule_gene_annotation"><span class="title">Gene Annotation</span></a></li>
                </ol>
            </li>
            <li>
                <a href="#transcript">
                    <span class="title">Transcript</span>
                </a>
                <ol role="list" class="sublist" type="i">
                    <li><a href="#molecule_transcript_sequence_links"><span class="title">Transcript Sequence Links</span></a></li>
                    <li><a href="#molecule_post_translational_modification"><span class="title">Post-transcriptional Modification</span></a></li>
                    <li><a href="#molecule_transcript_annotation"><span class="title">Transcript Annotation</span></a></li>
                </ol>
            </li>
            <li>
                <a href="#protein">
                    <span class="title">Protein</span>
                </a>
                <ol role="list" class="sublist" type="i">
                    <li><a href="#molecule_biochemical_activity"><span class="title">Biochemical Activity</span></a></li>
                    <li><a href="#molecule_protein_sequence_links"><span class="title">Protein Sequence Links</span></a></li>
                    <li><a href="#molecule_protein_sequence_annotation"><span class="title">Protein Sequence Annotation</span></a></li>
                    <li><a href="#molecule_protein_polymorphism"><span class="title">Protein Polymorphism</span></a></li>
                    <li><a href="#molecule_protein_properties"><span class="title">Protein Physical Properties</span></a></li>
                    <li><a href="#"><span class="title">Protein modification</span></a></li>
                    <li><a href="#"><span class="title">Protein structure links</span></a></li>
                </ol>
            </li>
            <li>
                <a href="#molecular-interactions">
                    <span class="title" >Molecular Interactions</span>
                </a>
                <ol role="list" class="sublist" type="i">
                    <li><a href="#molecule_molecular_pathways"><span class="title">Molecular Pathways</span></a></li>
                    <li><a href="#molecule_enzymes_substrate"><span class="title">Enzymes for which this is a Substrate</span></a></li>
                    <li><a href="#substrates"><span class="title">Substrates</span></a></li>
                    <li><a href="#molecule_other_ligands_associated_molecules"><span class="title">Other Ligands and Associated Molecules</span></a></li>
                </ol>
            </li>

            <li>
                <a href="#reagent">
                    <span class="title">Reagents</span>
                </a>
                <ol role="list" class="sublist" type="i">
                    <li><a href="#animal-strains"><span class="title">Model animal strains</span></a></li>
                    <li><a href="#molecule_monoclonal_antibodies"><span class="title">Monoclonal antibodies</span></a></li>
                    <li><a href="#molecule_polyclonal_antibodies"><span class="title">Polyclonal antibodies</span></a></li>
                    <li><a href="#molecule_drug_small_molecules"><span class="title">Drugs and small molecules</span></a></li>
                    <li><a href="#molecule_genetic_constructs"><span class="title">Genetic constructs</span></a></li>
                    <li><a href="#molecule_purified_protein"><span class="title">Purified protein</span></a></li>
                    <li><a href="#reagents-misc"><span class="title">Reagents Misc</span></a></li>
                </ol>
            </li>
            <li>
                <a href="#references">
                    <span class="title">References</span>
                </a>
                <ol role="list" class="sublist" type="i">
                    <li><a href="#molecule_reference_reviews"><span class="title">Reviews</span></a></li>
                    <li><a href="#molecule_reference_primary_citations"><span class="title">Primary citations</span></a></li>
                    <li><a href="#molecule_reference_www_resources"><span class="title"> WWW resources</span></a></li>
                </ol>
            </li>
        </ol>
        <hr>
        <h4 class="text-center" id="overview">OVERVIEW <a href="#toc"><i class="fa fa-arrow-circle-up" style="float: right"></i></a></h4>
        <!-- Summary Sentence -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="molecule_summary_sentence">Summary Sentence</h5>
                <div class="card-text">{!! $molecule->molecule_summary_sentence !!}</div>
            </div>
        </div>

        <!-- Abstract -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="molecule_abstract">Abstract</h5>
                <div class="card-text">{!! $molecule->molecule_abstract !!}</div>
            </div>
        </div>

        <!-- Molecular Families -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="molecule_families">Molecular Families</h5>
                <div class="card-text">{!! $molecule->molecule_families !!}</div>
            </div>
        </div>

        <!-- Names -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="molcule_names">Names</h5>
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
                <h5 class="card-title" id="molcule_major_links">Major Links</h5>
                <div class="card-text">
                    <ul>
                        <li> <strong>Locus Link:</strong> <a href="{{$molecule->molecule_locus_link}}" target="_blank">{{$molecule->molecule_locus_link}}</a></li>
                        <li> <strong>OMIM Link:</strong> <a href="{{$molecule->molecule_omim_link}}" target="_blank">{{$molecule->molecule_omim_link}}</a></li>
                        <li> <strong>PBD Link:</strong> <a href="{{$molecule->molecule_pdb_link}}" target="_blank">{{$molecule->molecule_pdb_link}}</a></li>
                        <li> <strong>Other Link:</strong> <a href="{{$molecule->molecule_other_link}}" target="_blank">{{$molecule->molecule_other_link}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Author's Additional Insights -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="molcule_additional_insights">Author's Additional Insights</h5>
                <div class="card-text">{!! $molecule->molecule_authors_insight !!}</div>
            </div>
        </div>

        <!-- Author's Additional Insights -->
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="data:image/png; base64, {{ base64_encode(file_get_contents($molecule->molecule_image)) }}" style="height:200px ">

                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Comment With Reference:</h5>
                        <div class="card-text">{!! $molecule->molecule_comment !!}</div>

                    </div>
                </div>
            </div>
        </div>

        <hr>
        <h4 class="text-center" id="system-view">SYSTEM VIEW <a href="#toc"><i class="fa fa-arrow-circle-up" style="float: right"></i></a></h4>

        <!-- Disease relevance/Function in vivo -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="molecule_disease_relevance">Disease relevance/Function in vivo</h5>
                <div class="card-text">{!! $molecule->molecule_disease_relevance !!}</div>
            </div>
        </div>
        <!-- Cellular Function -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="molecule_cellular_function">Cellular Function</h5>
                <div class="card-text">{!! $molecule->molecule_cellular_function !!}</div>
            </div>
        </div>
        <!-- Protein Location -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="molecule_protein_location">Protein Location</h5>
                <div class="card-text">{!! $molecule->molecule_protein_location !!}</div>
            </div>
        </div>
        <!-- Cellular Expression -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="molecule_cellular_expression">Cellular Expression</h5>
                <div class="card-text">{!! $molecule->molecule_cellular_expression !!}</div>
            </div>
        </div>


        <hr>
        <h4 class="text-center" id="gene">GENE <a href="#toc"><i class="fa fa-arrow-circle-up" style="float: right"></i></a></h4>

        <!-- Gene sequence links -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="molecule_gene_sequence_links">Gene sequence links</h5>
                <div class="card-text">{!! $molecule->molecule_gene_sequence_links !!}</div>
            </div>
        </div>
        <!-- Chromosomal location -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="molecule_chromosomal_location">Chromosomal location</h5>
                <div class="card-text">{!! $molecule->molecule_chromosomal_location !!}</div>
            </div>
        </div>
        <!-- Gene polymorphism -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="molecule_gene_polymorphism">Gene polymorphism</h5>
                <div class="card-text">{!! $molecule->molecule_gene_polymorphism !!}</div>
            </div>
        </div>
        <!-- Transcription regulating molecules -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="regulating-molecules">Transcription regulating
                    molecules</h5>
                <table id="table-transcriptions" class="table table-responsive table-striped table-bordered border-dark">
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
                <h5 class="card-title" id="molecule_gene_annotation">Gene Annotation</h5>
                <div class="card-text">{!! $molecule->molecule_gene_annotation !!}</div>
            </div>
        </div>

        <hr>
        <h4 class="text-center" id="transcript">TRANSCRIPT <a href="#toc"><i class="fa fa-arrow-circle-up" style="float: right"></i></a></h4>

        <!-- Transcript Sequence Links -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="molecule_transcript_sequence_links">Transcript Sequence Links</h5>
                <div class="card-text">{!! $molecule->molecule_transcript_sequence_links !!}</div>
            </div>
        </div>
        <!-- Post-transcriptional Modification -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="molecule_post_translational_modification">Post-transcriptional Modification</h5>
                <div class="card-text">{!! $molecule->molecule_post_translational_modification !!}</div>
            </div>
        </div>
        <!-- Transcript Annotation -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="molecule_transcript_annotation">Transcript Annotation</h5>
                <div class="card-text">{!! $molecule->molecule_transcript_annotation !!}</div>
            </div>
        </div>

        <hr>
        <h4 class="text-center" id="protein">PROTEIN <a href="#toc"><i class="fa fa-arrow-circle-up" style="float: right"></i></a></h4>

        <!-- Biochemical Activity -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="molecule_biochemical_activity">Biochemical Activity</h5>
                <div class="card-text">{!! $molecule->molecule_biochemical_activity !!}</div>
            </div>
        </div>
        <!-- Protein Sequence Links -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="molecule_protein_sequence_links">Protein Sequence Links</h5>
                <div class="card-text">{!! $molecule->molecule_protein_sequence_links !!}</div>
            </div>
        </div>
        <!-- Protein Sequence Annotation -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="molecule_protein_sequence_annotation">Protein Sequence Annotation</h5>
                <div class="card-text">{!! $molecule->molecule_protein_sequence_annotation !!}</div>
            </div>
        </div>
        <!-- Protein Polymorphism -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="molecule_protein_polymorphism">Protein Polymorphism</h5>
                <div class="card-text">{!! $molecule->molecule_protein_polymorphism !!}</div>
            </div>
        </div>
        <!-- Protein Physical Properties -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="molecule_protein_properties">Protein Physical Properties</h5>
                <div class="card-text">{!! $molecule->molecule_protein_properties !!}</div>
            </div>
        </div>
        <!-- Post-translational Modification -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Protein modification</h5>
                <div class="card-text">
                    <ul>
                        <li><strong>Glycosylation:</strong> {!! ucwords($molecule->molecule_protein_glycosylation) !!}</li>
                        <li><strong>Phosphorylation:</strong> {!! ucwords($molecule->molecule_protein_phosphorylation) !!}</li>
                        <li><strong>Sulfation:</strong> {!! ucwords($molecule->molecule_protein_sulfation) !!}</li>
                        <li><strong>Nitrosylation:</strong> {!! ucwords($molecule->molecule_protein_nitrosylation) !!}</li>
                    </ul>
                    <strong>Other:</strong> {!! ucwords($molecule->molecule_protein_other) !!}
                </div>
            </div>
        </div>
        <!-- Protein Structure Links -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" >Protein structure links</h5>
                <div class="card-text">
                    <ul>
                        <li><strong>PDB ID/s:</strong> {{ $molecule->molecule_protein_pbdid }}</li>
                        <li><strong>PDB Link:</strong> <a href="{{$molecule->molecule_protein_pbdlink}}">{!! $molecule->molecule_protein_pbdlink !!}</a></li>
                        <li><strong>CAZy Link:</strong> <a href="{{$molecule->molecule_protein_cazylink}}">{!! $molecule->molecule_protein_cazylink !!}</a></li>
                        <li><strong>Other Link:</strong> <a href="{{$molecule->molecule_protein_otherlink}}">{!! $molecule->molecule_protein_otherlink !!}</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <hr>
        <h4 class="text-center" id="molecular-interactions">MOLECULAR INTERACTIONS <a href="#toc"><i class="fa fa-arrow-circle-up" style="float: right"></i></a></h4>

        <!-- Protein Structure Links -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="molecule_molecular_pathways">Molecular Pathways</h5>
                <div class="card-text">{!! $molecule->molecule_molecular_pathways !!}</div>
            </div>
        </div>
        <!-- Protein Structure Links -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="molecule_enzymes_substrate">Enzymes for which this is a Substrate</h5>
                <div class="card-text">{!! $molecule->molecule_enzymes_substrate !!}</div>
            </div>
        </div>
        <!-- Substrates -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="substrates">Substrates</h5>
                <table id="table-substrates" class="table table-bordered table-striped table-responsive border-dark">
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
                <h5 class="card-title" id="molecule_other_ligands_associated_molecules">Other Ligands and Associated Molecules</h5>
                <div class="card-text">{!! $molecule->molecule_other_ligands_associated_molecules !!}</div>
            </div>
        </div>

        <hr>
        <h4 class="text-center" id="reagent">REAGENTS <a href="#toc"><i class="fa fa-arrow-circle-up" style="float: right"></i></a></h4>

        <!-- Model animal strains -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="animal-strains">Model animal strains</h5>
                <table id="table-strains" class="table table-bordered table-striped table-responsive border-dark">
            <thead role="rowgroup" class="thead-dark">
            <tr role="row">
                <th role='columnheader'>Species or Strain</th>
                <th role='columnheader'>Supplier</th>
                <th role='columnheader'>Comment</th>
            </tr>
            </thead>
            <tbody>
            @if(count($molecule->moleculestrains)>0)
                @foreach($molecule->moleculestrains as $strain)
                    <tr data-strain-id="{{$strain->id}}">
                        <td>{{$strain->molecule_species_or_strain}}</td>
                        <td>{!! $strain->molecule_strain_supplier !!}</td>
                        <td>{!! $strain->molecule_strain_comment !!}</td>
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
        </table>
            </div>
        </div>

        <!-- Monoclonal antibodies -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="molecule_monoclonal_antibodies">Monoclonal antibodies</h5>
                <div class="card-text">{!! $molecule->molecule_monoclonal_antibodies !!}</div>
            </div>
        </div>
        <!-- Polyclonal antibodies -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="molecule_polyclonal_antibodies">Polyclonal antibodies</h5>
                <div class="card-text">{!! $molecule->molecule_polyclonal_antibodies !!}</div>
            </div>
        </div>
        <!-- Drugs and small molecules -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="molecule_drug_small_molecules">Drugs and small molecules</h5>
                <div class="card-text">{!! $molecule->molecule_drug_small_molecules !!}</div>
            </div>
        </div>
        <!-- Genetic constructs -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="molecule_genetic_constructs">Genetic constructs</h5>
                <div class="card-text">{!! $molecule->molecule_genetic_constructs !!}</div>
            </div>
        </div>
        <!-- Purified protein -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="molecule_purified_protein">Purified protein</h5>
                <div class="card-text">{!! $molecule->molecule_purified_protein !!}</div>
            </div>
        </div>

        <!-- Reagents Misc. -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="reagents-misc">Reagents Misc.</h5>
                <table id="table-reagents" class="table table-striped table-responsive table-bordered border-dark">
                    <thead role="rowgroup" class="thead-dark">
                    <tr role="row">
                        <th role='columnheader'>Reagent</th>
                        <th role='columnheader'>Supplier</th>
                        <th role='columnheader'>Comment</th>

                    </tr>
                    </thead>
                    <tbody>
                    @if(count($molecule->moleculereagents)>0)
                        @foreach($molecule->moleculereagents as $reagent)
                            <tr data-reagent-id="{{$reagent->id}}">
                                <td>{{$reagent->molecule_reagent}}</td>
                                <td>{!! $reagent->molecule_reagent_supplier !!}</td>
                                <td>{!! $reagent->molecule_reagent_comment !!}</td>
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

                </table>

            </div>
        </div>

        <hr>
        <h4 class="text-center" id="references">REFERENCES <a href="#toc"><i class="fa fa-arrow-circle-up" style="float: right"></i></a></h4>

        <!-- Reviews -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="molecule_reference_reviews">Reviews</h5>
                <div class="card-text">{!! $molecule->molecule_reference_reviews !!}</div>
            </div>
        </div>
        <!-- Primary citations -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="molecule_reference_primary_citations">Primary citations</h5>
                <div class="card-text">{!! $molecule->molecule_reference_primary_citations !!}</div>
            </div>
        </div>
        <!-- WWW resources -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" id="molecule_reference_www_resources">WWW resources</h5>
                <div class="card-text">{!! $molecule->molecule_reference_www_resources !!}</div>
            </div>
        </div>
    </div>
</body>

</html>


