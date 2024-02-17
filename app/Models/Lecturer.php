<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lecturer extends Model
{
    use HasFactory, HasUuids, SoftDeletes; // softDeletes if you want

    protected $guarded = ["id"];

    public function faculty() : BelongsTo {
        return $this->belongsTo(Faculty::class);
    }

    public function courses() : HasMany {
        return $this->hasMany(Course::class);
    }

    public function scopeSearch(Builder $query) : void {
        error_log(request("search"));
        if (request("search")) {
            $search = request("search");
            $query->where("name", "LIKE", "%$search%")->orWhere("nidn", "LIKE", "%$search%")->orWhere("gender", "LIKE", "%$search%")->orWhereHas("faculty", function($faculty) use ($search) {
                $faculty->where("name", "LIKE", "%$search%");
            });
        }
    }
}
