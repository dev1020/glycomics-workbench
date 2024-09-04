<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MoleculeSubstrates extends Model {
    use HasFactory;

    protected $table = 'molecules_substrates';
    protected $fillable = ["molecule_id","molecular_substrate", "substrate_comments", "substrate_references"];

}
