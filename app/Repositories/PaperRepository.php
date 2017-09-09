<?php

namespace App\Repositories;

use App\Paper;

class PaperRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(Paper $model)
    {
        $this->model = $model;
    }
}