<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $table = 'lessons';

    protected $fillable = ['title', 'content', 'unit_id'];

    public $timestamps = false;

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
