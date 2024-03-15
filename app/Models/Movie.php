<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'poster', 'total_score', 'year', 'synopsis', 'genre', 'country'];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['genre'] ?? false) {
            $query->where('genre', 'like', '%' . request('genre') . '%');
        }
        if ($filters['search'] ?? false) {
            $query->where('genre', 'like', '%' . request('search') . '%')
                ->orWhere('title', 'like', '%' . request('search') . '%')
                ->orWhere('country', 'like', '%' . request('search') . '%');
        }
    }

    public function score()
    {
        return $this->hasMany(Score::class, 'movie_id');
    }
}
