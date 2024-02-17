<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Study extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $guarded = ["id"];

    public function faculty() : BelongsTo {
        return $this->belongsTo(Faculty::class);
    }

    public function lecturer() : BelongsTo {
        return $this->belongsTo(Lecturer::class);
    }
    
    public function scopeSearch(Builder $query) : void {
        if (request("search")) {
            $search = request("search");
            $query->where("study_code", "LIKE", "%$search%")->orWhere("name", "LIKE", "%$search%")->orWhere("semester", "LIKE", "%$search%")->orWhereHas("faculty", function($faculty) use ($search) {
                $faculty->where("name", "LIKE", "%$search%");
            })->orWhereHas("lecturer", function($lecturer) use ($search) {
                $lecturer->where("name", "LIKE", "%$search%");
            });
        }
    }
}
