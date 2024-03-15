<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    //Show all movies
    public function index()
    {
        return view('home', [
            'movies' => Movie::latest()->filter(request(['genre', 'search']))->get()
        ]);
    }

    //Show single movie
    public function show(Movie $movie)
    {
        if (Auth::user()) {
            $user = Auth::user();
            $score = Score::where('user_id', $user->id)
                ->where('movie_id', $movie->id)
                ->first();
        } else {
            $score = null;
        }


        return view('movies/movie-detail', [
            'movie' => $movie,
            'score' => $score
        ]);
    }

    public function create()
    {
        return view('movies/movie-create');
    }

    public function store(Request $request)
    {
        $formField = $request->validate([
            'title' => ['required', Rule::unique('movies', 'title')],
            'year' => 'required',
            'synopsis' => 'required',
            'genre' => 'required',
            'country' => 'required',
        ]);

        if ($request->hasFile('poster')) {
            $formField['poster'] = $request->file('poster')->store('posters', 'public');
        }
        $formField['total_score'] = 0;
        Movie::create($formField);
        return redirect('/')->with('message', 'Filme criado com sucesso!');
    }

    public function edit(Movie $movie)
    {
        return view('movies/movie-edit', ['movie' => $movie]);
    }

    public function update(Request $request, Movie $movie)
    {
        $formField = $request->validate([
            'title' => 'required',
            'year' => 'required',
            'synopsis' => 'required',
            'genre' => 'required',
            'country' => 'required',
        ]);

        if ($request->hasFile('poster')) {
            $formField['poster'] = $request->file('poster')->store('posters', 'public');
        }

        $formField['score'] = $movie->score;

        $movie->update($formField);
        return redirect('/movie/' . $movie->id);
    }

    public function destroy(Movie $movie)
    {
        Storage::disk('local')->delete('app/storage/app/public/' . $movie->poster);
        $movie->delete();
        return redirect('/');
    }
}
