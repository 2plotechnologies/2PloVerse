<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    use HasFactory;

    protected $table = 'magazines';

    protected $fillable = ['name', 'description', 'image', 'user_id', 'category_id'];

    public $timestamps = false;

    public function posts()
    {
        return $this->hasMany(MagazinePost::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
