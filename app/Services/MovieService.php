<?php

namespace App\Services;

use App\Http\DTO\MovieDTO;
use App\Repository\MovieRepository;

class MovieService
{
    protected $movieRepository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function getAllMovie()
    {
        return $this->movieRepository->getAllMovies();
    }

    public function createDirector(MovieDTO $movieDTO)
    {
        $movieData = [
            'title' => $movieDTO->title,
            'release_date' => $movieDTO->release_date,
            'gender' => $movieDTO->gender
        ];
        return $this->movieRepository->createMovie($movieData);
    }

    public function updateMovie($userId, $movieData)
    {
        $user = $this->movieRepository->findMovieById($userId);
        if ($user) {
            return $this->movieRepository->findMovieById($user, $movieData);
        }
        return null;
    }

    public function deleteUser($userId)
    {
        $user = $this->movieRepository->findMovieById($userId);
        if ($user) {
            $this->movieRepository->deleteUser($user);
        }
    }
}
