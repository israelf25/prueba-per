<?php

namespace App\Http\DTO;

class DirectorDTO
{
    public string $name;
    public string $nationality;
    public string $birthdate;

    public function __construct($name, $nationality, $birthdate)
    {
        $this->name = $name;
        $this->nationality = $nationality;
        $this->birthdate = $birthdate;
    }

    public function toArray(){
        return array_filter([
            'name' => $this->name,
            'nationality' => $this->nationality,
            'birthdate' => $this->birthdate
        ]);
    }
}
