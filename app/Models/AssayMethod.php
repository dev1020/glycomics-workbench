<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssayMethod extends Model {
    use HasFactory;

    protected $table = 'molecules_assay_methods';

    protected $fillable = ['assay_method_id','assay_method_name','assay_method_details'];
    public function userCreatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
