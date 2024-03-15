<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ApiController extends Controller
{
    public function getAllMovies()
    {
        $movies = Movie::get()->toJson(JSON_PRETTY_PRINT);
        return response($movies, 200);
    }

    public function createMovie(Request $request)
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

        return response()->json([
            "message" => "movie record created"
        ], 201);
    }

    public function getMovie($id)
    {
        if (Movie::where('id', $id)->exists()) {
            $movie = Movie::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($movie, 200);
        } else {
            return response()->json([
                "message" => "Movie not found"
            ], 404);
        }
    }

    public function updateMovie(Request $request, $id)
    {

        if (Movie::where('id', $id)->exists()) {
            $movie = Movie::find($id);
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

            return response()->json([
                "message" => "records updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Movie not found",
            ], 404);
        }
    }

    public function deleteMovie($id)
    {
        if (Movie::where('id', $id)->exists()) {
            $movie = Movie::find($id);
            $movie->delete();

            return response()->json([
                "message" => "records deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Movie not found"
            ], 404);
        }
    }
}
