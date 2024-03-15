<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Score extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'movie_id', 'score'];

    //Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id');
    }
}
