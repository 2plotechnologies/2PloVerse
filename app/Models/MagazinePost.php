<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MagazinePost extends Model
{
    use HasFactory;

    protected $table = 'magazine_post';

    protected $fillable = ['title', 'content', 'magazine_id'];

    public $timestamps = false;

    public function magazine()
    {
        return $this->belongsTo(Magazine::class);
    }
}
