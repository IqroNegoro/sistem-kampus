<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $guarded = ["id"];

    public function study() : BelongsTo {
        return $this->belongsTo(Study::class);
    }

    public function class() : BelongsTo {
        return $this->belongsTo(Classes::class);
    }

    protected static function booted() : void {
        parent::boot();

        static::created(function (Student $student) {
            $student->class()->increment("total");
        });

        static::deleted(function (Student $student) {
            $student->class()->decrement("total");
        });
    }
}
