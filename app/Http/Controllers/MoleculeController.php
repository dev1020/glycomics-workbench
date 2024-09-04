<?php

namespace App\Http\Controllers;

use App\Models\AssayMethod;
use App\Models\Molecule;
use App\Models\MoleculeReagents;
use App\Models\MoleculeStrains;
use App\Models\MoleculeSubstrates;
use App\Models\MoleculeTranscriptionRegulators;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

//use Spatie\Browsershot\Browsershot;
//use Spatie\LaravelPdf\Enums\Format;
//use Spatie\LaravelPdf\Facades\Pdf;
//use function Spatie\LaravelPdf\Support\pdf;
use Barryvdh\DomPDF\Facade\Pdf;

//use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;


class MoleculeController extends Controller
{

    public function __construct()
    {
        //$this->authorizeResource(Page::class, 'page');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,)
    {
        $user_id = $request->user()->id;
        $molecules = Molecule::query();
        if(!Request()->user()->hasRole('admin') ){
            $molecules->where('created_by', '=', $user_id);
        }

        if (!!$request->trashed) {
            $molecules->withTrashed();
        }

        if (!empty($request->search)) {
            $molecules->where('molecule_main_title', 'like', '%' . $request->search . '%');
        }

        $molecules = $molecules->paginate(10);
        if(request()->is('*admin*')){
            return view('admin.molecule.index',['molecules' => $molecules]);
        }else{
            return view('front.molecule.index', ['molecules' => $molecules]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('front.molecule.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,)
    {

        $request->validate([
            "molecule_main_title" => "required",
            "molecule_author" => "required",
            "molecule_reviewers" => "nullable",
            //"molecule_gw_id" => "nullable"
        ]);

        try {

            $molecule = new Molecule();
            $molecule->molecule_main_title = $request->molecule_main_title;
            $molecule->molecule_author = $request->molecule_author;
            $molecule->molecule_reviewers = $request->molecule_reviewers;
            $molecule->created_by = $request->user()->id;

            $molecule->save();

            return redirect()->route('molecules.edit', [$molecule])->with('success', __('Molecule created successfully.'));
        } catch (\Throwable $e) {
            var_dump($e->getMessage());
            return redirect()->route('molecules.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Page $page
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Molecule $molecule,)
    {
        if(request()->is('*admin*')){
            return view('admin.molecule.show', compact('molecule'));
        }else{
            return view('front.molecule.pdf.moleculeDomPdf', compact('molecule'));
        }

    }

    public function showPdf(Molecule $molecule,)
    {
        //$pdfTemplate = view('front.molecule.pdf.moleculepdf', ['molecule' => $molecule])->render();
//        $pdfHeaderTemplate = view('front.molecule.pdf.moleculePdfHeader',['molecule'=>$molecule])->render();
//        $pdfFooterTemplate = view('front.molecule.pdf.moleculePdfFooter')->render();
//        return pdf()->view('front.molecule.pdf.moleculepdf',['molecule'=>$molecule])
//            ->margins('15', '0', '10', '0')
//            ->headerView('front.molecule.pdf.moleculePdfHeader',['molecule'=>$molecule])
//            ->footerView('front.molecule.pdf.moleculePdfFooter')
//            ->name(Str::slug($molecule->molecule_main_title).'.pdf')
//            ->format('a4');
        $pdf = Pdf::setOption([

            'isPhpEnabled' => true,
            //'debugLayout'=>true,
            'isRemoteEnabled' => true,
        ]);
        $pdf->loadView('front.molecule.pdf.moleculeDomPdf', ['molecule' => $molecule]);
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();

        $canvas = $dom_pdf->get_canvas();
        $canvas->page_text(275, 825, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 8, [0, 0, 0], 0, 0, 0);
        return $pdf->stream();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Molecule $molecule
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Molecule $molecule,)
    {
        $user_id = Request()->user()->id;

        if(request()->is('*admin*')){
            return view('admin.molecule.edit', compact('molecule'));
        }else{
            if ($molecule->created_by == $user_id) {
                return view('front.molecule.edit', compact('molecule'));
            }else{
                abort(403);
            }
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Molecule $molecule,)
    {
//        echo "<pre>";
//        print_r($request->all());
//        exit;
        $request->validate([
            "molecule_image" => "nullable|mimes:png,jpg,jpeg,webp",
        ]);

        if ($request->has('molecule_image')) {
            $moleculeImageFile = $request->file('molecule_image');
            $moleculeImageExtension = $moleculeImageFile->getClientOriginalExtension();
            $moleculeImageFilename = time() . '.' . $moleculeImageExtension;
            $path = 'uploads/molecules/';
            $moleculeImageFile->move($path, $moleculeImageFilename);
            if (File::exists($molecule->molecule_image)) {
                File::delete($molecule->molecule_image);
            }
        }
        if ($request->has('molecule_image')) {
            $molecule->molecule_image = $path . $moleculeImageFilename;
        }
        $molecule->update($request->except('molecule_image'));

        return redirect()->route('molecules.edit', [$molecule])->with('success', __('Molecule edited successfully.'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Molecule $molecule
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Molecule $molecule)
    {

        try {
            $molecule->delete();
            return redirect()->route('molecules.index', [])->with('success', __('Molecule deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('molecules.index', [])->with('error', 'Cannot delete Page: ' . $e->getMessage());
        }
    }

    //@softdelete

    /**
     * Restore the specified deleted resource from storage.
     *
     * @param \App\Models\Molecule $molecule
     *
     * @return \Illuminate\Http\Response
     */
    public function restore(int $molecule_id,)
    {
        $molecule = Molecule::withTrashed()->find($molecule_id);
        $this->authorize('delete', [Molecule::class, $molecule]);

        if (!empty($molecule)) {
            $molecule->restore();
            return redirect()->route('molecules.index', [])->with('success', __('Molecule restored successfully'));
        } else {
            return redirect()->route('molecules.index', [])->with('error', 'Molecule not found');
        }
    }

    public function purge(int $molecule_id,)
    {
        $molecule = Molecule::withTrashed()->find($molecule_id);
        $this->authorize('delete', [Molecule::class, $molecule]);

        if (!empty($molecule)) {
            $molecule->forceDelete();
            return redirect()->route('molecules.index', [])->with('success', __('Molecule purged successfully'));
        } else {
            return redirect()->route('molecules.index', [])->with('error', __('Molecule not found'));
        }
    }


    public function saveTranscription(Request $request)
    {
        if ($request->transcription_id) {
            $request->validate([
                "molecule_id" => "required",
                "transcription_id" => "required",
                "transcription_factors" => "required",
                "transcription_comments" => "required",
                "transcription_references" => "nullable",
            ]);
            $transcription = MoleculeTranscriptionRegulators::findOrFail($request->transcription_id);
            $transcription->update($request->all());
            if ($transcription->save()) {
                return response()->json(['transcription' => $transcription, 'status' => 'done']);
            } else {
                return response()->json(['status' => 'fail']);
            }
        } else {
            $request->validate([
                "molecule_id" => "required",
                "transcription_factors" => "required",
                "transcription_comments" => "required",
                "transcription_references" => "nullable",
            ]);

            $transcription = MoleculeTranscriptionRegulators::create($request->all());
            if ($transcription->save()) {
                return response()->json(['transcription' => $transcription, 'status' => 'done']);
            }
        }

    }

    public function getTranscription(int $id)
    {
        $transcription = MoleculeTranscriptionRegulators::findOrFail($id);
        return response()->json(['transcription' => $transcription, 'status' => 'done']);
    }

    public function deleteTranscription(int $id)
    {
        $transcription = MoleculeTranscriptionRegulators::findOrFail($id);
        if ($transcription->delete()) {
            return response()->json(['status' => 'deleted']);
        } else {
            return response()->json(['status' => 'failed']);
        }

    }

    public function saveSubstrate(Request $request)
    {
        if ($request->substrate_id) {
            $request->validate([
                "molecule_id" => "required",
                "substrate_id" => "required",
                "molecular_substrate" => "required",
                "substrate_comments" => "required",
                "substrate_references" => "nullable",
            ]);
            $substrate = MoleculeSubstrates::findOrFail($request->substrate_id);
            $substrate->update($request->all());
            if ($substrate->save()) {
                return response()->json(['substrate' => $substrate, 'status' => 'done']);
            }
        } else {
            $request->validate([
                "molecule_id" => "required",
                "molecular_substrate" => "required",
                "substrate_comments" => "required",
                "substrate_references" => "nullable",
            ]);

            $substrate = MoleculeSubstrates::create($request->all());
            if ($substrate->save()) {
                return response()->json(['substrate' => $substrate, 'status' => 'done']);
            }
        }

    }

    public function getSubstrate(int $id)
    {
        $substrate = MoleculeSubstrates::findOrFail($id);
        return response()->json(['substrate' => $substrate, 'status' => 'done']);
    }

    public function deleteSubstrate(int $id)
    {
        $substrate = MoleculeSubstrates::findOrFail($id);
        if ($substrate->delete()) {
            return response()->json(['status' => 'deleted']);
        } else {
            return response()->json(['status' => 'failed']);
        }
    }

    public function saveStrain(Request $request)
    {
        if ($request->strain_id) {
            $request->validate([
                "molecule_id" => "required",
                "strain_id" => "required",
                "molecule_species_or_strain" => "required",
                "molecule_strain_supplier" => "required",
                "molecule_strain_comment" => "nullable",
            ]);
            $strain = MoleculeStrains::findOrFail($request->strain_id);
            $strain->update($request->all());
            if ($strain->save()) {
                return response()->json(['strain' => $strain, 'status' => 'done']);
            }
        } else {
            $request->validate([
                "molecule_id" => "required",
                "molecule_species_or_strain" => "required",
                "molecule_strain_supplier" => "required",
                "molecule_strain_comment" => "nullable",
            ]);

            $strain = MoleculeStrains::create($request->all());
            if ($strain->save()) {
                return response()->json(['strain' => $strain, 'status' => 'done']);
            }
        }

    }

    public function getStrain(int $id)
    {
        $strain = MoleculeStrains::findOrFail($id);
        return response()->json(['strain' => $strain, 'status' => 'done']);
    }

    public function deleteStrain(int $id)
    {
        $strain = MoleculeStrains::findOrFail($id);
        if ($strain->delete()) {
            return response()->json(['status' => 'deleted']);
        } else {
            return response()->json(['status' => 'failed']);
        }
    }

    public function saveReagent(Request $request)
    {
        if ($request->reagent_id) {
            $request->validate([
                "molecule_id" => "required",
                "reagent_id" => "required",
                "molecule_reagent" => "required",
                "molecule_reagent_supplier" => "required",
                "molecule_reagent_comment" => "nullable",
            ]);
            $reagent = MoleculeReagents::findOrFail($request->reagent_id);
            $reagent->update($request->all());
            if ($reagent->save()) {
                return response()->json(['reagent' => $reagent, 'status' => 'done']);
            }
        } else {
            $request->validate([
                "molecule_id" => "required",
                "molecule_reagent" => "required",
                "molecule_reagent_supplier" => "required",
                "molecule_reagent_comment" => "nullable",
            ]);

            $reagent = MoleculeReagents::create($request->all());
            if ($reagent->save()) {
                return response()->json(['reagent' => $reagent, 'status' => 'done']);
            }
        }

    }

    public function getReagent(int $id)
    {
        $reagent = MoleculeReagents::findOrFail($id);
        return response()->json(['reagent' => $reagent, 'status' => 'done']);
    }

    public function deleteReagent(int $id)
    {
        $reagent = MoleculeReagents::findOrFail($id);
        if ($reagent->delete()) {
            return response()->json(['status' => 'deleted']);
        } else {
            return response()->json(['status' => 'failed']);
        }
    }

    public function deleteImage(string $id)
    {
        $molecule = Molecule::findOrFail($id);
        if (File::exists($molecule->molecule_image)) {
            File::delete($molecule->molecule_image);
            $molecule->molecule_image = null;
            $molecule->save();
            return response()->json(['status' => 'deleted']);
        }
        return response()->json(['status' => 'failed']);
    }

    public function assayList(Request $request,)
    {

        $assay = AssayMethod::query();

        if (!!$request->trashed) {
            $assay->withTrashed();
        }

        if (!empty($request->search)) {
            $assay->where('assay_method_name', 'like', '%' . $request->search . '%');
        }

        $assay = $assay->paginate(10);

        return view('admin.molecule.assayList', compact('assay'));
    }

    public function assayCreate()
    {
        return view('admin.molecule.assayCreate', []);
    }
    public function assayStore(Request $request){
        $request->validate([
            "assay_method_id" => "required",
            "assay_method_name" => "required",
        ]);

        try {

            $assay = new AssayMethod();
            $assay->assay_method_id = $request->assay_method_id;
            $assay->assay_method_name = $request->assay_method_name;
            $assay->created_by = $request->user()->id;

            $assay->save();

            return redirect()->route('assays.index', [])->with('success', __('Assay Method created successfully.'));
        } catch (\Throwable $e) {
            var_dump($e->getMessage());
            return redirect()->route('assays.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function assayEdit(AssayMethod $assay)
    {
        return view('admin.molecule.assayEdit', compact('assay'));
    }

    public function assayUpdate(Request $request, AssayMethod $assay,)
    {
        $request->validate([
            "assay_method_id" => "required",
            "assay_method_name" => "required",
            "assay_method_details"=>'nullable'
        ]);

        try {
            $assay->update($request->all());

            return redirect()->route('assays.index', [])->with('success', __('Assay Method Updated successfully.'));
        } catch (\Throwable $e) {
            var_dump($e->getMessage());
            return redirect()->route('assays.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function assayDestroy(AssayMethod $assay)
    {

        try {
            $assay->delete();
            return redirect()->route('assays.index', [])->with('success', __('Assay deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('assays.index', [])->with('error', 'Cannot delete Assay: ' . $e->getMessage());
        }
    }

    public function getAssayMethods(Request $request){
        $data = AssayMethod::where('assay_method_name','like','%' . $request->searchItem . '%');
        return $data->paginate(10,['*'],'page',$request->page);

    }

}
