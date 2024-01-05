<?php

namespace App\Repository;

use App\Models\Director;

class DirectorRepository
{
    public function getAllDirectors()
    {
        return Director::all();
    }

    public function createDirector(array $directorData)
    {
        return Director::create($directorData);
    }

    public function updateDirector(Director $director, $directorData)
    {
        $directorData = $directorData->toArray();
        $director->update($directorData);
        return $director;
    }

    public function findDirectorById($director){
        return Director::find($director);
    }

    public function deleteUser(Director $director)
    {
        $director->delete();
    }
}
