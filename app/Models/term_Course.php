<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class term_Course extends Model
{
    use HasFactory;

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }
    public function period()
    {
        return $this->belongsTo(Period::class);
    }
    public function term()
    {
        return $this->belongsTo(Term::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}

