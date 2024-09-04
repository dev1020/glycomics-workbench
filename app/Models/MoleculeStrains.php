<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MoleculeStrains extends Model {
    use HasFactory;

    protected $table = 'molecules_model_animal_strains';
    protected $fillable = ["molecule_id","molecule_species_or_strain", "molecule_strain_supplier", "molecule_strain_comment"];

}
