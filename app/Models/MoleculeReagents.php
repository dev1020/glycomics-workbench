<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MoleculeReagents extends Model {
    use HasFactory;

    protected $table = 'molecules_reagents';
    protected $fillable = ["molecule_id","molecule_reagent", "molecule_reagent_supplier", "molecule_reagent_comment"];

}
