<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [""];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public function story()
    {
        return $this->belongsTo(Book::class,'story_id');
    }
    public function terms(): BelongsToMany
    {
        return $this->belongsToMany(Term::class,'term_course');
    }
    public function course()
    {
        return $this->hasMany(Course::class);
    }
    public function term()
    {
        return $this->hasMany(Term::class);
    }
}
