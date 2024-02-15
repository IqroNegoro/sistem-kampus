<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Faculty extends Model
{
    use HasFactory, HasUuids;

    protected $table = "faculties";

    protected $guarded = ["id"];

    public function lecturers() : HasMany {
        return $this->hasMany(Lecturer::class, "faculty_id", "id");
    }
}
