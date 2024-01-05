<?php

namespace App\Repository;

use App\Models\Movie;

class MovieRepository
{
    public function getAllMovies()
    {
        return Movie::all();
    }

    public function createMovie(array $movieData)
    {
        return Movie::create($movieData);
    }

    public function updateMovie(Movie $movie, $movieData)
    {
        $movieData = $movieData->toArray();
        $movie->update($movieData);
        return $movie;
    }

    public function findMovieById($movie){
        return Movie::find($movie);
    }

    public function deleteUser(Movie $movie)
    {
        $movie->delete();
    }
}
