<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lecturer extends Model
{
    use HasFactory, HasUuids; // softDeletes if you want

    protected $guarded = ["id"];

    public function faculty() : BelongsTo {
        return $this->belongsTo(Faculty::class, "faculty_id", "id");
    }
}
