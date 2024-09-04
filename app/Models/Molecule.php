<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Molecule extends Model {
    use HasFactory,HasUuids;

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $table = 'molecules';
    protected $guarded = ["molecule_gw_id,molecule_image"];

    public function transcriptionregulators(): HasMany
    {
        return $this->hasMany(MoleculeTranscriptionRegulators::class);
    }
    public function moleculesubstrates(): HasMany
    {
        return $this->hasMany(MoleculeSubstrates::class);
    }
    public function moleculestrains(): HasMany
    {
        return $this->hasMany(MoleculeStrains::class);
    }
    public function moleculereagents(): HasMany
    {
        return $this->hasMany(MoleculeReagents::class);
    }
    public function moleculeAssay(): BelongsTo
    {
        return $this->belongsTo(AssayMethod::class,'molecule_assay_methodid');
    }
}
