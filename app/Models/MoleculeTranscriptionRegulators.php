<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MoleculeTranscriptionRegulators extends Model {
    use HasFactory;

    protected $table = 'molecules_transcription_regulators';
    protected $fillable = ["molecule_id","transcription_factors", "transcription_comments", "transcription_references"];

}
