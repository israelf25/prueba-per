<?php

namespace App\Http\DTO;

class MovieDTO
{
    public string $title;
    public string $release_date;
    public string $gender;

    public function __construct($title, $release_date, $gender)
    {
        $this->title = $title;
        $this->release_date = $release_date;
        $this->gender = $gender;
    }

    public function toArray(){
        return array_filter([
            'title' => $this->title,
            'release_date' => $this->release_date,
            'gender' => $this->gender
        ]);
    }
}
