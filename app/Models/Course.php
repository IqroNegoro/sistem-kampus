<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $guarded = ["id"];

    public function study() : BelongsTo {
        return $this->belongsTo(Study::class);
    }

    public function scopeSearch(Builder $query) : void {
        if (request("search")) {
            $search = request("search");
            $query->where("code", "LIKE", "%$search%")->orWhere("name", "LIKE", "%$search%")->orWhere("sks", "LIKE", "%$search%")->orWhere("semester", "LIKE", "%$search%")->orWhereHas("study", function($study) use ($search) {
                $study->where("name", "LIKE", "%$search%");
            });
        }
    }
}
