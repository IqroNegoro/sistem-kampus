<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lecturer extends Authenticatable
{
    use HasFactory, HasUuids, Notifiable, SoftDeletes; // softDeletes if you want

    protected $guarded = ["id"];

    protected $hidden = ["password"];

    public function faculty() : BelongsTo {
        return $this->belongsTo(Faculty::class);
    }

    public function courses() : HasMany {
        return $this->hasMany(Course::class);
    }

    public function scopeSearch(Builder $query) : void {
        if (request("search")) {
            $search = request("search");
            $query->where("name", "LIKE", "%$search%")->orWhere("nidn", "LIKE", "%$search%")->orWhere("gender", "LIKE", "%$search%")->orWhereHas("faculty", function($faculty) use ($search) {
                $faculty->where("name", "LIKE", "%$search%");
            });
        }
    }
}
