<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Term extends Model
{
    use HasFactory;

    protected $guarded =[''];

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class,'term_course')
            ->using(TermCourse::class)
            ->withPivot('price','minimum_num','maxmum_num');
    }
}
