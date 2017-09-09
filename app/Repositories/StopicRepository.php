<?php

namespace App\Repositories;

use App\Stopic;

class StopicRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(Stopic $model)
    {
        $this->model = $model;
    }
}