<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\DTO\DirectorDTO;
use App\Models\Director;
use App\Services\DirectorService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DirectorController extends Controller
{
    protected $directorService;

    public function __construct(DirectorService $directorService)
    {
        $this->directorService = $directorService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $director = $this->directorService->getAllDirectors();
        return $director;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:directors',
            'nationality' => 'required',
            'birthdate' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors()->toJson();
        } else {
            $directorData = new DirectorDTO(...$request->all());
            return $this->directorService->createDirector($directorData);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Director $director)
    {
        return $director->toJson();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Director $director)
    {
        $directorData = new DirectorDTO(...$request->all());
        return $this->directorService->updateDirector($director->id, $directorData);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Director $director)
    {
        return $this->directorService->deleteUser($director->id);
    }
}
