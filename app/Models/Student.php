<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Authenticatable
{
    use HasFactory, HasUuids, Notifiable, SoftDeletes;

    protected $guarded = ["id"];

    protected $hidden = ["password"];

    public function study() : BelongsTo {
        return $this->belongsTo(Study::class);
    }

    public function class() : BelongsTo {
        return $this->belongsTo(Classes::class);
    }

    public function scopeSearch(Builder $query) : void {
        if (request("search")) {
            $search = request("search");
            $query->where("name", "LIKE", "%$search%")->orWhere("nim", "LIKE", "%$search%")->orWhere("gender", "LIKE", "%$search%")->orWhereHas("study", function($study) use ($search) {
                $study->where("name", "LIKE", "%$search%");
            })->orWhereHas("class", function($class) use ($search) {
                $class->where("name", "LIKE", "%$search%");
            });
        };
    }

    protected static function booted() : void {
        parent::boot();

        static::created(function (Student $student) {
            $student->class()->increment("total");
        });

        static::deleted(function (Student $student) {
            $student->class()->decrement("total");
        });
    }
}
