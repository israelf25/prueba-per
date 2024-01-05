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

    // public function updateDirector(int $userId, array $directorData)
    // {
    //     $user = $this->directoryRepository->findUserById($userId);
    //     if ($user) {
    //         return $this->directoryRepository->updateUser($user, $userData);
    //     }
    //     return null;
    // }

    // public function deleteUser(int $userId)
    // {
    //     $user = $this->directoryRepository->findUserById($userId);
    //     if ($user) {
    //         $this->directoryRepository->deleteUser($user);
    //     }
    // }
}
