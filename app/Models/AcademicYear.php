<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicYear extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $guarded = ["id"];

    public function scopeSearch(Builder $query) : void {
        if (request("search")) {
            $search = request("search");
            $query->where("year", "LIKE", "%$search%")->orWhere("year", "semester", "%$search%");
        }
    }
}
