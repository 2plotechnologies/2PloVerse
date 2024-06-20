<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $table = 'units';

    protected $fillable = ['title', 'course_id'];

    public $timestamps = false;

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function histories()
    {
        return $this->hasMany(History::class);
    }

    public function magazines()
    {
        return $this->hasMany(Magazine::class);
    }
}
