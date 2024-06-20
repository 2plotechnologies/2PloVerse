<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $table = 'chapters';

    protected $fillable = ['title', 'content', 'history_id'];

    public $timestamps = false;

    public function history()
    {
        return $this->belongsTo(History::class);
    }
}
