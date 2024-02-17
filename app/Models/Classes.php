<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    public function scopeSearch(Builder $query) : void {
        if (request("search")) {
            $search = request("search");
            $query->where("name", "LIKE", "%$search%")->orWhere("generation", "LIKE", "%$search%")->orWhere("total", "LIKE", "%$search%")->orWhereHas("study", function($study) use ($search) {
                $study->where("name", "LIKE", "%$search%");
            })->orWhereHas("lecturer", function($lecturer) use ($search) {
                $lecturer->where("name", "LIKE", "%$search%");
            });
        }
    }
}
