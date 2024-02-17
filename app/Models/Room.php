<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $guarded = ["id"];

    public function building() : BelongsTo {
        return $this->belongsTo(Building::class);
    }

    public function scopeSearch(Builder $query) {
        if (request("search")) {
            $search = request("search");
            $query->where("room", "LIKE", "%$search%")->orWhereHas("building", function($building) use ($search) {
                $building->where("name", "LIKE", "%$search%");
            });
        }
    }
}
