<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classes extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = "class";

    protected $guarded = ["id"];

    public function study() : BelongsTo {
        return $this->belongsTo(Study::class);
    }

    public function lecturer() : BelongsTo {
        return $this->belongsTo(Lecturer::class);
    }
}
