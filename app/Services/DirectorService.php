<?php

namespace App\Services;

use App\Http\DTO\DirectorDTO;
use App\Repository\DirectorRepository;

class DirectorService
{
    protected $directoryRepository;

    public function __construct(DirectorRepository $directorRepository)
    {
        $this->directoryRepository = $directorRepository;
    }

    public function getAllDirectors()
    {
        return $this->directoryRepository->getAllDirectors();
    }

    public function createDirector(DirectorDTO $directorDTO)
    {
        $directorData = [
            'name' => $directorDTO->name,
            'nationality' => $directorDTO->nationality,
            'birthdate' => $directorDTO->birthdate
        ];
        return $this->directoryRepository->createDirector($directorData);
    }

    public function updateDirector($userId, $directorData)
    {
        $user = $this->directoryRepository->findDirectorById($userId);
        if ($user) {
            return $this->directoryRepository->updateDirector($user, $directorData);
        }
        return null;
    }

    public function deleteUser($userId)
    {
        $user = $this->directoryRepository->findDirectorById($userId);
        if ($user) {
            $this->directoryRepository->deleteUser($user);
        }
    }
}
