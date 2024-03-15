<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'score' => 'required'
        ]);
        $user = Auth::user();
        $movieId = $request['movie_id'];

        $formFields['user_id'] = $user->id;
        $formFields['movie_id'] = $movieId;
        $score = Score::create($formFields);

        $movie = Movie::find($movieId);
        $totalScores = Score::where('movie_id', $movieId)->pluck('score')->toArray();
        $averageRating = count($totalScores) > 0 ? array_sum($totalScores) / count($totalScores) : 0;
        $movie->total_score = $averageRating;
        $movie->save();

        return redirect()->back()->with('message', 'Avaliação salva com sucesso!');
    }
}
