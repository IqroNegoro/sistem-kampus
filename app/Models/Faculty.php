<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faculty extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = "faculties";

    protected $guarded = ["id"];

    public function scopeSearch(Builder $query) : void {
        if (request()->has("search")) {
            $search = request("search");
            $query->where("name", "LIKE", "%$search%");
        }
    }

    public function lecturers() : HasMany {
        return $this->hasMany(Lecturer::class, "faculty_id", "id");
    }
}
