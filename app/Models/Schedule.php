<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $guarded = ["id"];

    public function study() : BelongsTo {
        return $this->belongsTo(Study::class);
    }
    
    public function academicYear() : BelongsTo {
        return $this->belongsTo(AcademicYear::class, "year_id");
    }

    public function classes() : BelongsTo {
        return $this->belongsTo(Classes::class, "class_id");
    }

    public function course() : BelongsTo {
        return $this->belongsTo(Course::class);
    }

    public function lecturer() : BelongsTo {
        return $this->belongsTo(Lecturer::class);
    }

    public function room() : BelongsTo {
        return $this->belongsTo(Room::class);
    }
}
