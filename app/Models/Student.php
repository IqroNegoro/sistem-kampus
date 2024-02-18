<?php

namespace App\Models;

use App\Mail\ActivateAccount;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Mail;

class Student extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $guarded = ["id"];

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
            Mail::to($student->email)->send(new ActivateAccount($student));
        });

        static::deleted(function (Student $student) {
            $student->class()->decrement("total");
        });
    }
}
