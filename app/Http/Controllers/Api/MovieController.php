<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\DTO\MovieDTO;
use App\Models\Movie;
use App\Services\MovieService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    protected $movieService;

    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movie = $this->movieService->getAllMovie();
        return $movie;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:movies',
            'release_date' => 'required',
            'gender' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors()->toJson();
        } else {
            $movieData = new MovieDTO(...$request->all());
            return $this->movieService->createDirector($movieData);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        return $movie->toJson();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $movieData = new MovieDTO(...$request->all());
        return $this->movieService->updateMovie($movie->id, $movieData);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        return $this->movieService->deleteUser($movie->id);
    }
}
