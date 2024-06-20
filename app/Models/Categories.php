<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['name'];

    public $timestamps = false;

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'category_id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'category_id');
    }

    public function histories()
    {
        return $this->hasMany(History::class, 'category_id');
    }

    public function magazines()
    {
        return $this->hasMany(Magazine::class, 'category_id');
    }
}
