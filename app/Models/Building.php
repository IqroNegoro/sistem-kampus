<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Building extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $guarded = ["id"];

    public function rooms() : HasMany {
        return $this->hasMany(Room::class);
    }

    public function scopeSearch(Builder $query) : void {
        if (request("search")) {
            $search = request("search");
            $query->where("name", "LIKE", "%$search%");
        }
    }
}
