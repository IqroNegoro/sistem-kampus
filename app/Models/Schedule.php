<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    public function scopeSearch(Builder $query) : void {
        if (request("search")) {
            $search = request("search");
            $query->where("day", "LIKE", "%$search%")->orWhereHas("course", function($course) use ($search) {
                $course->where("name", "LIKE", "%$search%")->orWhere("code", "LIKE", "%$search%");
            })->orWhereHas("lecturer", function($lecturer) use ($search) {
                $lecturer->where("name", "LIKE", "%$search%");
            })->orWhereHas("room", function($room) use ($search) {
                $room->where("room", "LIKE", "%$search%")->orWhereHas("building", function($building) use ($search) {
                    $building->where("name", "LIKE", "%$search%");
                });
            });
        }
    }
}
